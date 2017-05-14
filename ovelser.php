<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title></title>
    </head>
    <body><div class="container">
<?php
include_once 'meny.php';
echo "<br>";
echo "<h2>Øvelser</h2>";
echo "<br>";
include_once "class_ovelse.php";
include_once "class_ovelse_db.php";

$db=new mysqli('localhost', 'root', '', 'ski');
$ovelseDb=new ovelse_db($db);

if(isset($_POST['Registrer'])){
    $navn = $db->real_escape_string($_POST['navn']);
    $kjonn = $db->real_escape_string($_POST['kjonn']);
    $tidspunkt = $db->real_escape_string($_POST['tidspunkt']);
    if (!preg_match('/./', $navn) ){
        echo "Du må oppgi gyldig navn på øvelse!<br><br>";
    }
    else {
        $ovelse=new Ovelse(0, $navn, $kjonn, $tidspunkt);
        $ovelseDb->lagre($ovelse);
    }
}

if(isset($_POST['Endre'])){
    $id = $db->real_escape_string($_POST['id']);
    $navn = $db->real_escape_string($_POST['navn']);
    $kjonn = $db->real_escape_string($_POST['kjonn']);
    $tidspunkt = $db->real_escape_string($_POST['tidspunkt']);
    if (!preg_match('/./', $navn) ){
        echo "Du må oppgi gyldig navn på øvelse!<br><br>";
    }
    else {
        $ovelse=new Ovelse($id, $navn, $kjonn, $tidspunkt);
        $ovelseDb->endre($ovelse);
    }
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
?>
</div></body>