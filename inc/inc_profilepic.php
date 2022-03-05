<?php
session_start();
require "inc_connection.php";

if (isset($_POST['submit'])) {

    $target_dir = '../IMG/';
    $file_name = $_FILES["profilePic"]["name"];
    $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
    $final_upload_name = $target_dir . $file_name;
    $uploadOk = true;

    $check = getimagesize($_FILES["profilePic"]["tmp_name"]);

    if(empty($file_name)){
        $uploadOk = false;
        header("Location: ../profile.php?error=emptyfile");
    }
    if ($check !== false) {
        $uploadOk = true;
    }
    else {
        $uploadOk = false;
        header("Location: ../profile.php?error=notpicture");
    }

    if (file_exists($final_upload_name)) { 
        $uploadOk = false;
        header("Location: ../profile.php?error=alreadyexists");
    }
    if ($_FILES["profilePic"]["size"] > 5000000) {
        $uploadOk = false;
        header("Location: ../profile.php?error=filetoolarge");
     }

     
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
        $uploadOk = false;
        header("Location: ../profile.php?error=incorrectfiletype");
     }
     if ($uploadOk == false) {
        header("Location: ../profile.php?error=uploadfailed");
    }
    else
    {
       if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $final_upload_name)) {

        $picsql = 'UPDATE `users` SET `userPicture`= ? WHERE `userName` = "'.$_SESSION['username'].'"';

        $picstatement = mysqli_prepare($connection, $picsql);

        mysqli_stmt_bind_param($picstatement, "s", $file_name);

        mysqli_stmt_execute($picstatement);

           header("Location: ../profile.php?picture=".$file_name."");
       }
       else {
        header("Location: ../profile.php?error=fileerror");
       }
    }
}