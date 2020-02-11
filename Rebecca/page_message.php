<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Tweet_academie</title>
        <link rel="stylesheet" href="style.css"/>
        <link href="https://fonts.googleapis.com/css?family=Manjari&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
    </head>
        <body>
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="">Accueil</a></li>
                    <li><a href="">Mon compte</a>
                    <li><a href="">Notifications</a></li>
                    <li><a href="">Messages</a></li>
                    <li><a href="">Listes</a></li>
                    <li><a href="">Profil</a></li>
                    <li><a href="">Plus</a></li>
                </ul>
                <input class="tweet" type="submit" name="tweet"value="TWEET"/>
            </div>
            <section>
                <h1>Messages</h1>
            </section>
               
                <form action ="verif-form.php" method ="get">
                <input class="recherche" type ="search" name ="search" placeholder= "Rechercher des personnes et des groupes">
                </form>

                <div class="message">
                    <p></p>
                </div>

                <input class="submit" type="submit" name="message" value ="Envoyer">

                
           