<?php
//<option value="Heat">Heat</option>

function lagListe($ovelser){
    $res='<select name="Ovelser">';
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