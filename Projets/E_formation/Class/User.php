<?php
                            //Class Utilisateur
class User { // class
    public $pseudo;
    public $nom;
    public $prenom;
    protected $date_de_naissance;
    public $mail;
    private $mdp;
    
    public function __construct($pseudo, $nom, $prenom, $date_de_naissance, $mail)// constructeur
    {
        $this->pseudo = $pseudo;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_de_naissance = $date_de_naissance;
        $this->mail = $mail;
    }
    
    public function presentation() { // méthode
        var_dump("Bonjour, je suis $this->pseudo et j'ai $this->date_de_naissance ans");
    }
}


$user1 = new User("Slimpeas", "Reitin", "Nicolas", "05/01/1988", "slimpeastv@gmail.com"); // création d'un objet

// $user2 = new User("Turpin", "Audrey", 33); // création d'un objet

$user1->presentation(); // appel de la méthode

