<?php

$servername = "localhost";
$username = "admin";
$dbname = "tweet_academy";
$search = $_GET['search'];

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $username);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tweetQuery = $connection->prepare("SELECT *
    FROM `tweet`
    WHERE `content_tweet` LIKE '%$search%'");
    $tweetQuery->execute();
    if ($tweetQuery->rowCount() >= 1) {
        echo($tweetQuery->fetchAll(PDO::FETCH_ASSOC)[0]['content_tweet']);
    } else {
        echo 'No tweets found!';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$connection = null;
