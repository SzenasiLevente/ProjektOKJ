<?php
require "inc_connection.php";

$games = 'SELECT `games`.`gameName`
FROM `users`
    LEFT JOIN `owngames` ON `owngames`.`ownUId` = `users`.`userId`
    LEFT JOIN `games` ON `owngames`.`ownGId` = `games`.`gameId`
WHERE `users`.`userName` ="'.$_SESSION["username"].'"';

$resultgames = mysqli_query($connection,$games);

$scores = 'SELECT `ahighscores`.`aScorePoints`, `users`.`userId`, `games`.`gameName`
FROM `users`
    LEFT JOIN `ahighscores` ON `ahighscores`.`aUId` = `users`.`userId`
    LEFT JOIN `games` ON `ahighscores`.`aGId` = `games`.`gameId`
    WHERE `users`.`userName` ="'.$_SESSION["username"].'"';

$resultscores = mysqli_query($connection,$scores);

$profilepic = 'SELECT `users`.`userPicture`
FROM `users`
WHERE `users`.`userName` = "'.$_SESSION['username'].'" LIMIT 1';

    $querypic = mysqli_query($connection,$profilepic);
    $resultpic = mysqli_fetch_assoc($querypic);
    $valuepic = $resultpic["userPicture"];

    $games2 = 'SELECT `games`.`gameName`
    FROM `users`
        LEFT JOIN `owngames` ON `owngames`.`ownUId` = `users`.`userId`
        LEFT JOIN `games` ON `owngames`.`ownGId` = `games`.`gameId`
    WHERE `users`.`userName` ="'.$_SESSION["username"].'"';
    
    $resultgames2 = mysqli_query($connection,$games);


