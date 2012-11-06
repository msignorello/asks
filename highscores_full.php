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
					
					<td valign="top" width="640">

<!-- new table for showing the body content -->				
						<table cellspacing="0" cellpadding="0" width="100%">
							<tr><td><div class="title">High Scores<br></div></td></tr>
							<tr><td><div class="subtitle">This is only the high scores.</div><br></td></tr>
							<tr><td><div>





<?php
echo '<marquee direction="up" scrollamount="1">';
echo '<table cellpadding="0" class="content" cellspacing="0" width="100%" >';
echo '<tr><th>Game</th><th>Initials</th><th>Score</th><th>Date</th></tr>';


include("includes/sqlconnect.inc");
include("includes/functions.php");
$idnum=1;

	$allscores = mysql_query("SELECT * FROM scores");
	$highid = array(
	);
	while($row = mysql_fetch_array( $allscores ))
	{
	$idnums=$row['gameid'];
	$highid[]=$idnums;      
	}
while($idnum<=max($highid))
{
	$allscores = mysql_query("SELECT * FROM scores WHERE gameid ='$idnum'");
	$array = array(
	);
	while($row = mysql_fetch_array( $allscores ))
	{
	$score=$row['score'];
	$scoreid=$row['scoreid'];
	$array[$scoreid]=$score;      
	}
	$high=doublemax($array);
	$nameid = mysql_query("SELECT scoreid,playerid,score FROM scores WHERE scoreid='$high[i]'");
	while($row = mysql_fetch_array($nameid))
	{
	$player=$row['playerid'];
	}
	$dateid = mysql_query("SELECT scoreid,date FROM scores WHERE scoreid='$high[i]'");
	while($row = mysql_fetch_array($dateid))
	{
	if($row['date']=="")
	{
		$date="Unknown";
	}
	else
	{
		$date=$row['date'];
	}
	}
	$name = mysql_query("SELECT playerid,player_initials FROM players WHERE playerid='$player'");
	while($row = mysql_fetch_array($name))
	{
	$initials=$row['player_initials'];
	}
	$gamename = mysql_query("SELECT gameid,gamename FROM games WHERE gameid='$idnum'");
	while($row = mysql_fetch_array($gamename))
	{
	$game=$row['gamename'];
	}

	$idnum++;

		echo "<tr>";
		echo '<td>'.$game.'</td>';
		echo '<td>'.$initials.'</td>';
		echo '<td>'.number_format($score).'</td>';
		echo '<td>'.$date.'</td>';	
	echo "</tr>";

	}
echo "</table>";
echo '</marquee>';

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

				<?php 
					include("includes/footer.php"); 
?>
		</td>	
	</tr>
	
	
</table>



</body>
</html>
