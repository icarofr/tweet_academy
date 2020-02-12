<?php 
include("connexionBdd.php");
session_start();

class Connect
{
    protected $nom;
    protected $prenom;
    protected $pseudo;
    protected $birthDate;
    protected $mail;
    protected $motDePass;
    protected $connexion;
    protected $bdd;

    public function __construct($newNom, $newPrenom, $newMail, $newDN, $newPseudo, $newMDP)
    {
        $this->nom = $newNom;
        $this->prenom = $newPrenom;
        $this->birthDate = $newDN;
        $this->pseudo = $newPseudo;
        $this->mail = $newMail;
        $this->motDePass = $newMDP;
        $this->connexion = new Connexion();
        $this->bdd = $this->connexion->getDB();
    }

    public function connexion()
    {
        echo $this->mail."<br>";
        echo $this->pseudo."<br>";
        echo $this->nom."<br>".$this->motDePass."<br>".$this->birthDate."<br>";
        $query = $this->bdd->query("SELECT * FROM user WHERE email= '" . $mail . "' AND password= '" . $motDePass . "'");
        var_dump($query->execute(array(
            $this->nom,
            $this->prenom,
            $this->pseudo,
            $this->birthDate,
            $this->mail,
            $this->motDePass
        )));
        $result = $query;
        $result = $query->fetchAll();
        foreach ($result as $valeur) {
            $_SESSION['id_user'] = $valeur['id_user'];
            $_SESSION['name'] = $valeur['name'];
            $_SESSION['surname'] = $valeur['surname'];
            $_SESSION['birthdate'] = $valeur['birthdate'];
            $_SESSION['email'] = $valeur['email'];
            $_SESSION['password'] = $valeur['password'];
            $_SESSION['bio'] = $valeur['bio'];
        }
    }
}
?>