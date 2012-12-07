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
							<tr><td><div class="title">Modify A Player<Br></div></td></tr>
							<tr><td><div class="subtitle">Edit a player properties here.</div></td></tr>
							<tr><td>
							<div><br>

<!-- -->
<?php

include("includes/sqlconnect.inc");


if(!isset($_SESSION['pid'])){
	header("location:login.php");
}

if(isset($_REQUEST["mode"])){
	$pid = $_SESSION["pid"];
	} else {
     if($_SESSION["adminID"]!=""){
		$pid  = $_SESSION["adminID"];
		}else{
		$pid = $_SESSION['pid'];
		}
}
	echo $pid;
   $sql="SELECT * FROM players WHERE playerid = ".$pid;
   $query = mysql_query($sql);
   
	while($row = mysql_fetch_array( $query )){

			$editfirst=$row['player_first'];
			$editlast=$row['player_last'];
			$editusername=$row['username'];
			$editpassword=$row['password'];
			$editinitials=$row['player_initials'];
			$editemail=$row['email'];
			$editshowrights=$row['accesslevel'];
		}

?>


				<form id="editplayer" method="post" action="editplayer.php">
					<input type="hidden" name="pid" value= <?php echo $pid?> >
					<div>First Name: <input type="text" name="first" value="<?php echo $editfirst ?>"/></div>
					<div>Last Name: <input type="text" name="last" value="<?php echo $editlast ?>"/></div>
					<div>Highscore Initials: <input type="text" name="initial" value="<?php echo $editinitials ?>"/></div>
					<br>
					<div>Desired Username: <input type="text" name="username" value="<?php echo $editusername ?>"/></div>
   				<div>Password: <input type="password" name="password" value="<?php echo $editpassword ?>"/></div>
   				<div>Email Address: <input type="text" name="email" value="<?php echo $editemail ?>"/></div>
   				<br>
   				<?php 
   				if($_SESSION['rights'] == "admin"){
   						echo "<div>Site Admin -" ;
   						if($editshowrights == "admin"){
   							echo '<br>Yes: <input type="radio" name="rights" value="admin" checked>';
   						}else{
   							echo '<br>Yes: <input type="radio" name="rights" value="admin">';
   						}
   						if($editshowrights == "player"){
   							echo '<br>No: <input type="radio" name="rights" value="player" checked>';
   						}else{
   							echo '<br>No: <input type="radio" name="rights" value="player">';
   						}
   							echo "</div>";
   						}
   					else{
   					echo '<input type="hidden" name="rights" value="player">';
   					}
   				?>
  					<input type="submit" name="editplayer" value="Submit"/>
				</form>


<?php 

if(isset($_POST['editplayer'])) {
	$firstname = trim($_POST['first']);
	$lastname = trim($_POST['last']);
	$initials = trim($_POST['initial']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$email = trim($_POST['email']);
	$rights = trim($_POST['rights']);
	$pid = trim($_POST['pid']);
	
//	$query="INSERT INTO players(player_first,player_last,player_initials,username,password,email,accesslevel) VALUES ('$firstname','$lastname','$initials','$username','$password','$email','$rights') WHERE playerid = ".$pid;

$query  = "update players set ";
 
$query .= " player_first='".$firstname."' , ";
 
$query .= " player_last='".$lastname."' , ";
 
$query .= " player_initials='".$initials."' , ";
 
$query .= " username='".$username."' , ";
 
$query .= " password='".$password."' , ";
 
$query .= " email='".$email."' , ";
 
$query .= " accesslevel='".$rights."'  ";
 
$query .= " where playerid ='".$pid."'";



	if (!mysql_query($query)){
		die('Error: ' . mysql_error());
	}
	
	if ($rights == "admin"){
		$_SESSION['admineditpid'] = NULL;
		header("location:adminsettings.php");
	}else{
		$_SESSION['admineditpid'] = NULL;
		header("location:playerlist.php");
	}
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