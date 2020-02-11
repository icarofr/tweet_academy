<?php
include('classe/inscription.class.php');

session_start();

// if (isset($_POST['forminscription'])) {

//     $Nom = htmlspecialchars($_POST['nom']);
//     $Prenom = htmlspecialchars($_POST['prenom']);
//     $Date = $_POST['date'];
//     $Sexe = $_POST['sexe'];
//     $Ville = $_POST['ville'];
//     $Mail = htmlspecialchars($_POST['mail']);
//     $Mail2 = htmlspecialchars($_POST['mail2']);
//     $Mdp = sha1($_POST['mdp']);
//     $Mdp2 = sha1($_POST['mdp2']);
//     $Age = date("Y") - substr($_POST['date'], 0, 4);
//     $loisir = htmlspecialchars($_POST['loisir']);
    
//     if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date']) AND !empty($_POST['sexe']) AND !empty($_POST['ville']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['loisir'])) 
//     {    
//         if ($Nom !='' && $Prenom !="" && $Date !="" && $Sexe!="" && $Ville !="") 
//         {
//             if ($Mail == $Mail2) 
//             {
//                 if (filter_var($Mail, FILTER_VALIDATE_EMAIL)) 
//                 {
//                     if ($Mdp == $Mdp2)
//                     {
//                         $nouvelleInscription = new Inscription($Nom, $Prenom, $Mail, $Date, $Ville, $Sexe, $Mdp, $loisir, $Age);
//                         if ($nouvelleInscription->checkEmail($Mail)) {
//                             if ($nouvelleInscription->checkAge() >= 18) {
//                                 $nouvelleInscription->insert();
//                                 $succes = "<font color='green'><strong>Success!</strong> Votre inscription à bien été validé.</font>";
//                                 $nouvelleInscription->valid();
//                             } else {
//                                 $error= $nouvelleInscription->error('Tu as pas 18ans pour acceder au site !');
//                             }
//                         } else {
//                             $error = $nouvelleInscription->error('Mail déja existant !');
//                         }
//                         //echo "D: ".$Date.", le S: ".$Sexe.", V: ".$Ville.", Mdp : ".$Mdp.", NOM : ".$Nom.", P : ".$Prenom. ", Mail : ".$Mail;
//                     } else {
//                         $error = "Vos mot de passe ne correspondent pas !";
//                     }
//                 }
//             } else {
//                 $error = "Vos adresses mail ne correspondent pas !";
//             }
//         }else {
//             $error = "Veuillez remplir les champs !";
//         }    
//     }
// }

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Uncial+Antiqua&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
	</head>
<body>
<main class="fond_inscription">

    <div class="fond">
        <img src="logo.png" name="logo" alt="" class="logo" />
    </div>
<div id="contenu">
    <div id="inscription">
  
    <h1 class="t_inscription">INSCRIPTION</h1>

    <form method="POST" action="#">
    <table>
        <tr>
            <td align="right"><label for="nom">Nom :</label></td>
            <td><input type="text" placeholder="Votre nom" name="nom"></td>
        </tr>

        <tr>
		    <td align="right"><label for="prenom">Prenom :</label></td>
            <td><input type="text" placeholder="Votre prenom" name="prenom"></td> 
        </tr>

        <tr>
            <td align="right"><label for="date">Date de naissance :</label></td>
            <td><input type="date" class="start" name="date" min="1960-01-01" max="2020-12-31"></td>
        </tr>

        <tr>
            <td align="right"><label for="sexe">Sexe :</label></td>
                <td><input type="radio" name="sexe" value="homme" id="sexe" required>Homme</input>
                <input type="radio" name="sexe" value="femme" id="sexe" required>Femme</input>
                <input type="radio" name="sexe" value="autre" id="sexe" required>Autre</input></td>
        </tr>

        <tr>
            <td align="right"><label for="ville">Choisir votre ville :</label></td>
            <td><select name="ville">
                <option selected>Ville</option>
                <option value='Paris'>Paris</option>
                <option value='Marseille'>Marseille</option>
                <option value='Lyon'>Lyon</option>
                <option value='Nice'>Nice</option>
                <option value='Lille'>Lille</option>
                <option value='Nantes'>Nantes</option>
                <option value='Bordeaux'>Bordeaux</option>
                <option value='Toulouse'>Toulouse</option>
            </select></td>
        </tr>

        <tr>
            <td align="right"><label for="mail">Mail :</label></td>
            <td><input type="email" placeholder="Votre mail" name="mail"></td>
        </tr>
        
        <tr>
            <td align="right"><label for="mail2">Confirmation du mail :</label></td>
            <td><input type="email" placeholder="Confirmez votre mail" name="mail2"></td>
        </tr>

        <tr>
            <td align="right"><label for="mdp">Mot de passe :</label></td>
            <td><input type="password" placeholder="Votre mot de passe" name="mdp"></td>
        </tr>

        <tr>
            <td align="right"><label for="mdp2">Confirmation du mot de passe :</label></td>
            <td><input type="password" placeholder="Votre mot de passe" name="mdp2"></td>
        </tr>
        <tr>
            <td align="right"><label for="loisir">Choisir un loisir :</label></td>
            <td><select name="loisir">
            <option selected>Loisir</option>
                <option value='cuisine'>cuisine</option>
                <option value='cinema'>cinema</option>
                <option value='sport'>sport</option>
                <option value='lire'>lire</option>
                <option value='jeux video'>jeux video</option>
                <option value='shooping'>shooping</option>
                <option value='musique'>musique</option>
                <option value='restaurant'>restaurant</option>
            </select></td>
        </tr>
    </table><br><br>

    <button type="submit" name="forminscription" class="submit_inscription">Valider</button>
    <br><br>
    <section id="error"><?php echo $error;echo $succes; ?></section>
    </form><br>
    
    </div>

    <div class="amour">
        <img src="image/text.png" alt="" name="text" />
    </div>

</div>
</main>
<body>
</html>