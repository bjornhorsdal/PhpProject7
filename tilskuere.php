<?php
include_once 'meny.php';
echo "<br>";
echo "<h2>Tilskuere</h2>";
echo "<br>";
include_once "class_tilskuer.php";
include_once "class_tilskuer_db.php";
echo "<br>";

$db=new mysqli('localhost', 'root', '', 'ski');
$tilskuerDb=new tilskuer_db($db);
if(isset($_POST['registrer']))
{
	$navn = $db->real_escape_string($_POST['navn']);
	$bosted = $db->real_escape_string($_POST['bosted']);
	$nationalitet = $db->real_escape_string($_POST['nationalitet']);
        $tilskuer=new Tilskuer(0, $navn, $bosted, $nationalitet);
        $tilskuerDb->lagre($tilskuer);
	
}
   
$tilskuere = $tilskuerDb->hentAlle();
                            
foreach($tilskuere as $tilskuer){
    //<a href="class.php">Tilskuer</a>  
            echo "<a href='tilskuer.php";
            echo "?id=". $tilskuer->id. "'>";
            $tilskuer->skrivUtOverskrift();
            echo "</a><br>";
        }    
?>
<br>
<a href="regTilskuer.php">Registrer tilskuer</a>
<br>        
