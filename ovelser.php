<?php
include_once 'meny.php';
echo "<br>";
echo "<h2>Øvelser</h2>";
echo "<br>";
include_once "class_ovelse.php";
include_once "class_ovelse_db.php";

$db=new mysqli('localhost', 'root', '', 'ski');
$ovelseDb=new ovelse_db($db);

if(isset($_REQUEST['Registrer'])){
    $navn = $_REQUEST['navn'];
    $kjonn = $_REQUEST['kjonn'];
    $tidspunkt = $_REQUEST['tidspunkt'];
    $ovelse=new Ovelse(0, $navn, $kjonn, $tidspunkt);
    $ovelseDb->lagre($ovelse);
}

if(isset($_REQUEST['Endre'])){
    $id = $_REQUEST['id'];
    $navn = $_REQUEST['navn'];
    $kjonn = $_REQUEST['kjonn'];
    $tidspunkt = $_REQUEST['tidspunkt'];
    $ovelse=new Ovelse($id, $navn, $kjonn, $tidspunkt);
    $ovelseDb->endre($ovelse);
}

$ovelser = $ovelseDb->hentAlle();
            
foreach($ovelser as $ovelse){
    //<a href="ovelser.php">Øvelser</a>
            echo "<a href='ovelse.php";
            echo "?id=". $ovelse->id. "'>";
            $ovelse->skrivUtOverskrift();
            echo "</a><br>";
        }    
        
if (in_array('admin', $_SESSION) && $_SESSION['admin']==TRUE){     
    echo '<br><a href="regOvelse.php">Registrer ny øvelse</a><br>';
}    