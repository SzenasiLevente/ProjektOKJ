<?php
require "inc_connection.php";

if(isset($_SESSION["username"])){

$battlefieldquery = 'SELECT `owngames`.`ownId`
FROM `users`
    LEFT JOIN `owngames` ON `owngames`.`ownUId` = `users`.`userId`
    LEFT JOIN `games` ON `owngames`.`ownGId` = `games`.`gameId`
WHERE `users`.`userName` = "'.$_SESSION["username"].'" AND `games`.`gameName` = "Call of Battlefield"';

    $battlefieldresult = mysqli_query($connection,$battlefieldquery);

    $battlefield_assoc = mysqli_fetch_assoc($battlefieldresult);
    $valuebattlefield = $battlefield_assoc["ownId"];

$lozquery = 'SELECT `owngames`.`ownId`
    FROM `users`
        LEFT JOIN `owngames` ON `owngames`.`ownUId` = `users`.`userId`
        LEFT JOIN `games` ON `owngames`.`ownGId` = `games`.`gameId`
    WHERE `users`.`userName` = "'.$_SESSION["username"].'" AND `games`.`gameName` = "Legend of Zrolda"';
    
        $lozresult = mysqli_query($connection,$lozquery);
    
        $loz_assoc = mysqli_fetch_assoc($lozresult);
        $valueloz = $loz_assoc["ownId"];

$ratquery = 'SELECT `owngames`.`ownId`
        FROM `users`
            LEFT JOIN `owngames` ON `owngames`.`ownUId` = `users`.`userId`
            LEFT JOIN `games` ON `owngames`.`ownGId` = `games`.`gameId`
        WHERE `users`.`userName` = "'.$_SESSION["username"].'" AND `games`.`gameName` = "Ratman"';
        
            $ratresult = mysqli_query($connection,$ratquery);
        
            $rat_assoc = mysqli_fetch_assoc($ratresult);
            $valuerat = $rat_assoc["ownId"];
}
else{
    $valuebattlefield = NULL;
    $valueloz = NULL;
    $valuerat = NULL;
}