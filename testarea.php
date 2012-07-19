<?php

include("includes/sqlconnect.inc");

$scores = mysql_query("select * from scores,players,games
group by scores.playerid ,scores.gameid
") or die(mysql_error());

echo '<table cellpadding="0" class="content" cellspacing="0" width="100%" >';
echo '<tr><th>Game</th><th>Lives Per Credit</th><th>Game Type</th></tr>';

while($row = mysql_fetch_array( $scores )){

$game=$row['player_initials'];
$lives=$row['gamename'];
$gametype=$row['score'];
	echo "<tr>";
		echo '<td>'.$game.'</td>';
		echo '<td>'.$lives.'</td>';
		echo '<td>'.$gametype.'</td>';	
	echo "</tr>";
}

echo "</table>";

?>
