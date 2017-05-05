<?php
echo "Tilskuer";
include_once "class_tilskuer.php";
echo "<br>";
echo "<br>";
$db=new mysqli('localhost', 'root', '', 'ski');
if(isset($_REQUEST['registrer']))
{
	$navn = $_REQUEST['navn'];
	$bosted = $_REQUEST['bosted'];
	$nationalitet = $_REQUEST['nationalitet'];
	$sql = "INSERT INTO tilskuer(TilskuerNavn, TilskuerBosted, TilskuerNationalitet)
           VALUES('$navn', '$bosted', '$nationalitet')";
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
   
$tilskuere = array();
            
$sql = 'SELECT * FROM tilskuer;';
$res = $db->query($sql);
        if(!$res){
            echo '<p>Fant ingen tilskuer!</p>';
                 }
        else{
            $antall_rader = $db->affected_rows;
            for ($i=0; $i < $antall_rader; $i++){
                $rad = $res->fetch_object();
                $tilskuer= new tilskuer($rad->TilskuerId, $rad->TilskuerNavn, $rad->TilskuerBosted, $rad->TilskuerNationalitet);
                $tilskuere[]=$tilskuer;
                               
            }   
        }
        
                               
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
