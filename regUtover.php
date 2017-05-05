<h3>Registrering av utøver</h3>
        
        <form action="utover.php" method="Get">
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
<?php
if(isset($_REQUEST['Registrer']))
{
	echo "<table>";
	echo "<tr><td>Navn på utøver:</td><td>".$_REQUEST['navn']."<td></tr>";
	echo "<tr><td>Kjønn:</td><td>".$_REQUEST['kjonn']."</td></tr>";
	echo "<tr><td>Nationalitet:</td><td>".$_REQUEST['tidspunkt']."</td></tr>";
	echo "</table>";
}
?>                          

                