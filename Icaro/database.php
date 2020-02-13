<?php

 try {
          $bdd = new PDO("mysql:host=localhost;dbname=common-database", "becca", "mysqlbecca");//objet qui represente la connexion a la bsd
          $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (Exception $e) {
          die("Une erreur a été trouvé : " . $e->getMessage());
      }
?>