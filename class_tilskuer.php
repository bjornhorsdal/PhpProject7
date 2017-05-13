<?php

Class Tilskuer{
    public $id;    
    public $navn;
    public $bosted;
    public $nationalitet;

    function __construct($id, $navn, $bosted, $nationalitet){
        $this->id=$id;
        $this->navn=$navn;
        $this->bosted=$bosted;
        $this->nationalitet=$nationalitet;          
    }

    function skrivUt(){
        echo "Navn: ".$this->navn. "<br>";
        echo "Bosted: ".$this->bosted. "<br>";
        echo "Nationalitet: ".$this->nationalitet. "<br>";
    }

    function skrivUtOverskrift(){
        echo "<a href='tilskuer.php?id=$this->id'>";
        echo "$this->navn<br>";
        echo "</a>";
    }
}
?>

