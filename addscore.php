<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 
	<link rel="stylesheet" type="text/css" href="includes/main.css" />
	
	
	<script type="text/javascript" src="calendarDateInput.js">

/***********************************************
* Jason's Date Input Calendar- By Jason Moon http://calendar.moonscript.com/dateinput.cfm
* Script featured on and available at http://www.dynamicdrive.com
* Keep this notice intact for use.
***********************************************/

</script>

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
							<tr><td><div class="title">Add A Score<Br></div></td></tr>
							<tr><td><div class="subtitle">Select your name, the game and your score</div></td></tr>
							<tr><td>
							<div><br>

<!-- -->
<?php

include("includes/sqlconnect.inc");

// retrieve all the data from the tables
$names = mysql_query("SELECT * FROM players") or die(mysql_error());
$games = mysql_query("SELECT * FROM games") or die (mysql_error());

?>

<form name="newscore" method="post" action="addscore.php">
player:
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
game :
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
Score: 
<input type="text" name="playerscore"/>
<br>
Date: 
<script>DateInput('date', true, 'MM-DD-YYYY')</script>
<br>

<input type="submit" name="submit" value="Submit"/>

</form>

<?php

if(isset($_POST['submit'])) {
	$score = trim($_POST['playerscore']);
	$game = trim($_POST['gamename']);
	$player = trim($_POST['playername']);
	$score = str_replace(",","",$score);
	$date = str_replace("-","/",$_POST['date']);
	
	if($_POST['gamename'] = null){die('Error: No null scores allowed');break;} elseif($_POST['playername'] = null){die('error no null scores allowed');break;}
			
else{$query="INSERT INTO scores(score,gameid,playerid,date) VALUES ('$score','$game','$player','$date')";}

if (!mysql_query($query)){
	die('Error: ' . mysql_error());
	}
echo '<META HTTP-EQUIV=Refresh CONTENT="1; URL=allscores.php">';
echo "added score";

}

?>

							</div></td></tr>



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