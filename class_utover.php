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
        echo "navn: ".$this->navn. "<br>";
        echo "kjonn: ".$this->kjonn. "<br>";
        echo "nationalitet: ".$this->nationalitet. "<br>";
        }
        function skrivUtOverskrift(){
        echo "$this->navn<br>";
        }
        }
