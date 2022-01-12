<?php

session_start();

require "inc_connection.php";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST["inUsername"]);
    $password = mysqli_real_escape_string($connection, $_POST["inPass"]);

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyFields");
    }

    $password = md5($password);

    $sql = "SELECT * FROM users WHERE userName = ? && userPassword = ?;";
    $statement = mysqli_prepare($connection, $sql);

    mysqli_stmt_bind_param($statement, 'ss', $username, $password);

    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    var_dump($result);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;

        header("Location: ../index.php?login=ok");
    }
}
else
{
    echo 'Submit not pressed';
}