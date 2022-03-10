<?php

session_start();

require "inc_connection.php";

if(isset($_POST['gameSubmit'])){

    $downquery = 'SELECT `owngames`.`ownId`
    FROM `users`
        LEFT JOIN `owngames` ON `owngames`.`ownUId` = `users`.`userId`
        LEFT JOIN `games` ON `owngames`.`ownGId` = `games`.`gameId`
    WHERE `users`.`userName` = "'.$_SESSION['username'].'" AND `games`.`gameName` = "'.$_SESSION['gameName'].'"';

    $resultup = mysqli_fetch_assoc($upquery);
    $valueup = $resultup["ownId"];

    $downresult = mysqli_query($connection,$downquery);

    if($valueup != NULL)
    {
        header("Location: ../game.php?error=gamealreadyowned");
    }
    else{
        $upquery = "INSERT INTO `owngames`(`ownUId`, `ownGId`) VALUES ((SELECT `userId` FROM `users` WHERE `userName` = '".$_SESSION['username']."'),(SELECT `gameId` FROM `games` WHERE `gameName` = '".$_SESSION['gameName']."'))";
    
        mysqli_query($connection,$upquery);
        
        header("Location: ../game.php?add=success");
    }


}