<?php
header("Set-Cookie: key=value; path=/; domain=example.org; HttpOnly; SameSite=Lax");

$connecthostname = 'localhost';
$connectusername = 'root';
$connectpassword = '';
$connectdatabase = 'projektokj';

$connection = mysqli_connect($connecthostname, $connectusername, $connectpassword, $connectdatabase);


