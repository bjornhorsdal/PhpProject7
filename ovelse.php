<?php
include_once 'meny.php';
echo "<h2>Informasjon øvelse id nummer ". $_REQUEST["id"]."</h2>";
echo "<br>";

include_once "class_ovelse.php";
include_once "class_ovelse_db.php";
include_once 'class_tilskuer.php';
include_once 'class_utover.php';

$db=new mysqli('localhost', 'root', '', 'ski');
$ovelseDb=new ovelse_db($db);
$ovelse=$ovelseDb->hentOvelse($_REQUEST["id"]);
$ovelse->skrivUt();
?>

<br>
<form action="regOvelse.php" method="GET">
<?php
echo'<input type="hidden" value="'.$_REQUEST["id"].'" name="id"/>';
if (in_array('admin', $_SESSION) && $_SESSION['admin']==TRUE){
    echo '<input type="submit" value="Endre" name="Endre"/></form>';
}

echo "<br>";
echo "<h2>Tilskuere</h2>";
$tilskuere = $ovelseDb->hentOvelseTilskuere($_REQUEST["id"]);
foreach ($tilskuere as $tilskuer){
    $tilskuer->skrivUtOverskrift();
    echo "<br>";
}

echo "<h2>Utøvere</h2>";
$utovere = $ovelseDb->hentOvelseUtovere($_REQUEST["id"]);
foreach ($utovere as $utover){
    $utover->skrivUtOverskrift();
    echo "<br>";
}    
echo "<br>";           
?>        
