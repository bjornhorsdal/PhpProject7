<?php
echo "<h3>Informasjon om utøver id nummer ". $_REQUEST["id"]. "</h3>";

include_once "class_utover.php";
include_once "class_utover_db.php";
            
$db=new mysqli('localhost', 'root', '', 'ski');
$utoverDb=new utover_db($db);
$utover=$utoverDb->hentUtover($_REQUEST["id"]);
$utover->skrivUt();

echo "<h3>Øvelser utøver skal delta på:</h3>";
$ovelser = $utoverDb->hentUtoverSineOvelser($_REQUEST["id"]);
foreach ($ovelser as $ovelse){
    $ovelse->skrivUt();
    echo "<br>";
    } 
echo "<br>";
echo "<br>";
?>        

<a href="regUtover.php">Registrer ny utøver</a>
<br>