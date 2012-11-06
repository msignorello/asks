<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 
	<link rel="stylesheet" type="text/css" href="includes/main.css" />

</head>
<body>

<table align="center" class="main">
	<tr>
		<td><img src="images/header.png"></td>	
	</tr>
	
<!-- row for system stats  -->	
	<tr>
		<td>
			<?php include("includes/header.php"); ?>
		</td>	
	</tr>

<!-- row for main left and right  -->

	<tr>
		<td>
		<table align="center" class="inside">
				<tr>
					<td valign="top" width="200px">
						<div class="navigation">
						<?php include("includes/sidenav.php"); ?>
						</div>					
					</td>
					<td valign="top" width="440">

<!-- new table for showing the body content -->				
						<table cellspacing="0" cellpadding="0" width="100%">
							<tr><td><div class="title">All Recorded Scores<br></div></td></tr>
							<tr><td><div class="subtitle">This is all of the scores recorded in the system, with no limit.</div><br></td></tr>
							<tr><td><div>

<?php

include("includes/sqlconnect.inc");

$allscores = mysql_query("SELECT scores.score AS score,scores.date as date,players.player_initials AS player_initials,games.gamename AS gamename from ((games join scores on((games.gameid = scores.gameid))) join players on((players.playerid = scores.playerid)))") or die(mysql_error());

//Below is a more straightforward query compared to above.... but for some reason something is broken and I need to fid the query to show duplicate game results for a given person. 
//$allscores = mysql_query("select * from scores,players,games where scores.playerid = players.playerid and scores.gameid = games.gameid group by scores.playerid ,scores.gameid") or die(mysql_error());



echo '<table cellpadding="0" class="content" cellspacing="0" width="100%" >';
echo '<tr><th>Player</th><th>Game</th><th>Score</th><th>Date</th></tr>';

while($row = mysql_fetch_array( $allscores )){

$player=$row['player_initials'];
$game=$row['gamename'];
$score=$row['score'];
$date=$row['date'];
	echo "<tr>";
		echo '<td>'.$player.'</td>';
		echo '<td>'.$game.'</td>';
		echo '<td>'.number_format($score).'</td>';
		echo '<td>'.$date.'</td>';	
	echo "</tr>";
}

echo "</table>";

?>
<br>
<br>

							</td></tr></div>

<!-- add div here -->


						</table>							

				</td>				
				</tr>
	</table>			
	</td>
	</tr>

<!-- row for footer  -->

	<tr>
		<td>
				<?php include("includes/footer.php"); ?>
		</td>	
	</tr>
	
	
</table>



</body>
</html>