<?php
echo "Tilskuer";
include_once "class_tilskuer.php";
include_once "class_tilskuer_db.php";
echo "<br>";
echo "<br>";
$db=new mysqli('localhost', 'root', '', 'ski');
$tilskuerDb=new tilskuer_db($db);
if(isset($_REQUEST['registrer']))
{
	$navn = $_REQUEST['navn'];
	$bosted = $_REQUEST['bosted'];
	$nationalitet = $_REQUEST['nationalitet'];
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
<a href="regTilskuer.php">Registrer tilskuer</a>
<br>        
