<?php

session_start();

if (isset($_POST['submit'])) {
    $connection = mysqli_connect('localhost', 'root', '', 'webshop');

    $username = mysqli_real_escape_string($connection, $_POST["email"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyFields");
    }

    $password = md5($password);
    $sql = "SELECT * FROM users WHERE userEmail = ? && userPassword = ?;";

    //Statement előkészítése
    $statement = mysqli_prepare($connection, $sql);

    //Paraméterek összekapcsolása
    mysqli_stmt_bind_param($statement, 'ss', $username, $password);

    //Statement végrehajtása
    mysqli_stmt_execute($statement);


    //Mindent visszaad. Az sql query eredménye
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