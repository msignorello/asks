<?php session_start(); ob_start(); ?>
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
							<tr><td><div class="title">Player Roster<br></div></td></tr>
							<tr><td><div class="subtitle">Currently Enrolled Players:</div><br></td></tr>
							<tr><td><div>

<?php

include("includes/sqlconnect.inc");

$names = mysql_query("SELECT * FROM players") or die(mysql_error());

echo '<table cellpadding="0" class="content" cellspacing="0" width="100%" >';
echo '<tr><th>First</th><th>Last</th><th>Initals</th></tr>';

while($row = mysql_fetch_array( $names )){

$first=$row['player_first'];
$last=$row['player_last'];
$initials=$row['player_initials'];
	echo "<tr>";
		echo '<td>'.$first.'</td>';
		echo '<td>'.$last.'</td>';
		echo '<td>'.$initials.'</td>';	
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
