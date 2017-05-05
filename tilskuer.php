<?php
echo "Informasjon tilskuer  ". $_REQUEST["id"]. "<br>";

include_once "class_tilskuer.php";
echo "<br>";
echo "<br>";
$tilskuere = array();
            
$db=new mysqli('localhost', 'root', '', 'ski');
$sql = 'SELECT * FROM tilskuer WHERE TilskuerId='.$_REQUEST["id"].";";
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
    
            $tilskuer->skrivUt();
           
        }    

?>        

<a href="regTilskuer.php">Registrer ny tilskuer</a>
<br>