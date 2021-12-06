<?php

$connection = mysqli_connect('localhost', 'root','','webshop');

if (isset($_POST['submit'])) {
    
    $userName = mysqli_real_escape_string($connection, $_POST['userName']);
    $userPassword = mysqli_real_escape_string($connection, $_POST['userPassword']);
    $userPasswordConfirm = mysqli_real_escape_string($connection, $_POST['userPasswordConfirm']);
    $userVaros = mysqli_real_escape_string($connection, $_POST['userVaros']);
    $userIrsz = mysqli_real_escape_string($connection, $_POST['userIrsz']);
    $userUtca = mysqli_real_escape_string($connection, $_POST['userUtca']);
    $userHazszam = mysqli_real_escape_string($connection, $_POST['userHazszam']);
    $userAjtoSzam = mysqli_real_escape_string($connection, $_POST['userAjtoSzam']);
    $userEmail = mysqli_real_escape_string($connection, $_POST['userEmail']);
    $userTelefonszamEleje = mysqli_real_escape_string($connection, $_POST['userTelefonszamEleje']);
    $userTelefonszamVege = mysqli_real_escape_string($connection, $_POST['userTelefonszamVege']);

    if (empty($userName) ||empty($userPassword) ||empty($userPasswordConfirm) ||empty($userVaros) ||empty($userIrsz) ||empty($userUtca) ||empty($userHazszam) 
                         ||empty($userAjtoSzam) ||empty($userEmail) ||empty($userTelefonszamEleje) ||empty($userTelefonszamVege)) {
        header("Location: ../registration.php?error=emptyFields");
    }
    else if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) == false) {
        header("Location: ../registration.php?error=wrongMail");
    }
    else if ($userPassword != $userPasswordConfirm) {
        header("Location: ../registration.php?error=emptyFields");
    }
    else {
        $password = md5($userPassword);
        $telefonszam = $userTelefonszamEleje.$userTelefonszamVege;

        $sql = "INSERT INTO `users`( `userName`, `userPassword`, `userEmail`, `userVaros`, `userIrsz`, `userUtca`, `userHazSzam`, `userAjto`, `userTelefonszam`) VALUES (?,?,?,?,?,?,?,?,?)";
    
        $statement = mysqli_prepare($connection, $sql);

        mysqli_stmt_bind_param($statement, "ssssisiii", $userName, $password, $userEmail, $userVaros, $userIrsz, $userUtca, $userHazszam, $userAjtoSzam, $telefonszam);

        mysqli_stmt_execute($statement);
    
        header("Location: ../index.php?registration=success");
    }

}
else {
    echo 'Gomb nincs megnyomva';
}