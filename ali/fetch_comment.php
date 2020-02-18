<?php
//  SELECT tweet.tweet_date,tweet.content_tweet,user.pseudo FROM user,tweet WHERE tweet.id_autor=1 AND user.id_user=1
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
$output .= "
<div class='col-sm-9'>
    <div class='well'>By <b>". $row['pseudo']."</b> on <i>".$row['tweet_date']."</i>
    <br>
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