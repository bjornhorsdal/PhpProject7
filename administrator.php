<?php
function brukerErAdministrator($brukerNavn, $passord){
    $administrator= hentAdministrator($brukerNavn, $passord);
    if($administrator==""){
        echo "Du er ikke administrator <br>";
        return FALSE;
    }
    else {
        echo "Du er logget inn <br>";
        return TRUE;
    }
}

function hentAdministrator($brukerNavn, $passord) {
    $db=new mysqli('localhost', 'root', '', 'ski');
    $administrator="";    
    $sql = "SELECT * FROM administrator WHERE AdministratorNavn='$brukerNavn' AND AdministratorPassordHash=PASSWORD('$passord');";
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
            $administrator=$rad->AdministratorNavn;
        }
    }
    return $administrator;
}
