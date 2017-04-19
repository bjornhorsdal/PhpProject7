<?php
echo "Øvelse";
include_once "class_ovelse.php";
echo "<br>";
echo "<br>";
$ovelser = array();
            
$ovelse = new Ovelse(1,"50 km klassisk", "kvinner", "11.00");
$ovelser[]=$ovelse;

$ovelse = new Ovelse(2,"50 km klassisk", "menn", "15.00");
$ovelser[]=$ovelse;

$ovelse = new Ovelse(3, "10 km klassisk", "kvinner", "17.00");
$ovelser[]=$ovelse;

$ovelse = new Ovelse(4, "10 km klassisk", "menn", "19.00");
$ovelser[]=$ovelse;
                               
foreach($ovelser as $ovelse){
    //<a href="ovelser.php">Øvelser</a>
            echo "<a href='ovelse.php";
            echo "?id=". $ovelse->id. "'>";
            $ovelse->skrivUtOverskrift();
            echo "</a><br>";
        }    
        
