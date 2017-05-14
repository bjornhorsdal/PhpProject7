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
	$navn = $_POST['navn'];
	$kjonn = $_POST['kjonn'];
	$nationalitet = $_POST['nationalitet'];
	$utover=new Utover(0, $navn, $kjonn, $nationalitet);
        $utoverDb->lagre($utover);        
}

if(isset($_POST['Endre'])){
    $id = $_POST['id'];
    $navn = $_POST['navn'];
    $kjonn = $_POST['kjonn'];
    $nationalitet = $_POST['nationalitet'];
    $utover=new Utover($id, $navn, $kjonn, $nationalitet);
    $utoverDb->endre($utover);
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
