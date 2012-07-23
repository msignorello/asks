<table class="header" width="100%">
	<tr><td>Today is: <?php echo date("l F dS Y");	?></td>
	<td align="right">v0.0.2 </td></tr>

	<tr><td>Local Time: <?php echo date("h:i:s A");?></td>
	<td align="right">
					<?php 
					session_start();
					if(isset($_SESSION['username'])){
					echo 'Logged In As: '.$_SESSION['username'].' - <a href="logout.php">Logout</a>';
					}else{
					echo '<a href="login.php">Login</a>';
					}					
					?>
					
	</td></tr>			


</table>
