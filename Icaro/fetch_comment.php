<?php
// SELECT tweet.tweet_date,tweet.content_tweet,user.pseudo FROM user,tweet WHERE tweet.id_autor=1 AND user.id_user=1
session_start();
error_reporting(0);
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
foreach ($result as $row) {
    //var_dump($row);
    $pseudo = $row['pseudo'];
    $output .= "
    <div class='col-xs-12'>
    <form method='get' action='profil.php'>
    <div class='well tweet-content'  align='left'><div class='tweet-innerhtml'>&emsp;<b><input type='hidden' name='id' value='@$pseudo'/>
        <button class='btn btn-link' type='submit'>@$pseudo</button></b> on <i>" . $row['tweet_date'] . "</i>
    </form>
        <br>
        " . $row['content_tweet'] . "<br></div><div class='buttons' style='float: right;'>
        <button class='btn btn-secondary'><span class='glyphicon glyphicon-thumbs-up'></button>
        <button class='btn btn-secondary'><span class='glyphicon glyphicon-comment'></button>
        <button class='btn btn-secondary'><span class='glyphicon glyphicon-retweet'></button></div>
        </div>
    </div>";
    //$output .= get_reply_comment($connect);
    //var_dump($output);
}
//echo "okok";
echo $output . "<script>getTheme();
function hashtag(text) {
    var repl = text.replace(
      /#(\w+)/g,
      '<a href=\"tweetQuery.php?search=%23$1\">#$1</a>'
    );
    return repl;
  }
  for (let i = 0; i < document.querySelectorAll(\".tweet-innerhtml\").length; i++) {
    document.querySelectorAll(\".tweet-innerhtml\")[i].innerHTML = hashtag(
      document.querySelectorAll(\".tweet-innerhtml\")[i].innerHTML
    );
  }      
</script>";
