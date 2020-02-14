<?php 
session_start();
include("class/editProfil.class.php");

if(isset($_SESSION['id_user'])) {
    if(isset($_POST['surname']) AND !empty($_POST['surname'])) {
        $prenom = htmlspecialchars($_POST['surname']);
        $insert = new EditPrenom($_SESSION['id_user'], $prenom);
        $insert->editPrenom();
    }
    if(isset($_POST['name']) AND !empty($_POST['name'])) {
        $nom = htmlspecialchars($_POST['name']);
        $insert = new EditNom($_SESSION['id_user'], $nom);
        $insert->editNom();
    }
    if(isset($_POST['pseudo']) AND !empty($_POST['pseudo'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $insert = new EditPseudo($_SESSION['id_user'], $pseudo);
        $insert->editPseudo();
    }
    if(isset($_POST['birthdate']) AND !empty($_POST['birthdate'])) {
        $birthdate = htmlspecialchars($_POST['birthdate']);
        $insert = new EditDate($_SESSION['id_user'], $birthdate);
        $insert->editAge();
    }
    if(isset($_POST['email']) AND !empty($_POST['email'])) {
        $mail = htmlspecialchars($_POST['email']);
        $insert = new EditMail($_SESSION['id_user'], $mail);
        $insert->editMail();
    }
    if(isset($_POST['bio']) AND !empty($_POST['bio']) AND $_POST['bio'] != '') {
        $bio = htmlspecialchars($_POST['bio']);
        $insert = new EditBio($_SESSION['id_user'], $bio);
        $insert->editBio();
    }
    if(isset($_POST['password1']) AND !empty($_POST['password1']) AND isset($_POST['password2']) AND !empty($_POST['password2'])) {
        $mdp1 = hash('ripemd160', $_POST['password1']);
        $mdp2 = hash('ripemd160', $_POST['password2']);

        if($mdp1 == $mdp2) {
            $insert = new EditMdp($_SESSION, $mdp1); 
            $insert->editMdp();
        }
        else {
            $error = "<font color='FF0000'><strong>Error! </strong>Vos mot de passe ne correspondent pas !</font>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Tweet_academie</title>
        <link rel="stylesheet" href="style_reb.css"/>
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

                <form method="POST" action="">
                <table style="margin-left: 500px;">
                    <tr>   
                        <td align="right">
                            <label>Nom : </label>
                        </td>
                        <td>
                            <input class="edit_profil" type="text" name="name" placeholder="Votre nom" value = "<?php echo $_SESSION['name']?>" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label>Prénom : </label>
                        </td>
                        <td>
                            <input class="edit_profil" type="text" name="surname" id="prenom" placeholder="Votre prénom" value="<?php echo $_SESSION['surname']?>" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label>Pseudo : </label>
                        </td>
                        <td>
                            <input class="edit_profil" type="text" name="pseudo" id="prenom" placeholder="Votre pseudo" value="<?php echo $_SESSION['pseudo']?>" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label>Bio :</label>
                        </td>
                        <td>
                            <input class="edit_profil" type="text" name="bio"  placeholder="Votre bio" <?php if($_SESSION['bio']!=NULL){echo "value=$_SESSION[bio]";}?>/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label>Date de naissance : </label>
                        </td>
                        <td>
                            <input class="edit_profil" type="date" name="birthdate" value="<?php echo $_SESSION['birthdate']?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label>Email : </label>
                        </td>
                        <td>
                            <input class="edit_profil" type="email" name="email" placeholder="Votre email" value="<?php echo $_SESSION['email']?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label>Nouveau mot de passe :</label>
                        </td>
                        <td>
                            <input class="edit_profil" type="password" name="password1"  placeholder="Votre nouveau mot de passe"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label>Verification mot de passe :</label>
                        </td>
                        <td>
                            <input class="edit_profil" type="password" name="password2" placeholder="Votre nouveau mot de passe"/>
                        </td>
                    </tr>
                    <tr>    
                    <td>
                        <div class="edit_profil">
                        <input type="submit" name="submit" value="INFORMATIONS MODIFIEES"/>
                        <?php echo $error;?>
                        </div>
                    </td>
                    </tr>
                </table>
            </form>
    </div>
</section>