<?php include("database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Tweet_academie</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
        <body>
           <?php
           include("classes/connexion.class.php");
          
          
           $email = $_POST['usermail'];
           $password1 = sha1($_POST['password']);
         
               if (isset($_POST['email']) && isset($_POST['password'])) {
                   $connect = new Membre($id,$nom, $prenom, $anniversaire, $ville, $email,
                    $password1, $loisirs, $compte);
                   echo $connect->connexion();
                   /* $req = $bdd->query("SELECT * FROM membres WHERE email= '".$usermail."' AND mot_passe= '".$password."'");
                    $req->execute(array($usermail, $password));
                     $result = $bdd->query("SELECT * FROM membres WHERE email= '".$usermail."' AND mot_passe= '".$password."'");
                    //$userexist = $req->rowCount();
                    //if ($userexist == 1){
                    $res = $req->fetchAll();
                    foreach ($result as $valeur) {
                        $_SESSION['id'] = $_POST['id'];
                        $_SESSION['prenom'] = $valeur['prenom'];
                        $_SESSION['nom'] = $valeur['nom'];
                        $_SESSION['sexe'] = $valeur['sexe'];
                        $_SESSION['date_naissance'] = $valeur['date_naissance'];
                        $_SESSION['email'] = $valeur['email'];
                        $_SESSION['ville'] = $valeur['ville'];
                        $_SESSION['mot_passe'] = $valeur['mot_passe'];
                    }*/
                   //var_dump($res[0]['email']);
                   //var_dump($usermail);
             
        
                   if ($usermail == $res[0]['email'] && $password == $res[0]["mot_passe"]) {//si infos correspondent
                   //var_dump ($res);
                   ?><?php if ($_SESSION['compte'] == 1) {
                       Header('location:profil.php');
                   } ?>
                   
                   <?php

               }
               }
               

                   else {
                   echo "Erreur lors de la connexion...";
               }

           
?>
                  
        </body>
</html>