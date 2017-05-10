<?php
echo "Informasjon tilskuer  ". $_REQUEST["id"]. "<br>";

include_once "class_tilskuer.php";
include_once "class_tilskuer_db.php";
include_once "liste.php";
echo "<br>";
echo "<br>";
$db=new mysqli('localhost', 'root', '', 'ski');
$tilskuerDb=new tilskuer_db($db);

if(isset($_REQUEST['Registrer']))
{
	echo "sjekk";
        echo "<br>";
	$tilskuerId = 99; //$_REQUEST['navn'];
	$ovelseId = 33; //$_REQUEST['kjonn'];
	//$tilskuerDb->lagreOvelse($tilsuerId, $ovelseId);
       
}

$tilskuer=$tilskuerDb->hentTilskuer($_REQUEST["id"]);    
$tilskuer->skrivUt();

echo "<h2>Øvelser tilskuer skal på:</h2>";
$ovelser = $tilskuerDb->hentTilskuerSineOvelser($_REQUEST["id"]);
foreach ($ovelser as $ovelse){
    $ovelse->skrivUt();
    echo "<br>";
    }  

echo "<br>";    
?>

<form action="tilskuer.php">
    

<?php
echo '<input type="hidden" value="'.$_REQUEST["id"].'" name="id"/>';
echo lagListe($ovelser);
?>
<input type="submit" value="Registrer" name="Registrer"/>    
</form>

