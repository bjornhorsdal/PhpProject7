<?php
echo "Informasjon utover  ". $_REQUEST["id"]. "<br>";

include_once "class_utover.php";
echo "<br>";
echo "<br>";
$ovelser = array();
            
$db=new mysqli('localhost', 'root', '', 'ski');
$sql = 'SELECT * FROM utover WHERE UtoverId='.$_REQUEST["id"].";";
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
    
            $utover->skrivUt();
           
        }    

?>        

<a href="regUtover.php">Registrer ny utøver</a>
<br>