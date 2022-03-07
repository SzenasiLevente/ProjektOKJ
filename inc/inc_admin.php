<?php
require 'inc_connection.php';

$napprovedScores = 'SELECT `nhighscores`.`nScorePoints`, `games`.`gameName`, `users`.`userName`,`nhighscores`.`nScoreId`
FROM `nhighscores` 
	LEFT JOIN `games` ON `nhighscores`.`nGId` = `games`.`gameId` 
	LEFT JOIN `users` ON `nhighscores`.`nUId` = `users`.`userId`';

$resultnScores = mysqli_query($connection,$napprovedScores);

$scorequery = 'SELECT `nhighscores`.`nScoreId`
FROM `nhighscores`';

$scorequeryresult = mysqli_query($connection,$scorequery);