<?php
require "inc_connection.php";


    $gamename = $_POST['gamehidden'];
    $sqlpic = 'SELECT * FROM `games` WHERE `gameName` = "'.$gamename.'"';
    $resultpic = mysqli_query($connection, $sqlpic);
    
    $minreqsql = 'SELECT `minrequirements`.*    
    FROM `games`
        LEFT JOIN `minrequirements` ON `minrequirements`.`minGId` = `games`.`gameId`
    WHERE `games`.`gameName` = "'.$gamename.'"';
    $minreqresult = mysqli_query($connection, $minreqsql);
    
    $recreqsql = 'SELECT `recrequirements`.*
    FROM `games`
        LEFT JOIN `recrequirements` ON `recrequirements`.`recGId` = `games`.`gameId`
    WHERE `games`.`gameName` = "'.$gamename.'"';
    $recreqresult = mysqli_query($connection, $recreqsql);
    
    $leadersql = 'SELECT `ahighscores`.`aScorePoints`, `games`.`gameName`, `users`.`userName`
    FROM `ahighscores` 
        LEFT JOIN `games` ON `ahighscores`.`aGId` = `games`.`gameId` 
        LEFT JOIN `users` ON `ahighscores`.`aUId` = `users`.`userId`
    WHERE `games`.`gameName` = "'.$gamename.'"
    ORDER BY `ahighscores`.`aScorePoints` DESC
    LIMIT 3';
    $leaderresult = mysqli_query($connection,$leadersql);
    
    $descsql = 'SELECT `games`.`gameDesc`
    FROM `games`
    WHERE  `games`.`gameName` ="'.$gamename.'"';
    $descresult = mysqli_query($connection,$descsql);


