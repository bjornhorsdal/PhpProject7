<?php
Class Utover{
    public $id;    
    public $navn;
    public $kjonn;
    public $nationalitet;
        
    function __construct($id, $navn, $kjonn, $nationalitet){
        $this->id=$id;
        $this->navn=$navn;
        $this->kjonn=$kjonn;
        $this->nationalitet=$nationalitet;          
    }
    function skrivUt(){
        echo "Navn: ".$this->navn. "<br>";
        echo "Kjønn: ".$this->kjonn. "<br>";
        echo "Nationalitet: ".$this->nationalitet. "<br>";
    }
    function skrivUtOverskrift(){
        echo "<a href='utover.php?id=$this->id'>";
        echo "$this->navn<br>";
        echo "</a>";
    }
}
