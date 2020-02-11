<?php
include('connexionBdd.php');

class Inscription extends Connexion
{
    protected $nom;
    protected $prenom;
    protected $pseudo;
    protected $birthdate;
    protected $mail;
    protected $subscribeDate;
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
        $this->subscribeDate = $newDate;
        $this->connexion = new Connexion();
        $this->bdd = $this->connexion->getDB();
    }
    
    public function insert()
    {
        // echo $this->age;
        //echo $this->loisir;
        //echo $this->nom."<br>".$this->motDePass."<br>".$this->dateDeNaissance."<br>";
        $query = $this->bdd->prepare("INSERT INTO `users` (`nom`, `prenom`, `mail`, `date_naissance`, `age`, `ville`, `sexe`, `nom_loisir`, `mdp`)
        VALUES(?,?,?,?,?,?,?,?,?)");
        $query->execute(array(
            $this->nom,
            $this->prenom,
            $this->mail,
            $this->dateDeNaissance,
            $this->age,
            $this->ville,
            $this->sexe,
            $this->loisir,
            $this->motDePass
        ));
        $query2 = $this->bdd->prepare("INSERT INTO `fiche_loisir` (`nom_user`, `loisir1`) VALUES(?,?)");
        $query2->execute(array($this->nom, $this->loisir));
    }

    public function checkEmail($email)
    {
        $check = $this->bdd->prepare('SELECT mail FROM users WHERE mail=?');
        $check->execute(array($email));

        if ($check->rowCount() >= 1) {
            return false;
        } else {
            return true;
        }
    }
   
    public function checkAge()
    {
        return date("Y") - substr($this->dateDeNaissance, 0, 4);
    }

    public function error($msg)
    {
        return "<font color='FF0000'><strong>Error! </strong>".$msg."</font>";
    }

    public function valide()
    {
        return "<div>Votre inscription à bien été validée</div>";
    }
}