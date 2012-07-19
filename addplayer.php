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
							<tr><td><div class="title">Add A Player<Br></div></td></tr>
							<tr><td><div class="subtitle">Register yourself here, be sure to include your initials <b>3 characters max</b> since initials will be used when displaying all scores.</div></td></tr>
							<tr><td>
							<div><br>

<!-- -->
<?php

include("includes/sqlconnect.inc");

if(isset($_POST['submit'])) {
	$firstname = trim($_POST['first']);
	$lastname = trim($_POST['last']);
	$initials = trim($_POST['initial']);
	
$query="INSERT INTO players(player_first,player_last,player_initials) VALUES ('$firstname','$lastname','$initials')";

if (!mysql_query($query)){
	die('Error: ' . mysql_error());
	}
//$url = 'newaddplayer.php';
echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=playerlist.php">';
}

?>

<form id="newplayer" method="post" action="addplayer.php">
	<div>First Name: <input type="text" name="first"/></div>
	<div>Last Name: <input type="text" name="last"/></div>
	<div>Highscore Initials: <input type="text" name="initial"/></div>
  <input type="submit" name="submit" value="Submit"/>
</form>


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
