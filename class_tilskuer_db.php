<?php
include_once 'class_tilskuer.php';
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
            echo '<p>Fant ingen tilskuer!</p>';
        }
        else{
            $antall_rader = $this->db->affected_rows;
            for ($i=0; $i < $antall_rader; $i++){
                $rad = $res->fetch_object();
                $tilskuer= new tilskuer($rad->TilskuerId, $rad->TilskuerNavn, $rad->TilskuerBosted, $rad->TilskuerNationalitet);
                $tilskuere[]=$tilskuer;
            }   
        }
        return $tilskuere;
    }
    
    public function hentTilskuer($id){
        $sql = 'SELECT * FROM tilskuer WHERE TilskuerId='.$_REQUEST["id"].";";
        $res = $this->db->query($sql);
        if(!$res){
            echo '<p>Fant ingen tilskuer!</p>';
        }
        else{
            $rad = $res->fetch_object();
            $tilskuer= new tilskuer($rad->TilskuerId, $rad->TilskuerNavn, $rad->TilskuerBosted, $rad->TilskuerNationalitet);
        }
        return $tilskuer;
    }
    
    public function lagre($tilskuer) {
        $sql = "INSERT INTO tilskuer(TilskuerNavn, TilskuerBosted, TilskuerNationalitet)
           VALUES('$tilskuer->navn', '$tilskuer->bosted', '$tilskuer->nationalitet')";
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


