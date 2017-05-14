<?php
include_once 'class_ovelse.php';
include_once 'class_ovelse_db.php';
include_once 'class_tilskuer_db.php';
include_once 'class_utover_db.php';
include_once 'feilbehandling.php';

class ovelse_db{
    public $db;
    public function __construct($db) {
        $this->db=$db;
    }
    
    public function hentAlle(){
        $ovelser = array();
        $sql = 'SELECT * FROM ovelse;';
        $res = $this->db->query($sql);
        if(!$res){
            $feilmelding='Fant ingen øvelse!';
            loggFeil($feilmelding);
            echo "$feilmelding<br>";
        }
        else {
            $antall_rader = $this->db->affected_rows;
            for ($i=0; $i < $antall_rader; $i++){
                $rad = $res->fetch_object();
                $ovelse= new ovelse($rad->OvelseId, $rad->OvelseNavn, $rad->OvelseKjonn, $rad->OvelseTidspunkt);
                $ovelser[]=$ovelse;
            }   
        }
        return $ovelser;
    }
    
    public function hentOvelse($id) {
        $sql = 'SELECT * FROM ovelse WHERE OvelseId='.$id.";";
        $res = $this->db->query($sql);
        if(!$res){
          $feilmelding='Fant ingen øvelse!';
          error_log($feilmelding, 3, "feilLogg.txt");
            echo "$feilmelding<br>";
        }
        else{
            $antall_rader = $this->db->affected_rows;
            $rad = $res->fetch_object();
            $ovelse= new ovelse($rad->OvelseId, $rad->OvelseNavn, $rad->OvelseKjonn, $rad->OvelseTidspunkt);
        }
        return $ovelse;
    }
    
    public function lagre($ovelse) {
        $sql = "INSERT INTO ovelse(OvelseNavn, OvelseKjonn, OvelseTidspunkt)
             VALUES('$ovelse->navn', '$ovelse->kjonn', '$ovelse->tidspunkt')";
        $res = $this->db->query($sql);
        if (!$res) {
            $feilmelding='Feil ved lagring';
            error_log($feilmelding, 3, "feilLogg.txt");
            echo "$feilmelding<br>";
        }
        else {
            $antall_rader = $this->db->affected_rows;
            if ($antall_rader ==0){
                $feilmedling='Feil ved lagring';
                error_log($feilmelding, 3, "feilLogg.txt");
                echo "$feilmelding<br>";
            }
        }
    }
    public function hentOvelseTilskuere($id) {
        $sql = "SELECT TilskuerId  FROM `ovelsetilskuer` WHERE OvelseId='$id';";
        $res = $this->db->query($sql);
        $tilskuere = array();
        if(!$res){
            $feilmelding='Fant ingen øvelse';
            error_log($feilmelding, 3, "feilLogg.txt");
            echo "$feilmelding<br>";
        }
        else{
            $tilskuerDb=new tilskuer_db($this->db);
            $antall_rader = $this->db->affected_rows;
            for($i=0; $i<$antall_rader; $i++){
                $rad = $res->fetch_object();
                $tilskuer=$tilskuerDb->hentTilskuer($rad->TilskuerId); 
                $tilskuere[]=$tilskuer;
            }
        }
        return $tilskuere;
    }
    public function hentOvelseUtovere($id) {
        $sql = "SELECT UtoverId  FROM `ovelseutover` WHERE OvelseId='$id';";
        $res = $this->db->query($sql);
        $utovere = array();
        if(!$res){
            $feilmelding='Fant ingen øvelse';
            error_log($feilmelding, 3, "feilLogg.txt");
            echo "$feilmelding<br>";
        }
        else{
            $utoverDb=new utover_db($this->db);
            $antall_rader = $this->db->affected_rows;
            for($i=0; $i<$antall_rader; $i++){
                $rad = $res->fetch_object();
                $utover=$utoverDb->hentUtover($rad->UtoverId); 
                $utovere[]=$utover;
            }
        }
        return $utovere;
    }
    public function endre($ovelse) {
        $sql = "UPDATE ovelse SET OvelseNavn='$ovelse->navn', OvelseKjonn='$ovelse->kjonn', "
                . "OvelseTidspunkt='$ovelse->tidspunkt' WHERE OvelseId='$ovelse->id';";
        $res = $this->db->query($sql);
        if (!$res) {
            $feilmelding='Feil ved oppdatering';
            error_log($feilmelding, 3, "feilLogg.txt");
            echo "$feilmelding<br>";
        }
        else {
            $antall_rader = $this->db->affected_rows;
            if ($antall_rader ==0){
                $feilmelding='Feil ved oppdatering';
                error_log($feilmelding, 3, "feilLogg.txt");
                echo "$feilmelding<br>";
            }
        }
    }
}


