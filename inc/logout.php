<?php

session_start();

if (isset($_POST['submit'])) {
    session_destroy();
    unset($_SESSION['username']);

    header('Location: ../index.php?logout=success');
}