<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 
	<?php include ("includes/functions.php"); theme_set(); ?>

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
							<tr><td><div class="title">High Scores<br></div></td></tr>
							<tr><td><div class="subtitle">This is only the high scores.</div><br></td></tr>
							<tr><td><div>





<?php

echo '<table cellpadding="0" class="content" cellspacing="0" width="100%" >';
echo '<tr><th>Game</th><th>Initials</th><th>Score</th><th>Date</th></tr>';

include("includes/sqlconnect.inc");
$idnum=1;

	$allscores = mysql_query("SELECT date,score,scoreid,playerid FROM scores WHERE (gameid, score) IN
(SELECT gameid, MAX(score) from scores GROUP BY gameid)"); // I don't know the field names you need obviously place those instead of field1 etc.
	while($row = mysql_fetch_array($allscores))
	{
	$score = $row['score'];
	$date = $row['date'];
	$playerid = $row['playerid'];
	$id= $row['scoreid'];
	$game = mysql_query("SELECT gameid FROM scores WHERE scoreid ='$id'");
	$idgame = mysql_fetch_array($game);
	$gamename = mysql_query("SELECT gameid,gamename FROM games WHERE gameid='$idgame[0]'");
	while($row = mysql_fetch_array($gamename))
	{
	$game=$row['gamename'];
	}
	$name = mysql_query("SELECT playerid,player_initials FROM players WHERE playerid='$playerid'");
	while($row = mysql_fetch_array($name))
	{
	$initials=$row['player_initials'];
	}
	
	echo "<tr>";
		echo '<td>'.$game.'</td>';
		echo '<td>'.$initials.'</td>';
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
