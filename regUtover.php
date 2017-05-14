<?php
include_once 'meny.php';
echo "<br>";
include_once 'class_utover_db.php';
if(isset($_POST['Endre'])){
    $db=new mysqli('localhost', 'root', '', 'ski');
    $utoverDb=new utover_db($db);
    $utover=$utoverDb->hentUtover($db->real_escape_string($_POST["id"]));
    echo "<h2>Endring av utøver</h2>";
    echo '<form action="utovere.php" method="POST">';
    echo "<table>";
    echo "<tr><td>Navn</td><td><input type='text' name='navn' value='$utover->navn'/></td></tr>";
    echo "<tr><td>Kjønn</td><td><input type='text' name='kjonn' value='$utover->kjonn'/></td></tr>";
    echo "<tr><td>Nationalitet</td><td><input type='text' name='nationalitet' value='$utover->nationalitet'/></td></tr>";
    echo "<tr><td><input type='hidden' value='$utover->id' name='id'/></td></tr>";
    echo "<tr><td><input type='submit' value='Endre' name='Endre'/></td></tr>";
    echo "</table>";
    echo "</form>";
    echo "<br>";
}
?>
<h2>Registrering av ny utøver</h2>
       
<form action="utovere.php" method="POST">
    <table>
        <tr>
            <td>Navn</td><td><input type="text" name="navn"/></td>
        </tr>
        <tr>
            <td>Kjønn</td><td><input type="text" name="kjonn"/></td>
        </tr>
        <tr>
            <td>Nationalitet</td><td><input type="text" name="nationalitet"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Registrer" name="registrer"/></td>
        </tr>
    </table>    
</form>    


                