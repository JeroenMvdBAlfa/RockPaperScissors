<?php
include_once('header.php');
require_once('database/db.php');
echo '<form method="post" action="">';
echo '<input class="reset" type="submit" id="ResetScore" name="ResetScore" value="ResetScore">';
echo '</form>';

echo '<form method="post" action="">';
echo '<input class="reset" type="submit" id="ResetKeuze" name="ResetKeuze" value="ResetKeuze">';
echo '</form>';
$ResetScore = 'UPDATE `score` SET `Win` = 0, `Gelijk` = 0, `Verlies` = 0 WHERE `score`.`id` = 1';
$ResetKeuze = 'UPDATE `keuzespeler` SET `Steen` = 0, `Papier`= 0, `Schaar` = 0 WHERE `keuzespeler`.`Id` = 1';

foreach($score as $array) {
    echo 'Score: <br>';
    echo implode('<br>', $array) . '<br><br>';
}
foreach($keuzespeler as $array2) {
    echo 'Keuze Speler: <br>';
    echo implode('<br>', $array2) . '<br><br>';
}

if (isset($_POST['ResetScore'])) {
    $sth_score = $db_rpsgame->prepare($ResetScore);
    $sth_score->execute();
    echo '<pre>';
    var_dump($ResetScore);
    echo '</pre>';
} elseif (isset($_POST['ResetKeuze'])) {
    $sth_keuzespeler = $db_rpsgame->prepare($ResetKeuze);
    $sth_keuzespeler->execute();
    echo '<pre>';
    var_dump($ResetKeuze);
    echo '</pre>';
}
else {
    echo '';
}


