<?php
session_start();


    $game = $_POST['gamehidden'];
    $_SESSION['gameName'] =  $game;

    header("Location: ../game.php?game=".$_SESSION['gameName']."");