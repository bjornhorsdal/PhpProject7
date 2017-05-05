<h3>Registrering av Øvelse</h3>
        
<form action="regOvelse.php" method="Get">
            <table>
                <tr>
                    <td>Navn på øvelse</td><td><input type="text" name="navn"/></td>
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

<?php
if(isset($_REQUEST['Registrer']))
{
	echo "<table>";
	echo "<tr><td>Navn på øvelse:</td><td>".$_REQUEST['navn']."<td></tr>";
	echo "<tr><td>Kjønn:</td><td>".$_REQUEST['kjonn']."</td></tr>";
	echo "<tr><td>Tidpunkt:</td><td>".$_REQUEST['tidspunkt']."</td></tr>";
	echo "</table>";
}
?>                