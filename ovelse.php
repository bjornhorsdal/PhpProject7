<?php
echo "Informasjon øvelse  ". $_REQUEST["id"]. "<br>";

include_once "class_ovelse.php";
include_once "class_ovelse_db.php";
include_once 'class_tilskuer.php';
echo "<br>";
echo "<br>";
$db=new mysqli('localhost', 'root', '', 'ski');
$ovelseDb=new ovelse_db($db);
$ovelse=$ovelseDb->hentOvelse($_REQUEST["id"]);
$ovelse->skrivUt();
echo "<h2>Tilskuere<h2>";
$tilskuere = $ovelseDb->hentOvelseTilskuere($_REQUEST["id"]);
foreach ($tilskuere as $tilskuer){
    $tilskuer->skrivUt();
    }
           
?>        

<a href="regOvelse.php">Registrer ny øvelse</a>
<br>