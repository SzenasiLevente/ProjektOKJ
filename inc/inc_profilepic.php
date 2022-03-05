<?php
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
        header("Location: ../profile.php?picture=error");
    }
    if ($check !== false) {
        $uploadOk = true;
    }
    else {
        $uploadOk = false;
        echo 'file check';
    }

    if (file_exists($final_upload_name)) { 
        $uploadOk = false;
        echo'filename' ;
    }
    if ($_FILES["profilePic"]["size"] > 5000000) {
        $uploadOk = false;
        echo 'filesize';
     }

     
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
        $uploadOk = false;
        echo 'filetype';
     }
     if ($uploadOk == false) {
        echo 'error';
    }
    else
    {
       if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $final_upload_name)) {

        $sql = 'UPDATE `users` SET `userPicture`= ? WHERE `userName` = "'.$_SESSION['username'].'"';

        $statement = mysqli_prepare($connection, $sql);

        mysqli_stmt_bind_param($statement, "s", $file_name);

        mysqli_stmt_execute($statement);

           echo 'siker';
           header("Location: ../profile.php?picture=".$file_name."");
       }
       else {
           echo 'error file';
       }
    }
}