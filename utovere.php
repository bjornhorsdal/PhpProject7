<?php
include_once 'meny.php';
echo "<br>";
echo "<h2>Utøvere</h2>";
echo "<br>";
include_once "class_utover.php";
include_once "class_utover_db.php";

$db=new mysqli('localhost', 'root', '', 'ski');
$utoverDb=new utover_db($db);
if(isset($_REQUEST['registrer']))
{
	$navn = $_REQUEST['navn'];
	$kjonn = $_REQUEST['kjonn'];
	$nationalitet = $_REQUEST['nationalitet'];
	$utover=new Utover(0, $navn, $kjonn, $nationalitet);
        $utoverDb->lagre($utover);        
}
            
$utovere = $utoverDb->hentAlle();
                                  
foreach($utovere as $utover){
    //<a href="utover.php">Utøver</a>
            echo "<a href='utover.php";
            echo "?id=". $utover->id. "'>";
            $utover->skrivUtOverskrift();
            echo "</a><br>";
        }   

         
?>
<br>
<a href="regUtover.php">Registrer utøver</a>
<br>             
