<?php
include_once 'class_tilskuer.php';
include_once 'class_ovelse_db.php';
include_once 'feilbehandling.php';

class tilskuer_db{
    public $db;
    public function __construct($db) {
        $this->db=$db;
    }
    
    public function hentAlle(){
        $tilskuere=array();
        $sql = 'SELECT * FROM tilskuer;';
        $res = $this->db->query($sql);
        if(!$res){
            $feilmelding='Fant ingen tilskuer!';
            loggFeil($feilmelding);
            echo "$feilmelding<br>";
        }
        else{
            $antall_rader = $this->db->affected_rows;
            for ($i=0; $i < $antall_rader; $i++){
                $rad = $res->fetch_object();
                $tilskuer= new tilskuer($rad->TilskuerId, $rad->TilskuerNavn, $rad->TilskuerBosted, 
                        $rad->TilskuerTelefon, $rad->TilskuerEpost, $rad->TilskuerNationalitet);
                $tilskuere[]=$tilskuer;
            }   
        }
        return $tilskuere;
    }
    
    public function hentTilskuer($id){
        $sql = "SELECT * FROM tilskuer WHERE TilskuerId='$id';";
        $res = $this->db->query($sql);
        if(!$res){
            $feilmelding='Fant ingen tilskuer!';
            loggFeil($feilmelding);
            echo "$feilmelding<br>";
        }
        else{
            $rad = $res->fetch_object();
            $tilskuer= new Tilskuer($rad->TilskuerId, $rad->TilskuerNavn, $rad->TilskuerBosted, 
                    $rad->TilskuerTelefon, $rad->TilskuerEpost,$rad->TilskuerNationalitet);
        }
        return $tilskuer;
    }
    
    public function lagre($tilskuer) {
        $sql = "INSERT INTO tilskuer(TilskuerNavn, TilskuerBosted, TilskuerTelefon, TilskuerEpost, TilskuerNationalitet)
           VALUES('$tilskuer->navn', '$tilskuer->bosted', '$tilskuer->telefon', "
                . "'$tilskuer->epost','$tilskuer->nationalitet');";
        $res = $this->db->query($sql);
        if (!$res){
            $feilmelding='Feil ved lagring!';
            loggFeil($feilmelding);
            echo "$feilmelding<br>";
        }
        else {
            $antall_rader = $this->db->affected_rows;
            if ($antall_rader ==0){
                $feilmelding='Feil ved lagring!';
                loggFeil($feilmelding);
                echo "$feilmelding<br>";
            }
        }
    }
    
    public function hentTilskuerSineOvelser($id){
        $sql = "SELECT OvelseId  FROM `ovelsetilskuer` WHERE TilskuerId='$id';";
        $res = $this->db->query($sql);
        $ovelser = array();
        if(!$res){
            $feilmelding='Fant ingen øvelse på denne tilskuer!';
            loggFeil($feilmelding);
            echo "$feilmelding<br>";
        }
        else{
            $ovelseDb=new ovelse_db($this->db);
            $antall_rader = $this->db->affected_rows;
            for($i=0; $i<$antall_rader; $i++){
                $rad = $res->fetch_object();
                $ovelse=$ovelseDb->hentOvelse($rad->OvelseId); 
                $ovelser[]=$ovelse;
            }
        }
        return $ovelser;
    }
    
    public function lagreOvelse($TilskuerId, $OvelseId){
        $sql = "INSERT INTO `ovelsetilskuer` (TilskuerId, OvelseId)
           VALUES('$TilskuerId', '$OvelseId');";
        $res = $this->db->query($sql);
        if(!$res){
                $feilmelding='Feil ved lagring!';
                loggFeil($feilmelding);
                echo "$feilmelding<br>";
        }
        else{
            $antall_rader = $this->db->affected_rows;
            if ($antall_rader==0){
                $feilmelding='Feil ved lagring!';
                loggFeil($feilmelding);
                echo "$feilmelding<br>";
            }
        }
    }
}


