<?php
require 'inc_connection.php';

if (isset($_POST['submit'])) {
    
    $userName = mysqli_real_escape_string($connection, $_POST['userName']);
    $userPassword = mysqli_real_escape_string($connection, $_POST['userPassword']);
    $userPasswordConfirm = mysqli_real_escape_string($connection, $_POST['userPasswordConfirm']);
    $userEmail = mysqli_real_escape_string($connection, $_POST['userEmail']);
    $userAccept = mysqli_real_escape_string($connection, $_POST['userAccept']);

    $uppercase = preg_match('@[A-Z]@', $userPassword);
    $lowercase = preg_match('@[a-z]@', $userPassword);
    $number    = preg_match('@[0-9]@', $userPassword);
    $specialChars = preg_match('@[^\w]@', $userPassword);

    if (empty($userName) ||empty($userPassword) ||empty($userPasswordConfirm) || empty($userEmail)) {
        header("Location: ../registration.php?error=emptyFields");
    }
    else if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) == false) {
        header("Location: ../registration.php?error=wrongMail");
    }
    else if ($userPassword != $userPasswordConfirm) {
        header("Location: ../registration.php?error=passwordNomatch");
    }
    else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($userPassword) < 8) {
        header("Location: ../registration.php?error=passwordWrongFormat");
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