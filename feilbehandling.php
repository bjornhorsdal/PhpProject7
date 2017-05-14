
<?php
error_reporting(0);
function loggFeil($feilmelding){
    $dato = date("d-m-Y H:i");
    error_log("$dato $feilmelding\n",3, "feilLogg.txt");
}
?>

