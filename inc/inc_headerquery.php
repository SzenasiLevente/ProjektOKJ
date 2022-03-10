<?php
require "inc_connection.php";

if(isset($_SESSION["username"])){

    $admin = 'SELECT `users`.`userAdmin`
    FROM `users`
    WHERE `users`.`userName` = "'.$_SESSION['username'].'" LIMIT 1';

    $adminquery = mysqli_query($connection,$admin);
    $adminresult = mysqli_fetch_assoc($adminquery);
    $adminvalue = $adminresult["userAdmin"];

$battlefieldquery = 'SELECT `owngames`.`ownId`
FROM `users`
    LEFT JOIN `owngames` ON `owngames`.`ownUId` = `users`.`userId`
    LEFT JOIN `games` ON `owngames`.`ownGId` = `games`.`gameId`
WHERE `users`.`userName` = "'.$_SESSION['username'].'" AND `games`.`gameName` = "Call of Battlefield"';

    $battlefieldresult = mysqli_query($connection,$battlefieldquery);

    if (mysqli_num_rows($battlefieldresult)==0) { $valuebattlefield = NULL; }
    else{
        $battlefield_assoc = mysqli_fetch_assoc($battlefieldresult);
        $valuebattlefield = $battlefield_assoc['ownId'];
    }


$lozquery = 'SELECT `owngames`.`ownId`
    FROM `users`
        LEFT JOIN `owngames` ON `owngames`.`ownUId` = `users`.`userId`
        LEFT JOIN `games` ON `owngames`.`ownGId` = `games`.`gameId`
    WHERE `users`.`userName` = "'.$_SESSION["username"].'" AND `games`.`gameName` = "Legend of Zrolda"';
    
        $lozresult = mysqli_query($connection,$lozquery);
        if (mysqli_num_rows($lozresult)==0) { $valueloz = NULL; }
        else{
            $loz_assoc = mysqli_fetch_assoc($lozresult);
            $valueloz = $loz_assoc["ownId"];
        }


$ratquery = 'SELECT `owngames`.`ownId`
        FROM `users`
            LEFT JOIN `owngames` ON `owngames`.`ownUId` = `users`.`userId`
            LEFT JOIN `games` ON `owngames`.`ownGId` = `games`.`gameId`
        WHERE `users`.`userName` = "'.$_SESSION["username"].'" AND `games`.`gameName` = "Ratman"';
        
            $ratresult = mysqli_query($connection,$ratquery);
            if (mysqli_num_rows($ratresult)==0) { $valuerat = NULL; }  
            else{
                $rat_assoc = mysqli_fetch_assoc($ratresult);
                $valuerat = $rat_assoc["ownId"];
            }      

}
else{
    $valuebattlefield = NULL;
    $valueloz = NULL;
    $valuerat = NULL;
}