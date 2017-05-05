<?php
echo "Informasjon øvelse  ". $_REQUEST["id"]. "<br>";

include_once "class_ovelse.php";
echo "<br>";
echo "<br>";
$ovelser = array();
            
$db=new mysqli('localhost', 'root', '', 'ski');
$sql = 'SELECT * FROM ovelse WHERE OvelseId='.$_REQUEST["id"].";";
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
    
            $ovelse->skrivUt();
           
        }    

?>        

<a href="regOvelse.php">Registrer ny øvelse</a>
<br>