<?php include("connexionBdd.php");
session_start();?>
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
                <div class="profil">
                    <p></p>
                </div >
                <img class="photo_profil" src="logouser.png" alt="photo profil">
                <p class="editer"> Editer le profil</p>
                <div class="form_edit">
                <form method="post" action="valid_modif.php">
                <table>
                    <tr>   
                        <td>
                            <label>Nom : </label>
                        </td>
                        <td>
                            <input class="edit_profil" type="text" name="surname" placeholder="Votre nom" value = <?php echo $_SESSION['nom']?> />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Prénom : </label>
                        </td>
                        <td>
                            <input class="edit_profil" type="text" name="name" id="prenom" placeholder="Votre prénom" value=<?php echo $_SESSION['prenom']?> />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Pseudo : </label>
                        </td>
                        <td>
                            <input class="edit_profil" type="text" name="pseudo" id="prenom" placeholder="Votre prénom" value=<?php echo $_SESSION['prenom']?> />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Bio :</label>
                        </td>
                        <td>
                            <input class="edit_profil" type="text" name="bio"  placeholder="Votre nouveau mot de passe"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Date de naissance : </label>
                        </td>
                        <td>
                            <input class="edit_profil" type="date" name="birthdate" value=<?php echo $_SESSION['anniversaire']?>/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email : </label>
                        </td>
                        <td>
                            <input class="edit_profil" type="email" name="email" placeholder="Votre email" value=<?php echo $_SESSION['email']?>/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Mot de passe actuel :</label>
                        </td>
                        <td>
                            <input class="edit_profil" type="password" name="password"  placeholder="Mot de passe actuel"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nouveau mot de passe :</label>
                        </td>
                        <td>
                            <input class="edit_profil" type="password" name="password1"  placeholder="Votre nouveau mot de passe"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Verification mot de passe :</label>
                        </td>
                        <td>
                            <input class="edit_profil" type="password" name="password2" placeholder="Votre nouveau mot de passe"/>
                        </td>
                    </tr>
                    <tr>    
                    <td>
                        <div edit_profil>
                        <input type="submit" name="submit" value="INFORMATIONS MODIFIEES" />
                        </div>
                    </td>
                    </tr>
                    </table>
                </div>
            </section>