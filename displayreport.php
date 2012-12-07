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
							<tr><td><div class="title">The Scores<br></div></td></tr>
							<tr><td><div class="subtitle">Here are the scores based on your query. To do another query, click <a href="selectreport.php">HERE</a></div><br></td></tr>
							<tr><td><div>

<?php

include("includes/sqlconnect.inc");

if(isset($_POST['submit'])) {
	
	if($_POST['playername'] == null){
		//echo "no player selected";
		$count=0;}
		else{
		//echo "player selected";
		$count=1;
		}
	
	if($_POST['gamename'] == null){		
		//echo "no game selected";
		$count=$count+0;}
		else{
		//echo "game selected";
		$count=$count+2;		
			}



switch ($count) {
    case 0:
        echo "error: no query items selected";
        break;
    case 1:
			echo '<table cellpadding="0" class="content" cellspacing="0" width="100%" >';
			echo '<tr><th>Player</th><th>Game</th><th>Score</th></tr>';
    	  	$query=mysql_query('select * from scores,players,games where scores.playerid = '.$_POST['playername'].' and scores.playerid = players.playerid and scores.gameid = games.gameid group by scores.score');
    	   while($row = mysql_fetch_array( $query )){
				$player=$row['player_initials'];
				$game=$row['gamename'];
				$score=$row['score'];
						echo "<tr>";
						echo '<td>'.$player.'</td>';
						echo '<td>'.$game.'</td>';
						echo '<td>'.$score.'</td>';	
						echo "</tr>";	
				}
			echo "</table>";
         break;
    case 2:
        	echo '<table cellpadding="0" class="content" cellspacing="0" width="100%" >';
			echo '<tr><th>Player</th><th>Game</th><th>Score</th></tr>';
    	  	$query=mysql_query('select * from scores,players,games where games.gameid = '.$_POST['gamename'].' and scores.playerid = players.playerid and scores.gameid = games.gameid group by scores.score');
    	   while($row = mysql_fetch_array( $query )){
				$player=$row['player_initials'];
				$game=$row['gamename'];
				$score=$row['score'];
						echo "<tr>";
						echo '<td>'.$player.'</td>';
						echo '<td>'.$game.'</td>';
						echo '<td>'.$score.'</td>';	
						echo "</tr>";	
				}
			echo "</table>";
        break;
    case 3:
        	echo '<table cellpadding="0" class="content" cellspacing="0" width="100%" >';
			echo '<tr><th>Player</th><th>Game</th><th>Score</th></tr>';
    	  	$query=mysql_query('select * from scores,players,games where scores.playerid = '.$_POST['playername'].' and games.gameid = '.$_POST['gamename'].' and scores.playerid = players.playerid and scores.gameid = games.gameid group by scores.score');
    	   while($row = mysql_fetch_array( $query )){
				$player=$row['player_initials'];
				$game=$row['gamename'];
				$score=$row['score'];
						echo "<tr>";
						echo '<td>'.$player.'</td>';
						echo '<td>'.$game.'</td>';
						echo '<td>'.$score.'</td>';	
						echo "</tr>";	
				}
			echo "</table>";
        break;
}

	}
else{
	echo '<div class="content">';
	echo "error: no query items selected";
	echo "</div>";
	}




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
