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
					<td width="200px">
						<div class="navigation">
						<?php include("includes/sidenav.php"); ?>
						</div>					
					</td>
					<td valign="top" width="440">

<!-- new table for showing the body info -->
						<?php include("includes/adminconnect.inc"); ?>				
						<table cellspacing="0" cellpadding="0" class="content">
							<tr><td><div class="title">User / Player Options<Br><br></div></td></tr>
							<tr><td><div>You will be able to delete players specify administrators and modify scores here.<br><Br></br></div></td></tr>
							</td></tr>
							<tr><td>
							<form id="adminplayer" method="post" action="playermod.php">
								<table width="100%" class="content">
								<tr><th>First</th><th>Last</th><th>Username</th><th>Rights</th><th>Select</th></tr>
								<?php 
								$names = mysql_query("SELECT * FROM players") or die(mysql_error()); 
								$i=0;
								while($row = mysql_fetch_array( $names )){
								$i++;

								$pid=$row['playerid'];
								$first=$row['player_first'];
								$last=$row['player_last'];
								$username=$row['username'];
								$showrights=$row['accesslevel'];
								
								echo "<tr>";
								echo '<td>'.$first.'</td>';
								echo '<td>'.$last.'</td>';
								echo '<td>'.$username.'</td>';
								echo '<td>'.$showrights.'</td>';	
								echo '<td><input type="radio" name="edit" value="'.$pid.'"></td>';
								echo "</tr>";
								}
								?>
								</table>
								<br>
								<Br>
								<table span="100%" align="right">								
								<tr><td><input type="submit" name="playeroption" value="Delete"/></td><td><input type="submit" name="playeroption" value="Edit" label="Edit"/></td></tr>				
								</table>
							</form>								
							
							<table cellspacing="0" cellpadding="0" class="content">
							<tr><td><div class="title">Game Options<Br><br></div></td></tr>
							<tr><td><div>Modify, add or remove a registered game.<br><Br></br></div></td></tr>
							</td></tr>						
							</table>						
						
							</td></tr>
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
