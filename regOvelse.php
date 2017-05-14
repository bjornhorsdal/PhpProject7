<html><head><title>Registrering av øvelse</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src ="validering.js"></script></head>
    <body><div class="container">

<?php
include_once 'meny.php';
echo "<br>";
include_once 'class_ovelse_db.php';

if(isset($_POST['Endre'])){
    $db=new mysqli('localhost', 'root', '', 'ski');
    $ovelseDb=new ovelse_db($db);
    $ovelse=$ovelseDb->hentOvelse($db->real_escape_string($_POST["id"]));
    echo "<h2>Endring av øvelse</h2>";
    echo '<form action="ovelser.php" method="POST" onsubmit="return valider_navn()">';
    echo "<table>";
    echo "<tr><td>Navn på øvelse</td><td><input type='text' name='navn' value='$ovelse->navn' id='navn'/></td></tr>";
    echo "<tr><td>Kjønn</td><td><input type='text' name='kjonn' value='$ovelse->kjonn'/></td></tr>";
    echo "<tr><td>Tidspunkt</td><td><input type='text' name='tidspunkt' value='$ovelse->tidspunkt'/></td></tr>";
    echo "<tr><td><input type='hidden' value='$ovelse->id' name='id'/></td></tr>";
    echo "<tr><td><input type='submit' value='Endre' name='Endre'/></td></tr>";
    echo "</table>";
    echo "</form>";
    echo "<br>";
}
?>
<h2>Registrering av ny øvelse</h2>
        
        <form action="ovelser.php" method="POST" onsubmit="return valider_navn()" >
    <table>
        <tr>
            <td>Navn på øvelse</td><td><input type="text" name="navn" id="navn"/></td>
        </tr>
        <tr>
            <td>Kjønn</td><td><input type="text" name="kjonn"/></td>
        </tr>
        <tr>
            <td>Tidspunkt</td><td><input type="text" name="tidspunkt"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Registrer" name="Registrer"/></td>
        </tr>
    </table>
</form>
    </div></body>
</html>