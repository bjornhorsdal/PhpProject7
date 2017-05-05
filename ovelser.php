<?php

include_once "class_ovelse.php";
echo "<br>";
echo "<br>";
$db=new mysqli('localhost', 'root', '', 'ski');

if(isset($_REQUEST['Registrer']))
{
	
	$navn = $_REQUEST['navn'];
	$kjonn = $_REQUEST['kjonn'];
	$tidspunkt = $_REQUEST['tidspunkt'];
        $sql = "INSERT INTO ovelse(OvelseNavn, OvelseKjonn, OvelseTidspunkt)
           VALUES('$navn', '$kjonn', '$tidspunkt')";
       echo "<br>";
       $res = $db->query($sql);
            if (!$res) {
           echo '<p> Feil ved lagring </p>';
    }
    else {
        $antall_rader = $db->affected_rows;
        if ($antall_rader ==0){
            echo '<p>Feil ved lagring!</p>';
        }
    }
	
}

$ovelser = array();
            
$sql = 'SELECT * FROM ovelse;';
$res = $db->query($sql);
        if(!$res){
            echo '<p>Fant ingen øvelse!</p>';
        }
        else{
            $antall_rader = $db->affected_rows;
            for ($i=0; $i < $antall_rader; $i++){
                $rad = $res->fetch_object();
                $ovelse= new ovelse($rad->OvelseId, $rad->OvelseNavn, $rad->OvelseKjonn, $rad->OvelseTidspunkt);
                $ovelser[]=$ovelse;
                               
            }   
        }
        
                               
foreach($ovelser as $ovelse){
    //<a href="ovelser.php">Øvelser</a>
            echo "<a href='ovelse.php";
            echo "?id=". $ovelse->id. "'>";
            $ovelse->skrivUtOverskrift();
            echo "</a><br>";
        }    

?>        

<a href="regOvelse.php">Registrer ny øvelse</a>
<br>