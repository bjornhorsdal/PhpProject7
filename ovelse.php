<?php
echo "Informasjon øvelse  ". $_REQUEST["id"]. "<br>";

include_once "class_ovelse.php";
include_once "class_ovelse_db.php";
echo "<br>";
echo "<br>";
$db=new mysqli('localhost', 'root', '', 'ski');
$ovelseDb=new ovelse_db($db);
$ovelse=$ovelseDb->hentOvelse($_REQUEST["id"]);
$ovelse->skrivUt();
           
?>        

<a href="regOvelse.php">Registrer ny øvelse</a>
<br>