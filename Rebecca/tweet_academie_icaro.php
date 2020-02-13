<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tweet Academie!</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class=row>
            <div class="col-sm-2 col-md-3 col-lg-2 col-xl-2 menu-icons">
                <img src="logo.png" alt="logo">
                <ul>
                    <li><a href="">Accueil</a></li>
                    <li><a href="">Mon compte</a>
                    <li><a href="">Notifications</a></li>
                    <li><a href="">Messages</a></li>
                    <li><a href="">Listes</a></li>
                    <li><a href="">Profil</a></li>
                    <li><a href="">Plus</a></li>
                    <input class="tweet" type="submit" name="tweet" value="TWEET" />
                </ul>
            </div>
            <!-- <input class="image" type="submit" name="image" value="Images" /> -->
            <div class="col-sm-8 col-md-7 col-lg-7 col-xl-7">
                <div class="titre"> ACCUEIL </div>
                <div class="textarea">
                    <input class="tweet1" type="submit" name="tweet1" value="TWEET" />
                </div>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">

                <div class="search">
                    <form action="verif-form.php" method="get">
                        <input type="search" name="search" placeholder="Recherche tweet academie ...">
                    </form>
                </div>
                <ul>
                    <li><a href="#">Personnes</a></li>
                    <li><a href="#">De tout le monde</a>
                    <li><a href="#">Personnes que vous suivez</a></li>
                </ul>
                Localisation
                <ul>
                    <li><a href="#">Partout</a></li>
                    <li><a href="#">À proximité</a></li>
                    <li><a href="#">Recherche avancée</a>
                    <li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>