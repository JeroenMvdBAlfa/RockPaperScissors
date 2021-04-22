<?php
include_once('header.php');
require_once('database/db.php');
require('compchoose.php');

echo '<form method="post" action="">';
echo '<input class="kies" type="submit" id="Rock" name="Rock" value="">';
echo '<input class="kies" type="submit" id="Paper" name="Paper" value="" />';
echo '<input class="kies" type="submit" id="Scissor" name="Scissor" value="" />';
echo '</form>';

$SteenQuery       = 'UPDATE `keuzespeler` SET `Steen` = `Steen` + 1 WHERE `keuzespeler`.`Id` = 1';
$PapierQuery       = 'UPDATE `keuzespeler` SET `Papier` = `Papier` + 1 WHERE `keuzespeler`.`Id` = 1';
$SchaarQuery       = 'UPDATE `keuzespeler` SET `Schaar` = `Schaar` + 1 WHERE `keuzespeler`.`Id` = 1';


echo '<p class="gekozen">Je hebt gekozen voor:</p>';
if (isset($_POST['Rock'])) {
    echo '<b class="gekozen">steen</b>';
    $sth_keuzespeler = $db_rpsgame->prepare($SteenQuery);
    $sth_keuzespeler->execute();
} elseif (isset($_POST['Paper'])) {
    echo '<b class="gekozen">papier</b>';
    $sth_keuzespeler = $db_rpsgame->prepare($PapierQuery);
    $sth_keuzespeler->execute();
} elseif (isset($_POST['Scissor'])) {
    echo '<b class="gekozen">schaar</b>';
    $sth_keuzespeler = $db_rpsgame->prepare($SchaarQuery);
    $sth_keuzespeler->execute();
} else {
    echo '';
}

/**
 * @param $WinQuery string everytime you win the database counts 1 extra win
 * @param $GelijkQuery string everytime you draw the database counts 1 extra draw
 * @param $VerliesQuery string everytime you lose the database counts 1 extra los
 */
$WinQuery       = 'UPDATE `score` SET `Win` = `Win` + 1 WHERE `score`.`id` = 1';
$GelijkQuery       = 'UPDATE `score` SET `Gelijk` = `Gelijk` + 1 WHERE `score`.`id` = 1';
$VerliesQuery      = 'UPDATE `score` SET `Verlies` = `Verlies` + 1 WHERE `score`.`id` = 1';

// this is checking what the computer picks and what you are picking and says if you win or lose
if ($ComRand === 1) {
    if (isset($_POST['Rock'])) {
        echo '<p>Het is <b>Gelijkspel</b> geworden!</p>';
        $sth_score = $db_rpsgame->prepare($GelijkQuery);
        $sth_score->execute();
    } elseif (isset($_POST['Paper'])) {
        echo '<p>Je hebt <b>Gewonnen</b>!</p>';
        $sth_score = $db_rpsgame->prepare($WinQuery);
        $sth_score->execute();
    } elseif (isset($_POST['Scissor'])) {
        echo '<p>Je hebt <b>Verloren</b>!</p>';
        $sth_score = $db_rpsgame->prepare($VerliesQuery);
        $sth_score->execute();
    } else {
        echo '';
    }
} elseif ($ComRand === 2) {
    if (isset($_POST['Rock'])) {
        echo '<p>Je hebt <b>Verloren</b>!</p>';
        $sth_score = $db_rpsgame->prepare($VerliesQuery);
        $sth_score->execute();
    } elseif (isset($_POST['Paper'])) {
        echo '<p>Het is <b>Gelijkspel</b> geworden!</p>';
        $sth_score = $db_rpsgame->prepare($GelijkQuery);
        $sth_score->execute();
    } elseif (isset($_POST['Scissor'])) {
        echo '<p>Je hebt <b>Gewonnen</b>!</p>';
        $sth_score = $db_rpsgame->prepare($WinQuery);
        $sth_score->execute();
    } else {
        echo '';
    }
} elseif ($ComRand === 3) {
    if (isset($_POST['Rock'])) {
        echo '<p>Je hebt <b>Gewonnen</b>!</p>';
        $sth_score = $db_rpsgame->prepare($WinQuery);
        $sth_score->execute();
    } elseif (isset($_POST['Paper'])) {
        echo '<p>Je hebt <b>Verloren</b>!</p>';
        $sth_score = $db_rpsgame->prepare($VerliesQuery);
        $sth_score->execute();
    } elseif (isset($_POST['Scissor'])) {
        echo '<p>Het is <b>Gelijkspel</b> geworden!</p>';
        $sth_score = $db_rpsgame->prepare($GelijkQuery);
        $sth_score->execute();
    } else {
        echo '';
    }
} else {
    echo '';
}

?>
</body>
</html>
