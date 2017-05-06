<?php
echo "Informasjon utover  ". $_REQUEST["id"]. "<br>";

include_once "class_utover.php";
include_once "class_utover_db.php";
echo "<br>";
echo "<br>";
            
$db=new mysqli('localhost', 'root', '', 'ski');
$utoverDb=new utover_db($db);
$utover=$utoverDb->hentUtover($_REQUEST["id"]);
$utover->skrivUt();

?>        

<a href="regUtover.php">Registrer ny utøver</a>
<br>