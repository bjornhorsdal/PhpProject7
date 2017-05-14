<?php

Class Tilskuer{
    public $id;    
    public $navn;
    public $bosted;
    public $telefon;
    public $epost;
    public $nationalitet;

    function __construct($id, $navn, $bosted, $telefon, $epost, $nationalitet){
        $this->id=$id;
        $this->navn=$navn;
        $this->bosted=$bosted;
        $this->telefon=$telefon;
        $this->epost=$epost;
        $this->nationalitet=$nationalitet;          
    }

    function skrivUt(){
        echo "Navn: ".$this->navn. "<br>";
        echo "Bosted: ".$this->bosted. "<br>";
        echo "Telefon: ".$this->telefon. "<br>";
        echo "Epost: ".$this->epost. "<br>";
        echo "Nationalitet: ".$this->nationalitet. "<br>";
    }

    function skrivUtOverskrift(){
        echo "<a href='tilskuer.php?id=$this->id'>";
        echo "$this->navn<br>";
        echo "</a>";
    }
}
?>

