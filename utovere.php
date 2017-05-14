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
echo "<h2>Utøvere</h2>";
echo "<br>";
include_once "class_utover.php";
include_once "class_utover_db.php";

$db=new mysqli('localhost', 'root', '', 'ski');
$utoverDb=new utover_db($db);
if(isset($_POST['registrer'])){
    $navn = $db->real_escape_string($_POST['navn']);
    $kjonn = $db->real_escape_string($_POST['kjonn']);
    $nationalitet = $db->real_escape_string($_POST['nationalitet']);
    if (!preg_match('/./', $navn) ){
        echo "Du må oppgi gyldig navn på utøver!<br><br>";
    }
    else {
        $utover=new Utover(0, $navn, $kjonn, $nationalitet);
        $utoverDb->lagre($utover);   
    }
}

if(isset($_POST['Endre'])){
    $id = $db->real_escape_string($_POST['id']);
    $navn = $db->real_escape_string($_POST['navn']);
    $kjonn = $db->real_escape_string($_POST['kjonn']);
    $nationalitet = $db->real_escape_string($_POST['nationalitet']);
    if (!preg_match('/./', $navn) ){
        echo "Du må oppgi gyldig navn på utøver!<br><br>";
    }
    else {
        $utover=new Utover($id, $navn, $kjonn, $nationalitet);
        $utoverDb->endre($utover);
    }
}
            
$utovere = $utoverDb->hentAlle();
                                  
foreach($utovere as $utover){
    //<a href="utover.php">Utøver</a>
            echo "<a href='utover.php";
            echo "?id=". $utover->id. "'>";
            $utover->skrivUtOverskrift();
            echo "</a><br>";
        }   
      
if (in_array('admin', $_SESSION) && $_SESSION['admin']==TRUE){     
    echo '<br><a href="regUtover.php">Registrer utøver</a><br>';
}    
         
?>
</div></body>
