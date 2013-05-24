<?php
session_start(); 
$_SESSION['pagecount']=2 ; //Set the page we are on. 
if($_SESSION['nextpage'] != $_SESSION['pagecount'] ){

echo 'You are trying to skip steps! This Is BAD!!</br>';
echo 'Please start from <a href="installer.php">The Beginning</a>';
die;
	
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 
	<link rel="stylesheet" type="text/css" href="../includes/main.css" />

</head>
<body>
<?php
if(isset($_POST['submit'])) {
		$dbadmin = $_POST['dbadmin'];
		$dbadminpass = $_POST['dbadminpass'];
		$dbhost = $_POST['dbhost'];
		$dbname = $_POST['dbname'];
	
		if (mysql_connect($dbhost, $dbadmin, $dbadminpass)){;
			$_SESSION['dbadmin']=$dbadmin;
			$_SESSION['dbadminpass']=$dbadminpass;
			$_SESSION['dbhost']=$dbhost;
			$_SESSION['dbname']=$dbname;
			$_SESSION['nextpage']=3; //everything is OK to set the next page
			header("Location: installer3.php");
		}else{
			$error = mysql_error();
		}
}

?>

<table align="center" class="main">
	<tr>
		<td><img src="../images/header.png"></td>	
	</tr>
<!-- row for footer  -->
<tr>
	<td valign="top">
		<div class="title">ASKS - Base System Installer<div>
		<div class="bigsubunderline">SQL Server Information</div>
		<br>
	</td>
</tr>	

<tr>
	<td valign="top">
		<table class="content" align="center">
			<form action="installer2.php" method="post">
			<tr><td align="right">MySQL Admin Username: </td><td align="left"><input type="text" name="dbadmin"></td></tr>
			<tr><td align="right">MySQL Admin Password: </td><td align="left"><input type="password" name="dbadminpass"></td></tr>
			<tr><td align="right">MySQL Host (IP or Name): </td><td align="left"><input type="text" name="dbhost"></td></tr>
			<tr><td align="right">Desired Database Name: </td><td align="left"><input type="text" name="dbname"></td></tr>					
			<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Submit"><input type="reset" value="Reset"></button></td></tr>
			</form>
		</table>
	</td>
</tr>

<tr>
	<td colspan="2" align="center">
		<div class="bigwarning">
			<?php	if(isset($error)) {
			echo 'ERROR: '.$error;			
			}?>	
		</div>	
	</td>
</tr>

<!-- row for footer  -->
	<tr><td><br></td></tr>
	<tr>
		<td>
				<?php include("../includes/footer.php"); ?>
		</td>	
	</tr>
	
	
</table>



</body>
</html>
