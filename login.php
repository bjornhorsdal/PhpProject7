<?php
session_start();
include_once 'administrator.php';
if(isset($_POST['login'])){
    $brukernavn = $_POST['brukernavn'];
    $passord = $_POST['passord'];
    if(brukerErAdministrator($brukernavn, $passord)){
        $_SESSION["admin"]=true;
    }
}

if(isset($_POST['loginnut'])){
    $_SESSION["admin"]=FALSE;
}
include_once 'meny.php';

?> 

<h2>Logg inn som administrator</h2>
       
<form action="login.php" method="POST">
    <table>
        <tr>
            <td>Brukernavn</td><td><input type="text" name="brukernavn"/></td>
        </tr>
        <tr>
            <td>Passord</td><td><input type="text" name="passord"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Logg inn" name="login"/></td>
        </tr>
    </table>
</form>

