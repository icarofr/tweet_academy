<?php
error_reporting(0);
echo $_SESSION['id_user'];
session_start();
include("class/editProfil.class.php");

if (isset($_SESSION['id_user'])) {
  if (isset($_POST['surname']) and !empty($_POST['surname'])) {
    $prenom = htmlspecialchars($_POST['surname']);
    $insert = new EditPrenom($_SESSION['id_user'], $prenom);
    $insert->editPrenom();
  }
  if (isset($_POST['name']) and !empty($_POST['name'])) {
    $nom = htmlspecialchars($_POST['name']);
    $insert = new EditNom($_SESSION['id_user'], $nom);
    $insert->editNom();
  }
  if (isset($_POST['pseudo']) and !empty($_POST['pseudo'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $insert = new EditPseudo($_SESSION['id_user'], $pseudo);
    $insert->editPseudo();
  }
  if (isset($_POST['birthdate']) and !empty($_POST['birthdate'])) {
    $birthdate = htmlspecialchars($_POST['birthdate']);
    $insert = new EditDate($_SESSION['id_user'], $birthdate);
    $insert->editAge();
  }
  if (isset($_POST['email']) and !empty($_POST['email'])) {
    $mail = htmlspecialchars($_POST['email']);
    $insert = new EditMail($_SESSION['id_user'], $mail);
    $insert->editMail();
  }
  if (isset($_POST['bio']) and !empty($_POST['bio']) and $_POST['bio'] != '') {
    $bio = htmlspecialchars($_POST['bio']);
    $insert = new EditBio($_SESSION['id_user'], $bio);
    $insert->editBio();
  }
  if (isset($_POST['password1']) and !empty($_POST['password1']) and isset($_POST['password2']) and !empty($_POST['password2'])) {
    $mdp1 = hash('ripemd160', $_POST['password1']);
    $mdp2 = hash('ripemd160', $_POST['password2']);

    if ($mdp1 == $mdp2) {
      $insert = new EditMdp($_SESSION, $mdp1);
      $insert->editMdp();
    } else {
      $error = "<font color='FF0000'><strong>Error! </strong>Vos mot de passe ne correspondent pas !</font>";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tweet@cademie!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="script.js"></script>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="my_feed.php">Tweet@!</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="my_feed.php">Home</a></li>
          <li><a href="message.php">Messages</a></li>
          <li><a href="#" onclick="switchTheme()">Theme</a></li>
        </ul>
        <form action="tweetQuery.php" class="navbar-form navbar-right" role="search">
          <div class="form-group input-group">
            <input type="text" class="form-control" placeholder="Search..">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="editProfil.php"><span class="glyphicon glyphicon-edit"></span></a></li>
          <li><a href="profil.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container text-center">
    <div class="row">
      <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-12">
            <div id="inscription">
              <h1 class="t_inscription">Edition de Profil</h1><br>
              <form method="POST" action="">
                <table>
                  <tr>
                    <td align="right">
                      <label>Nom : </label>
                    </td>
                    <td>
                      <input class="edit_profil" type="text" name="name" placeholder="Votre nom" value="<?php echo $_SESSION['name'] ?>" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label>Prénom : </label>
                    </td>
                    <td>
                      <input class="edit_profil" type="text" name="surname" id="prenom" placeholder="Votre prénom" value="<?php echo $_SESSION['surname'] ?>" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label>Pseudo : </label>
                    </td>
                    <td>
                      <input class="edit_profil" type="text" name="pseudo" id="prenom" placeholder="Votre pseudo" value="<?php echo $_SESSION['pseudo'] ?>" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label>Bio :</label>
                    </td>
                    <td>
                      <input class="edit_profil" type="text" name="bio" placeholder="Votre bio" <?php if ($_SESSION['bio'] != NULL) {
                                                                                                  echo "value=$_SESSION[bio]";
                                                                                                } ?> />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label>Date de naissance : </label>
                    </td>
                    <td>
                      <input class="edit_profil" type="date" name="birthdate" value="<?php echo $_SESSION['birthdate'] ?>" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label>Email : </label>
                    </td>
                    <td>
                      <input class="edit_profil" type="email" name="email" placeholder="Votre email" value="<?php echo $_SESSION['email'] ?>" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label>Nouveau mot de passe :</label>
                    </td>
                    <td>
                      <input class="edit_profil" type="password" name="password1" placeholder="Votre nouveau mot de passe" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label>Verification mot de passe :</label>
                    </td>
                    <td>
                      <input class="edit_profil" type="password" name="password2" placeholder="Votre nouveau mot de passe" />
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="edit_profil">
                        <input type="submit" name="submit" value="INFORMATIONS MODIFIEES" />
                        <?php echo $error; ?></section>
                </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-2 well">
        <p>Trending this week:</p>
        <div class="thumbnail">
          <p><strong>#Bernie<wbr>OrBust</strong></p>
          <p>Thu. 20 February 2020</p>
          <button class="btn btn-primary">Tweet</button>
        </div>
        <div class="thumbnail">
          <p><strong>#Bojack<wbr>Finale</strong></p>
          <p>Sat. 22 February 2020</p>
          <button class="btn btn-primary">Tweet</button>
        </div>
        <div class="thumbnail">
          <p><strong>#WAC<wbr>Rocks</strong></p>
          <p>Sun. 23 February 2020</p>
          <button class="btn btn-primary">Tweet</button>
        </div>
      </div>
    </div>
  </div>
  <footer class="container-fluid text-center">
    <p><span class="glyphicon glyphicon-copyright-mark"></span> Copyright of W@C 2020. Suggestions and complaints <a href="Milton.jpg">here</a>.</p>
  </footer>
</body>

</html>