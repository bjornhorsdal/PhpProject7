<?php
echo "Øvelse";
        echo "<br>";
        
        Class Ovelse{
        public $navn;
        public $kjonn;
        public $tidpunkt;
        
        function __construct($navn, $kjonn, $tidspunkt){
            $this->navn=$navn;
            $this->kjonn=$kjonn;
            $this->tidspunkt=$tidspunkt;          
        }
        function skrivUt(){
        echo "navn: ".$this->navn. "<br>";
        echo "kjonn: ".$this->kjonn. "<br>";
        echo "tidspunkt: ".$this->tidspunkt. "<br>";
        }
        }
        
        