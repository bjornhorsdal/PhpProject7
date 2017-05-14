<?php
function brukerErAdministrator($brukerNavn, $passord){
    $administrator= hentAdministrator($brukerNavn, $passord);
    if($administrator==""){
        echo "Du er ikke administrator!<br>";
        return FALSE;
    }
    else {
        echo "Du er logget inn!<br>";
        echo "Du kan nå opprette og endre øvelser og utøver.<br><br>";
        echo "Du kan også <a href='regAdministrator.php'> Registrere nye administratorkontoer</a>";
        return TRUE;
    }
}

function hentAdministrator($brukerNavn, $passord) {
    $db=new mysqli('localhost', 'root', '', 'ski');
    $administrator=""; 
    $sql = "SELECT * FROM administrator WHERE AdministratorBrukerNavn='$brukerNavn' ";
    $res = $db->query($sql);
    if(!$res){
      echo "<p>Feil i login!</p>";
      echo $db->error;
      echo "<br>";
    }
    else{
        $antall_rader = $db->affected_rows;
        if($antall_rader>0){
            $rad = $res->fetch_object();
            if(password_verify($passord, $rad->AdministratorPassordHash)){
                $administrator=$rad->AdministratorNavn;
            }
            else {
                echo "Feil brukernavn eller passord!<br>";
            }
        }
    }
    return $administrator;
}
