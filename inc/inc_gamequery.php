<?php
require "inc_connection.php";

    $sqlpic = 'SELECT * FROM `games` WHERE `gameName` = "'.$_SESSION['gameName'].'"';
    $resultpic = mysqli_query($connection, $sqlpic);
    
    $minreqsql = 'SELECT `minrequirements`.*    
    FROM `games`
        LEFT JOIN `minrequirements` ON `minrequirements`.`minGId` = `games`.`gameId`
    WHERE `games`.`gameName` = "'.$_SESSION['gameName'].'"';
    $minreqresult = mysqli_query($connection, $minreqsql);
    
    $recreqsql = 'SELECT `recrequirements`.*
    FROM `games`
        LEFT JOIN `recrequirements` ON `recrequirements`.`recGId` = `games`.`gameId`
    WHERE `games`.`gameName` = "'.$_SESSION['gameName'].'"';
    $recreqresult = mysqli_query($connection, $recreqsql);
    
    $leadersql = 'SELECT `ahighscores`.`aScorePoints`, `games`.`gameName`, `users`.`userName`
    FROM `ahighscores` 
        LEFT JOIN `games` ON `ahighscores`.`aGId` = `games`.`gameId` 
        LEFT JOIN `users` ON `ahighscores`.`aUId` = `users`.`userId`
    WHERE `games`.`gameName` = "'.$_SESSION['gameName'].'"
    ORDER BY `ahighscores`.`aScorePoints` DESC
    LIMIT 3';
    $leaderresult = mysqli_query($connection,$leadersql);
    
    $descsql = 'SELECT `games`.`gameDesc`
    FROM `games`
    WHERE  `games`.`gameName` ="'.$_SESSION['gameName'].'"';
    $descresult = mysqli_query($connection,$descsql);


