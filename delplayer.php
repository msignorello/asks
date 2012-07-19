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
						<table cellspacing="0" cellpadding="0" width="100%" class="content">
							<tr><td><div class="title">Delete a Player<Br></div></td></tr>
							<tr><td>
							<div><br>

<!-- -->
<?php

include("includes/sqlconnect.inc");

$names = mysql_query("SELECT * FROM players") or die(mysql_error());

echo '<form id="delplayer" method="post" action="delplayer.php">';
echo '<table cellpadding="0" cellspacing="0" width="100%" class="content">';
echo '<tr><th>First</th><th>Last</th><th>Initals</th><th>Delete?</th></tr>';

while($row = mysql_fetch_array( $names )){

$pid=$row['playerid'];
$first=$row['player_first'];
$last=$row['player_last'];
$initials=$row['player_initials'];
	echo "<tr>";
		echo '<td>'.$first.'</td>';
		echo '<td>'.$last.'</td>';
		echo '<td>'.$initials.'</td>';	
		echo '<td> <input type="radio" name="delete" value="'.$pid.'">';
//			echo $pid;
	echo "</tr>";
}
echo "</table>";
echo "<br>";
echo '<input type="submit" name="submit" value="Delete"/>';
echo '</form>';

if(isset($_POST['submit'])) {
	$delpid = trim($_POST['delete']);
			
$query="DELETE FROM players WHERE playerid='$delpid'";
$query2="DELETE FROM scores WHERE playerid='$delpid'";

if (!mysql_query($query)){
	die('Error: ' . mysql_error());
	}
	mysql_query($query2);
	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=delplayer.php">';
}

?>



							</td></tr></div>



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
