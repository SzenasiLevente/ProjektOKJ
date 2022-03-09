<?php

session_start();

require "inc_connection.php";

if(isset($_POST['scoreSubmit'])){

    $scoreVal = $_POST['scoreSelect'];

    $notApprovedquery = 'SELECT `nhighscores`.*
    FROM `nhighscores`
    WHERE `nhighscores`.`nScoreId` = "'.$scoreVal.'"';
    $notApprovedresult = mysqli_query($connection,$notApprovedquery);

    while ($row = mysqli_fetch_assoc($notApprovedresult)) {
        $userId = $row['nUId'];
        $gameId = $row['nGId'];
        $scorePoints = $row['nScorePoints'];
    }

    $approvedquery = 'INSERT INTO `ahighscores`(`aUId`, `aGId`, `aScorePoints`) VALUES (?,?,?)';
    $approvedStatement = mysqli_prepare($connection, $approvedquery);
    mysqli_stmt_bind_param($approvedStatement, "ssi", $userId, $gameId, $scorePoints);

    mysqli_stmt_execute($approvedStatement);

    header("Location: ../admin.php?upload=success");

    $notapprovedDelete = 'DELETE FROM `nhighscores` WHERE `nhighscores`.`nScoreId` = "'.$scoreVal.'"';
    $notapprovedResult = mysqli_query($connection,$notapprovedDelete);
}
if(isset($_POST['deleteSubmit'])){

    $scoreVal = $_POST['scoreSelect'];

    $notapprovedDelete = 'DELETE FROM `nhighscores` WHERE `nhighscores`.`nScoreId` = "'.$scoreVal.'"';
    $notapprovedResult = mysqli_query($connection,$notapprovedDelete);

    header("Location: ../admin.php?delete=success");
}