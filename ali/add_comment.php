<?php 
session_start();
$id_user = $_SESSION['id_user'];


$servername = "localhost";
$username = "admin";
$dbname = "common-database";
$pseudo = $_POST['username'];

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $username);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    if(empty($_POST["comment_content"]))
    {
        $error .= '<p class="text-danger">Comment is required</p>';
    }
    else
    {
        $comment_content = $_POST["comment_content"];
    }
    if($error == '')
    {
    $statement = $connection->prepare("INSERT INTO `tweet`(`id_autor`, `tweet_date`, `content_tweet`)
    VALUES (?,now(),?)");
    var_dump($statement->execute(array($id_user,$comment_content)));
        $error = '<label class="text-success">Comment Added</label>';
    }

    $data = array('error' => $error);
        echo json_encode($data);
}

catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$connection = null;

?>