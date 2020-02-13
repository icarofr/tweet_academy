<?php include("database.php");
 
class Tweet
{
    protected $id_autor;
    protected $tweet_date;
    protected $content_tweet;

    public function __construct($newid_autor, $newtweet_date, $newcontent_tweet)
    {
        $this->id_autor = $newid_autor;
        $this->tweet_date = $newtweet_date;
        $this->content_tweet = $newcontent_tweet;
    }

    public function tweeter()
    {
        $id_autor= $this->id_autor;
        $tweet_date = $this->tweet_date;
        $content_tweet = $this->content_tweet;

        $tweeter = $bdd->query("INSERT INTO tweet(id_autor,tweet_date,content_tweet)
    VALUES($id_autor, '".$tweet_date."', '".$content_tweet."')");

        $tweeter->execute(array(
        'id_autor' => $this->id_autor,
        'tweet_date' => $this->tweet_date,
        'content_tweet' => $this->content_tweet));
    }
}

?>