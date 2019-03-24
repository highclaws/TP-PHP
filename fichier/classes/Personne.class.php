<?php

class Personne{
    public $nom;
    public $prenom;
    public $age; 
    public $ville;
    function __construct($n,$p,$a,$v)
    {
        $this->nom = $n;
        $this->prenom = $p;
        $this->age = $a;
        $this->ville = $v;
    }
    function sePresenter()
    {
        $ch = "Bonjour, je m'appelle ".$this->prenom." ".$this->nom;
        $ch .= ", j'ai ".$this->age." ans et j'habite ".$this->ville;
        echo $ch."<br />";
    }
}





?>