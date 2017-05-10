<?php
include_once 'class_utover.php';
include_once 'class_tilskuer_db.php';
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
    
    public function hentUtoverSineOvelser($id){
    $sql = 'SELECT OvelseId  FROM `ovelseutover` WHERE UtoverID='.$id.";";
        $res = $this->db->query($sql);
        $ovelser = array();
        if(!$res){
            echo '<p>Fant ingen øvelse som denne utøver skal delta på!</p>';
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
}