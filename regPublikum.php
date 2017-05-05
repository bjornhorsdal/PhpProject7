 <h3>Registrering av publikum</h3>
        
        <form action="publikum.php" method="Get">
            <table>
                <tr>
                    <td>Navn</td><td><input type="text" name="navn"/></td>
                </tr>
                <tr>
                    <td>Bosted</td><td><input type="text" name="bosted"/></td>
                </tr>
                <tr>
                    <td>Nationalitet</td><td><input type="text" name="nationalitet"/></td>
                </tr>
                 <tr>
                    <td><input type="submit" value="Registrer" name="registrer"/></td>
                </tr>

<?php
if(isset($_REQUEST['Registrer']))
{
	echo "<table>";
	echo "<tr><td>Navn:</td><td>".$_REQUEST['navn']."<td></tr>";
	echo "<tr><td>Bosted:</td><td>".$_REQUEST['bosted']."</td></tr>";
	echo "<tr><td>Nationalitet:</td><td>".$_REQUEST['nationalitet']."</td></tr>";
	echo "</table>";
}
?>                               