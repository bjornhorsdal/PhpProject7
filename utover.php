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
echo "<h2>Informasjon om utøver med id nummer ". $_REQUEST["id"]. "</h2>";
echo "<br>";

include_once "class_utover.php";
include_once "class_utover_db.php";
include_once 'liste.php';
            
$db=new mysqli('localhost', 'root', '', 'ski');
$utoverDb=new utover_db($db);
$utover=$utoverDb->hentUtover($_REQUEST["id"]);
$utover->skrivUt();
?>

<br>
<form action="regUtover.php" method="POST">

<?php
echo'<input type="hidden" value="'.$_REQUEST["id"].'" name="id"/>';
if (in_array('admin', $_SESSION) && $_SESSION['admin']==TRUE){
    echo '<input type="submit" value="Endre" name="Endre"/></form>';
}
echo "</form><br>";


if(isset($_POST['Registrer']))
{
    $utoverId = $db->real_escape_string($_POST['id']);
    $ovelseId = $db->real_escape_string($_POST['OvelseId']);
    $utoverDb->lagreOvelse($utoverId, $ovelseId);
}

echo "<h2>Øvelser utøver skal delta på:</h2>";
$ovelser = $utoverDb->hentUtoverSineOvelser($_REQUEST["id"]);
foreach ($ovelser as $ovelse){
    $ovelse->skrivUt();
    echo "<br>";
} 
echo "<br>";

if (in_array('admin', $_SESSION) && $_SESSION['admin']==TRUE){  
    echo '<form action="utover.php" method="POST">';
    echo '<input type="hidden" value="'.$_REQUEST["id"].'" name="id"/>';
    echo lagListe();
    echo '<input type="submit" value="Registrer" name="Registrer"/></form>';    
}    
?>
</div></body>



