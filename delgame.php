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
						<table cellspacing="0" cellpadding="0" width="100%" class="content">
							<tr><td><div class="title">Delete a Game<Br></div></td></tr>
							<tr><td>
							<div><br>

<!-- -->
<?php

include("includes/sqlconnect.inc");

$names = mysql_query("SELECT * FROM games") or die(mysql_error());
?>

<form id="delplayer" method="post" action="delgame.php">
<table cellpadding="0" cellspacing="0" width="100%" class="content">
<tr><th>Name</th><th>Delete?</th></tr>

<?php 
while($row = mysql_fetch_array( $names )){

$gameid=$row['gameid'];
$gamename=$row['gamename'];

	echo "<tr>";
		echo '<td>'.$gamename.'</td>';
		echo '<td> <input type="radio" name="delete" value="'.$gameid.'">';
	echo "</tr>";
}
?>

</table>
<br>
<input type="submit" name="submit" value="Delete"/>
</form>

<?php

if(isset($_POST['submit'])) {
	$delpid = trim($_POST['delete']);
			
$query="DELETE FROM games WHERE gameid='$delpid'";
$query2="DELETE FROM scores WHERE gameid='$delpid'";

if (!mysql_query($query)){
	die('Error: ' . mysql_error());
	}
	mysql_query($query2);
	echo "deleted - refreshing....";
	echo '<META HTTP-EQUIV=Refresh CONTENT="1; URL=delgame.php">';
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
