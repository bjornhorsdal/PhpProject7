<?php
echo "Publikum";
include_once "class_tilskuer.php";
echo "<br>";
echo "<br>";
$tilskuere = array();
            
$tilskuer = new Tilskuer(1,"Bjorn Horsdal", "Oslo", "Norge");
$tilskuere[]=$tilskuer;

$tilskuer = new Tilskuer(2,"Ingve Vormestrand", "Oslo", "Norge");
$tilskuere[]=$tilskuer;
                               
foreach($tilskuere as $tilskuer){
    //<a href="class.php">Tilskuer</a>  
            echo "<a href='tilskuer.php";
            echo "?id=". $tilskuer->id. "'>";
            $tilskuer->skrivUtOverskrift();
            echo "</a><br>";
        }    
?>
<a href="regPublikum.php">Registrer publikum</a>
<br>        
