<?php
echo "Utøvere";
include_once "class_utover.php";
echo "<br>";
echo "<br>";
$db=new mysqli('localhost', 'root', '', 'ski');
if(isset($_REQUEST['registrer']))
{
	$navn = $_REQUEST['navn'];
	$kjonn = $_REQUEST['kjonn'];
	$nationalitet = $_REQUEST['nationalitet'];
	$sql = "INSERT INTO utover(UtoverNavn, UtoverKjonn, UtoverNationalitet)
           VALUES('$navn', '$kjonn', '$nationalitet')";
       $res = $db->query($sql);
            if (!$res){
           echo '<p> Feil ved lagring </p>';
            }
    else {
        $antall_rader = $db->affected_rows;
        if ($antall_rader ==0){
            echo '<p>Feil ved lagring!</p>';
             }
        }
}
            
$utovere = array();
            
$sql = 'SELECT * FROM utover;';
$res = $db->query($sql);
        if(!$res){
            echo '<p>Fant ingen utøver!</p>';
        }
        else{
            $antall_rader = $db->affected_rows;
            for ($i=0; $i < $antall_rader; $i++){
                $rad = $res->fetch_object();
                $utover= new utover($rad->UtoverId, $rad->UtoverNavn, $rad->UtoverKjonn, $rad->UtoverNationalitet);
                $utovere[]=$utover;
                               
            }   
        }
                                       
foreach($utovere as $utover){
    //<a href="utover.php">Utøver</a>
            echo "<a href='utover.php";
            echo "?id=". $utover->id. "'>";
            $utover->skrivUtOverskrift();
            echo "</a><br>";
        }    
?>

<a href="regUtover.php">Registrer utøver</a>
<br>             
