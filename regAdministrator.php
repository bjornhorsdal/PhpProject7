<html><head><title>Registrering av administrator</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src ="validering.js"></script></head>
    <body><div class="container">

<?php
include_once 'meny.php';
echo "<br>";
$db=new mysqli('localhost', 'root', '', 'ski');
if(isset($_POST['registrer']))
{
    $navn = $db->real_escape_string($_POST['navn']);
    $epost = $db->real_escape_string($_POST['epost']);
    $brukerNavn = $db->real_escape_string($_POST['brukernavn']);
    $passord = $db->real_escape_string($_POST['passord']);
    if (!preg_match('/./', $brukerNavn) || !preg_match('/./', $passord)){
        echo "Du må oppgi gyldig brukernavn og passord!<br><br>";
    }
    else {
        $hashPassord = password_hash($passord, PASSWORD_BCRYPT);

        $sql = "INSERT INTO administrator(AdministratorNavn, AdministratorEpost, AdministratorBrukerNavn, AdministratorPassordHash)
           VALUES('$navn', '$epost', '$brukerNavn', '$hashPassord');";
        $res = $db->query($sql);
        if (!$res){
            echo '<p> Feil ved lagring!</p>';
            echo "$db->error<br>";
        }
        else {
            $antall_rader = $db->affected_rows;
            if ($antall_rader ==0){
                echo '<p>Feil ved lagring!</p>';
            }
        }
    }
}

?>

<h2>Registrering av ny administrator</h2>
       
<form action="regAdministrator.php" method="POST" onsubmit="return valider_administrator()">
    <table>
        <tr>
            <td>Navn</td><td><input type="text" name="navn"/></td>
        </tr>
        <tr>
            <td>Epost</td><td><input type="text" name="epost"/></td>
        </tr>
        <tr>
            <td>Brukernavn</td><td><input type="text" name="brukernavn" id="brukerNavn"/></td>
        </tr>
        <tr>
            <td>Passord</td><td><input type="password" name="passord" id="passord"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Registrer" name="registrer"/></td>
        </tr>
    </table>    
</form>    
</div></body>
