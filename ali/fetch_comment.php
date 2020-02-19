<?php
// SELECT tweet.tweet_date,tweet.content_tweet,user.pseudo FROM user,tweet WHERE tweet.id_autor=1 AND user.id_user=1
session_start();
$id_user = $_SESSION['id_user'];


$servername = "localhost";
$username = "admin";
$dbname = "common-database";
$connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $username);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $connect->query("SELECT tweet.tweet_date,tweet.content_tweet,user.pseudo,tweet.id_tweet FROM user,tweet WHERE tweet.id_autor=user.id_user ORDER BY tweet.id_tweet DESC");

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
    //var_dump($row);
    $pseudo = $row['pseudo'];
$output .= "
<div class='col-sm-9'>
<form method='get' action='info_profil.php'>
    <div class='well'>By <b><input type='text' name='pseudo' style='display: none;' value='$pseudo'/><button type='submit'>$pseudo</button></b> on <i>".$row['tweet_date']."</i>
</form>
    <br><br>
    ".$row['content_tweet']."
    </div>
    <button class='btn'><span class='glyphicon glyphicon-thumbs-up'></button>
    <button class='btn'><span class='glyphicon glyphicon-retweet'></button><br>
</div>"; 
//$output .= get_reply_comment($connect);
//var_dump($output);
}
//echo "okok";
echo $output;


?>