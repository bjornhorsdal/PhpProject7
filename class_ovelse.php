<?php
//Klasse Øvelse
        
Class Ovelse{
    public $id;    
    public $navn;
    public $kjonn;
    public $tidpunkt;
        
    function __construct($id, $navn, $kjonn, $tidspunkt){
        $this->id=$id;
        $this->navn=$navn;
        $this->kjonn=$kjonn;
        $this->tidspunkt=$tidspunkt;          
    }

    function skrivUt(){
        echo "navn: ".$this->navn. "<br>";
        echo "kjonn: ".$this->kjonn. "<br>";
        echo "tidspunkt: ".$this->tidspunkt. "<br>";
    }

    function skrivUtOverskrift(){
        echo "$this->navn. $this->kjonn. <br>";
    }
    
}
        
?>        
        
        
        