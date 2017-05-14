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
echo "<h2>Tilskuere</h2>";
echo "<br>";
include_once "class_tilskuer.php";
include_once "class_tilskuer_db.php";
echo "<br>";

$db=new mysqli('localhost', 'root', '', 'ski');
$tilskuerDb=new tilskuer_db($db);
if(isset($_POST['registrer']))
{
    $navn = $db->real_escape_string($_POST['navn']);
    $bosted = $db->real_escape_string($_POST['bosted']);
    $telefon = $db->real_escape_string($_POST['telefon']);
    $epost = $db->real_escape_string($_POST['epost']);
    $nationalitet = $db->real_escape_string($_POST['nationalitet']);
    if (!preg_match('/^[\d]+$/',$telefon) || !preg_match('/@/', $epost) || 
        !preg_match('/./', $navn) ){
        echo "Du må oppgi gyldig navn, epost og telefonnummer!<br><br>";
    }
    else {
        $tilskuer=new Tilskuer(0, $navn, $bosted, $telefon, $epost, $nationalitet);
        $tilskuerDb->lagre($tilskuer);
    }
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
<br>
<a href="regTilskuer.php">Registrer tilskuer</a>
<br>     
</div></body>
