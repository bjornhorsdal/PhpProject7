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
        echo "navn: ".$this->navn. "<br>";
        echo "bosted: ".$this->bosted. "<br>";
        echo "nationalitet: ".$this->nationalitet. "<br>";
        }
        function skrivUtOverskrift(){
        echo "$this->navn<br>";
        }
        }
?>

