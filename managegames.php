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
<?php 
					if(isset($_POST['gameoption'])) {
						
					$action = $_POST['gameoption'];	
					
//					echo $action;
					
										if($action == "New"){
						
															header("location:addgame.php");
						
										}	
						
									 if($action == "Delete"){
															$_SESSION['editgameid'] = $_POST['gameid'];
															header("location:utilprogs/gamemod.php?mode=remove");
										}
																	
										if($action == "Edit"){
															$_SESSION['editgameid'] = $_POST['gameid'];
															header("location:addgame.php?mode=edit");
										}													
						
						
					}
		
						
?>
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
							<tr><td><div class="title">Game Management<br></div></td></tr>
							<tr><td><div class="subtitle">Add / Remove / Edit a registered game.  </div><br></td></tr>
							<tr><td><div>

<form method="post" action="managegames.php">
<table cellpadding="0" class="content" cellspacing="0" width="100%" >
<tr><th>Game</th><th>Lives Per Credit</th><th>Game Type</th><th>Selected</th></tr>

<?php

include("includes/sqlconnect.inc");

$games = mysql_query("SELECT * FROM games") or die(mysql_error());


while($row = mysql_fetch_array( $games )){

$gameid=$row['gameid'];
$game=$row['gamename'];
$lives=$row['livespercredit'];
$gametype=$row['gametype'];
		echo "<tr>";
		echo '<td>'.$game.'</td>';
		echo '<td>'.$lives.'</td>';
		echo '<td>'.$gametype.'</td>';	
		echo '<td><input type="radio" name="gameid" value="'.$gameid.'"></td>';
		echo "</tr>";
}

?>

</table>

<br>
<br>

							</td></tr></div>

<!-- add div here -->

						</table>			
						
	<table>
		<tr><td><input type="submit" name="gameoption" value="Delete"/></td><td><input type="submit" name="gameoption" value="Edit" label="Edit"/><input type="submit" name="gameoption" value="New"/></td></tr>
	</table>				

				</td>				
				</tr>
	</table>
	
	</form>			
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
