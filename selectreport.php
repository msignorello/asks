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
							<tr><td><div class="title">All Recorded Scores<br></div></td></tr>
							<tr><td><div class="subtitle">This is all of the scores recorded in the system, with no limit.</div><br></td></tr>
							<tr><td><div>

<?php

include("includes/sqlconnect.inc");

// retrieve all the data from the tables
$names = mysql_query("SELECT * FROM players") or die(mysql_error());
$games = mysql_query("SELECT * FROM games") or die (mysql_error());

?>

<form name="newscore" method="post" action="displayreport.php">
Player:
<select name="playername">
<option></option>
<?php
	while($row = mysql_fetch_array( $names )){
		$value=$row['player_initials'];
		$idvalue=$row['playerid'];
		echo '<option value="'.$idvalue.'">'.$value.'</option>';
	}

?>

</select>
<br>
Game :
<select name="gamename">
<option></option>
<?php
while($row = mysql_fetch_array( $games )){
        $value=$row['gamename'];
        $idvalue=$row['gameid'];
        echo '<option value="'.$idvalue.'">'.$value.'</option>';
}
?>

</select>
<br>
<!-- Put the next form elements here-->
<br>
<input type="submit" name="submit" value="Submit"/>

</form>

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
