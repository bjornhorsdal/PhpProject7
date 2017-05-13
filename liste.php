<?php
include_once 'class_ovelse_db.php';

function lagListe(){
    $db=new mysqli('localhost', 'root', '', 'ski');
    $ovelseDb=new ovelse_db($db);
    $ovelser=$ovelseDb->hentAlle();
    $res='<select name="OvelseId">';
    foreach ($ovelser as $ovelse){
        $res.='<option value="';
        $res.=$ovelse->id;
        $res.='">';
        $res.=$ovelse->navn;
        $res.='</option>';
    }
    $res.="</select>";
    return $res;
                        
}