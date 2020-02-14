<?php

$servername = "localhost";
$username = "admin";
$dbname = "tweet_academy";
$pseudo = $_POST['username'];
$password = hash('ripemd160', $_POST['password']);

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $username);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $loginQuery = $connection->prepare("SELECT *
    FROM `user`
    WHERE `pseudo` = '$pseudo' AND `password` = '$password';");
    $loginQuery->execute();
    if ($loginQuery->rowCount() >= 1) {
        header("location: my_feed.php");
    }}

    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

$connection = null;
