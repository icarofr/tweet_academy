<?php 
session_start();
include("connexionBdd.php");

class Connect
{
    private $mail;
    private $motDePass;
    protected $connexion;
    protected $bdd;

    public function __construct($newMail,$newMDP)
    {
        $this->mail = $newMail;
        $this->motDePass = $newMDP;
        $this->connexion = new Connexion();
        $this->bdd = $this->connexion->getDB();
    }

    public function checkConnexion()
    {
        $query = $this->bdd->query("SELECT * FROM `user` WHERE `email` = ? AND `password` = ?");
        $query->execute(array($this->mail,$this->motDePass));
        $result = $query->rowCount();
        if($result == 1) {
            $result = $query->fetch();
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['surname'] = $result['surname'];
            $_SESSION['birthdate'] = $result['birthdate'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['password'] = $result['password'];
            header("Location: home.php?id=".$_SESSION['id_user']);
        }
    }
}
?>
