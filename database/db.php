<?php

//      connect to Rock Paper Scissors database to get win lose information

$score = [];

try {
    $db_rpsgame = new PDO('mysql:host=localhost;dbname=rpsgame' ,'root', '');
    $db_rpsgame->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
}

// get score information

    $query      = 'SELECT * FROM `score`';
    $sth_score = $db_rpsgame->prepare($query);
    $sth_score->execute();

    while ($scores = $sth_score->fetch(PDO::FETCH_ASSOC)) {
        $score[] = [
            'id'        => $scores['id'],
            'Win'       => $scores['Win'],
            'Gelijk'    => $scores['Gelijk'],
            'Verlies'   => $scores['Verlies']
        ];
    }

//    Get KeuzeSpeler information
$keuzespeler = [];

    $query              = 'SELECT * FROM `keuzespeler`';
    $sth_keuzespeler    = $db_rpsgame->prepare($query);
    $sth_keuzespeler->execute();

    while ($keuzes = $sth_keuzespeler->fetch(PDO::FETCH_ASSOC)) {
        $keuzespeler[] = [
            'Id'        => $keuzes['Id'],
            'Steen'     => $keuzes['Steen'],
            'Papier'    => $keuzes['Papier'],
            'Schaar'    => $keuzes['Schaar']
        ];
    }


