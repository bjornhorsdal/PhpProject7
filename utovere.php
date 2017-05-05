<?php
echo "Utøvere";
include_once "class_utover.php";
echo "<br>";
echo "<br>";
$utovere = array();
            
$utover = new Utover(1,"Oddvar Braa", "menn", "Norge");
$utovere[]=$utover;

$utover = new Utover(2,"Marit Bjorgen", "kvinne", "Norge");
$utovere[]=$utover;
                               
foreach($utovere as $utover){
    //<a href="utover.php">Utøver</a>
            echo "<a href='utover.php";
            echo "?id=". $utover->id. "'>";
            $utover->skrivUtOverskrift();
            echo "</a><br>";
        }    
?>

<a href="regUtover.php">Registrer utøver</a>
<br>             
