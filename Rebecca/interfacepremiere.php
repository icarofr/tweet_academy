<?php 
session_start();
include("classes/connexion.classes.php");
if(isset($_POST['username']) && isset($_POST['password'])) {
    $mailCo= $_POST['username'];
    $mdpCo = hash('ripemd160',$_POST['password']);

    $connexion = new Connect($mailCo,$mdpCo);
    $connexion->checkConnexion();
}
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style3.css" href="bootstrap.min.css">
    <title>
        Commencez à tweeter dès maintenant !
    </title>
    <div id="login">
        <form method ="POST">
    <input type="email" class="placeholder" placeholder="Votre e-mail" name="username">
    <input type="password" class="placeholder" placeholder="mot de passe" name="password">
    <input type="submit" id = "button" placeholder="Log in" name ="login">Login</input>
        </form>
</div>
</head>
<body>
    <div id="purple">
    <div id="inscription">
        <div class="col-sm-2 col-md-3 col-lg-2 col-xl-2 menu-icons">
        <br>

        <br>
      <h1>Inscrivez-vous aujourd'hui ! <img src="/Meryem/logo.png" alt="logo site" id="logosite"></h1>
      <br>
      <br>
        <button a href="ali/inscription.php" type="button" id="button2" placeholder="Inscrivez-vous" name="inscription">Inscrivez-vous</button>
</div>
<br>
<br>
        <h2>Follow tout ce qui bouge.</h2>
        <img src="/Meryem/logosearch.png" class="logo" alt="logo search">
        <br>
        <br>
        <h2>Suis l'actualité 24/7.</h2>
        <img src="/Meryem/logousers.jpeg" class="logo" alt="logo users">
        <br>
        <br>
        <h2>Parle avec le monde entier.</h2>
        <img src="/Meryem/logoconvers.png" class="logo" alt="logo convers">
        <br>
        <br>
    </div>
    </div>
</body>

</html>
