<?php
include_once 'meny.php';
echo "<br>";
?>
<h2>Registrering av tilskuer</h2>
        
<form action="tilskuere.php" method="POST">
    <table>
        <tr>
            <td>Navn</td><td><input type="text" name="navn"/></td>
        </tr>
        <tr>
            <td>Bosted</td><td><input type="text" name="bosted"/></td>
        </tr>
        <tr>
            <td>Telefon</td><td><input type="text" name="telefon"/></td>
        </tr>
        <tr>
            <td>Epost</td><td><input type="text" name="epost"/></td>
        </tr>
        <tr>
            <td>Nationalitet</td><td><input type="text" name="nationalitet"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Registrer" name="registrer"/></td>
        </tr>
    </table>
</form>

            