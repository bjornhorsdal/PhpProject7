<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<h2>Prosjektoppgave 2017 - Webprogrammering PHP</h2>";
        echo "<br>";
        echo "Oppgave 1";
        echo "<br>";
        include_once'ovelse.php';
        include_once'utover.php';
        include_once'publikum.php';
        $ovelse=new ovelse("bjorn", "mann", "09.04");
        $ovelse->skrivUt();
        $utover=new Utover("bjorn", "mann", "norge");
        $utover->skrivUt();
        $publikum=new Publikum("bjorn", "oslo", "norge");
        $publikum->skrivUt();
        
        ?>
        <a href="regPublikum.php">Registrering av publikum</a>
    </body>
</html>
