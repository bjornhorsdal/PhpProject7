<?php
session_start();
echo '<tr><table>';
echo '<td><a href="index.php">Forside</a></td>';
echo '<td><a href="ovelser.php">Øvelser</a></td>';
echo '<td><a href="tilskuere.php">Tilskuere</a></td>';
echo '<td><a href="utovere.php">Utøvere</a></td>';
if (in_array('admin', $_SESSION) && $_SESSION['admin']==TRUE){
    echo '<form action="login.php" method="GET">';
    echo '<td><input type="submit" value="Logg ut" name="loginnut"/></td>';
    echo '</form>';
}
else {
    echo '<td><a href="login.php">Logg inn</a></td>';
}
echo '</tr></table>';
?>
