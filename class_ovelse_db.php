<?php
include_once 'class_ovelse.php';
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
            echo '<p>Fant ingen øvelse!</p>';
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
            echo '<p>Fant ingen øvelse!</p>';
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


