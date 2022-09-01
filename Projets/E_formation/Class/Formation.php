<?php
                            //Class Formation
class Formation { // class
    public $nom;
    public $prenom;
    private $age;
    
    public function __construct($nom, $prenom, $age)// constructeur
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge($age);
    }
    public function setAge($age)// setter
    {
        if(is_int($age) && $age >= 1 && $age <= 100){ // condition
            $this->age = $age;
        } else{
            throw new Exception("L'âge doit être un nombre entier compris entre 1 et 100"); // exception
        }
    }

    public function getAge()// getter
    {
        return $this->age;
    }
    
    public function presentation() { // méthode
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans");
    }
}


$user1 = new User("Reitin", "Nicolas", 34); // création d'un objet
//code utilisé si pas de __construct
// $user1->prenom = "Nicolas";
// $user1->nom = "Reitin";
// $user1->age = "34";

$user2 = new User("Turpin", "Audrey", 33); // création d'un objet

// $user1->setAge("bonjour");

$user1->presentation(); // appel de la méthode

