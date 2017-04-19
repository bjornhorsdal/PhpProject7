<?php
echo "Publikum";
        echo "<br>";
        
        Class Publikum{
        public $navn;
        public $bosted;
        public $nationalitet;
        
        function __construct($navn, $bosted, $nationalitet){
            $this->navn=$navn;
            $this->bosted=$bosted;
            $this->nationalitet=$nationalitet;          
        }
        function skrivUt(){
        echo "navn: ".$this->navn. "<br>";
        echo "bosted: ".$this->bosted. "<br>";
        echo "nationalitet: ".$this->nationalitet. "<br>";
        }
        }
?>

