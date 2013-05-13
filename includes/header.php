<table class="header" width="100%">

<?php 

// check to see if the system is installed already. if not, direct to installer. 
$checkname = "install/installed";
if (file_exists($checkname)){
	
}else{
echo $checkname."does not exist...";	
echo 'Looks like ASKS is NOT already installed!</br>';
echo 'Please goto <a href="install/installer.php">the installer</a>';
echo '<br><br>';
echo 'If you are upgrading your installation and already have an sqlconnect.inc, create a file "INSTALLED" in the install folder. .';
die;

}

?>


	<tr><td>Today is: <?php echo date("l F dS Y");	?></td>
	<td align="right">v1.0.0 </td></tr>

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
