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



