<?php

$dbhost = "10.13.31.2";
$dbuser = "highscore";
$dbpass = "b00ties21";
$db = "highscore";


mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
//echo "Connected to MySQL<br>";
mysql_select_db($db) or die(mysql_error());
//echo "Connected to DB!<br><br>";

?>
