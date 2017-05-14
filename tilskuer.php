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
echo "<h2>Informasjon tilskuer med id nummer ". $_REQUEST["id"]. "</h2>";

include_once "class_tilskuer.php";
include_once "class_tilskuer_db.php";
include_once "liste.php";
echo "<br>";

$db=new mysqli('localhost', 'root', '', 'ski');
$tilskuerDb=new tilskuer_db($db);

if(isset($_POST['Registrer']))
{
    $tilskuerId = $db->real_escape_string($_POST['id']);
    $ovelseId = $db->real_escape_string($_POST['OvelseId']);
    $tilskuerDb->lagreOvelse($tilskuerId, $ovelseId);
}

$tilskuer=$tilskuerDb->hentTilskuer($_REQUEST["id"]);    
$tilskuer->skrivUt();

echo "<h2>Øvelser tilskuer skal på:</h2>";
$ovelser = $tilskuerDb->hentTilskuerSineOvelser($_REQUEST["id"]);
foreach ($ovelser as $ovelse){
    $ovelse->skrivUt();
    echo "<br>";
    }  

echo "<br>"; 

?>

<form action="tilskuer.php" method="POST">
    

<?php
echo '<input type="hidden" value="'.$_REQUEST["id"].'" name="id"/>';
echo lagListe($ovelser);
?>
<input type="submit" value="Registrer" name="Registrer"/>    
</form>
</div></body>

