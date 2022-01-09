<?php
require 'inc_connection.php';

if (isset($_POST['submit'])) {
    
    $userName = mysqli_real_escape_string($connection, $_POST['userName']);
    $userPassword = mysqli_real_escape_string($connection, $_POST['userPassword']);
    $userPasswordConfirm = mysqli_real_escape_string($connection, $_POST['userPasswordConfirm']);
    $userEmail = mysqli_real_escape_string($connection, $_POST['userEmail']);
    $userAccept = mysqli_real_escape_string($connection, $_POST['userAccept']);

    if (empty($userName) ||empty($userPassword) ||empty($userPasswordConfirm) || empty($userEmail) || empty($userAccept)) {
        header("Location: ../registration.php?error=emptyFields");
    }
    else if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) == false) {
        header("Location: ../registration.php?error=wrongMail");
    }
    else if ($userPassword != $userPasswordConfirm) {
        header("Location: ../registration.php?error=passwordNomatch");
    }
    else if ($userAccept != "true"){        
        header("Location: ../registration.php?error=termsNotaccepted");
    }
    else {
        $mdPassword = md5($userPassword);

        $sql = "INSERT INTO `users`( `userName`, `userPassword`, `userEmail`) VALUES (?,?,?)";
    
        $statement = mysqli_prepare($connection, $sql);

        mysqli_stmt_bind_param($statement, "sss", $userName, $mdPassword, $userEmail);

        mysqli_stmt_execute($statement);
    
        header("Location: ../index.php?registration=success");
    }

}