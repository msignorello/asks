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
							<tr><td><div class="title">Add A Game<Br></div></td></tr>
							<tr><td><div class="subtitle">Register a game to record high scores for.</div></td></tr>
							<tr><td>
							<div><br>

<!-- -->
<?php

include("includes/sqlconnect.inc");

if(isset($_POST['submit'])) {
	$gamename = trim($_POST['game']);
	$lives = trim($_POST['livespercred']);
	$typeofgame = trim($_POST['gametype']);
	
$query="INSERT INTO games(gamename,livespercredit,gametype) VALUES ('$gamename','$lives','$typeofgame')";

if (!mysql_query($query)){
	die('Error: ' . mysql_error());
	}

echo "game added";
echo '<META HTTP-EQUIV=Refresh CONTENT="2; URL=gamelist.php">';
}

?>

<form id="newgame" method="post" action="addgame.php">
	<div>Game Name: <input type="text" name="game"/></div>
	<div>Lives / Plays Per Credit: <input type="text" size="3" maxlength="1" name="livespercred"/></div>
	<div>Game Type: 
		<select name="gametype">
       <option value="upright">Upright</option>
  		<option value="cocktail">Cocktail</option>
			<option value="cabaret">Cabaret</option>
			<option value="bartop">Bartop</option>
			<option value="cockpit">Cockpit</option>
			<option value="pinball">Pinball</option>
		</select>
	</div>
	<br>
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
