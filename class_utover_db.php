<?php
include_once 'class_utover.php';
class utover_db{
    public $db;
    public function __construct($db) {
        $this->db=$db;
    }
    public function hentAlle(){
        $utovere=array();
        $sql = 'SELECT * FROM utover;';
        $res = $this->db->query($sql);
        if(!$res){
            echo '<p>Fant ingen utøver!</p>';
        }
        else{
            $antall_rader = $this->db->affected_rows;
            for ($i=0; $i < $antall_rader; $i++){
                $rad = $res->fetch_object();
                $utover= new utover($rad->UtoverId, $rad->UtoverNavn, $rad->UtoverKjonn, $rad->UtoverNationalitet);
                $utovere[]=$utover;
            }   
        }
        return $utovere;
    }
    
    public function hentUtover($id){
        $sql = 'SELECT * FROM utover WHERE UtoverId='.$id.";";
        $res = $this->db->query($sql);
        if(!$res){
            echo '<p>Fant ingen utøver!</p>';
        }
        else{
            $rad = $res->fetch_object();
            $utover= new utover($rad->UtoverId, $rad->UtoverNavn, $rad->UtoverKjonn, $rad->UtoverNationalitet);
        }   
        return $utover;
    } 
    
    public function lagre($utover){
        $sql = "INSERT INTO utover(UtoverNavn, UtoverKjonn, UtoverNationalitet)
           VALUES('$utover->navn', '$utover->kjonn', '$utover->nationalitet')";
        $res = $this->db->query($sql);
        if (!$res){
            echo '<p> Feil ved lagring </p>';
        }
        else {
            $antall_rader = $this->db->affected_rows;
            if ($antall_rader ==0){
                echo '<p>Feil ved lagring!</p>';
            }
        }
    }
}