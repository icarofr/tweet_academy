<?php 
session_start();
include("database.php");
 
class Tweet
{
    protected $id_autor;
    protected $tweet_date;
    protected $id;
    protected $content_tweet;

    public function __construct($newid_autor, $newtweet_date, $newcontent_tweet)
    {
        $this->id_autor = $newid_autor;
        $this->tweet_date = $newtweet_date;
        $this->content_tweet = $newcontent_tweet;
        $this->id = $_SESSION['id_user'];
    }

    public function tweeter()
    {
        $id_autor= $this->id_autor;
        $tweet_date = $this->tweet_date;
        $content_tweet = $this->content_tweet;
        $id = $this->id;

        $tweeter = $bdd->query("INSERT INTO tweet(id_autor,tweet_date,content_tweet)
    VALUES(?,?,?)");

        $tweeter->execute(array(
        'id_autor' => $this->id_autor,
        'tweet_date' => $this->tweet_date,
        'content_tweet' => $this->content_tweet));
    }
}

?>