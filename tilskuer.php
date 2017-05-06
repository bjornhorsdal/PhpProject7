<?php
echo "Informasjon tilskuer  ". $_REQUEST["id"]. "<br>";

include_once "class_tilskuer.php";
include_once "class_tilskuer_db.php";
echo "<br>";
echo "<br>";
$db=new mysqli('localhost', 'root', '', 'ski');
$tilskuerDb=new tilskuer_db($db);
$tilskuer=$tilskuerDb->hentTilskuer($_REQUEST["id"]);    
$tilskuer->skrivUt();
?>        

<a href="regTilskuer.php">Registrer ny tilskuer</a>
<br>