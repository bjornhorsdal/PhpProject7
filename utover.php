<?php
echo "Utøver";
        echo "<br>";
        
        Class Utover{
        public $navn;
        public $kjonn;
        public $nationalitet;
        
        function __construct($navn, $kjonn, $nationalitet){
            $this->navn=$navn;
            $this->kjonn=$kjonn;
            $this->nationalitet=$nationalitet;          
        }
        function skrivUt(){
        echo "navn: ".$this->navn. "<br>";
        echo "kjonn: ".$this->kjonn. "<br>";
        echo "nationalitet: ".$this->nationalitet. "<br>";
        }
        }
