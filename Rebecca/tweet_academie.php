<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Tweet_academie</title>
        <link rel="stylesheet" href="style.css"/>
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
                    <div class="container1">
                    <div class="titre"> ACCUEIL </div>
                    <div class="textarea" name="textarea" id="textfield">
                    <input class="tweet1" type="submit" name="tweet1" value="TWEET"/>
                    </div>
                </div>
            </section>
            <section>
            <div class="search">
    <form action ="verif-form.php" method ="get">
    <input type ="search" name ="search" placeholder= "Recherche tweet academie ...">
    </form>
  </div>
            </section>

            <section class="filtre">
                <ul>Filtre de recherche
            <li><a href="#">Personnes</a></li>
            <li><a href="#">De tout le monde</a>
            <li><a href="#">Personnes que vous suivez</a></li>
                Localisation
            <li><a href="#">Partout</a></li>
            <li><a href="#">À proximité</a></li>
            <li><a href="#">Recherche avancée</a><li></ul>
            </section>
        </body>
</html>