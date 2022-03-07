<?php

session_start();

require "inc_connection.php";

if (isset($_POST['scoreSubmit'])) {
    
    $gameInput = mysqli_real_escape_string($connection, $_POST['gameSelect']);
    $scoreInput = mysqli_real_escape_string($connection, $_POST['scoreIn']);

    if (empty($scoreInput)) {
        header("Location: ../profile.php?error=emptyField");
    }
    if ($scoreInput == 0){
        header("Location: ../profile.php?error=cantbeNull");
    }
    else {

        $sqlnquery = "INSERT INTO `nhighscores`(`nUId`, `nGId`, `nScorePoints`) VALUES ((SELECT `userId` FROM `users` WHERE `userName` = '".$_SESSION['username']."'),(SELECT `gameId` FROM `games` WHERE `gameName` = '$gameInput'),'$scoreInput')";
    
        mysqli_query($connection,$sqlnquery);
        header("Location: ../profile.php?upload=success");

    }

}