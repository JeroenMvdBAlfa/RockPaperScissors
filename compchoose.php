<?php
/**
 *  1 = Rock
 *  2 = Paper
 *  3 = Scissor
 * @param integer $ComRand Picks a random Number between 1 and 3 to choose Rock, Paper or Scissors
 */
$ComRand = rand(1, 3);

echo '<p class="gekozen">De Computer heeft gekozen voor:</p>';
if ($ComRand === 1) {
    echo "<div class='RockCom'><b>Steen</b></div>";
} else if ($ComRand === 2) {
    echo "<div class='PaperCom'><b>Papier</b></div>";
} else {
    echo "<div class='ScissorCom'><b>Schaar</b></div>";
}
?>

