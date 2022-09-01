<?php 

//Class Patron
class Admin extends User
{
    public $voiture;
    
    public function __construct($nom, $prenom, $age, $voiture)// constructeur
    {
        parent::__construct($nom, $prenom, $age);
        $this->voiture = $voiture;
    }
    
    public function rouler(){
        var_dump("Bonjour, je roule avec ma voiture $this->voiture !");
    }
}


$admin = new Admin("Joseph", "Durand", 55, " Audi");

$admin->presentation();
$admin->rouler();