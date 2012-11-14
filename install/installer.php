<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 
	<link rel="stylesheet" type="text/css" href="../includes/main.css" />

</head>
<body>

<?php
session_start(); 
$_SESSION['pagecount']=1; //Set the base count of pages to 1 so that we know we are going in order and not skipping steps 
$_SESSION['nextpage']=2; // Everything is good for next page
?>

<table align="center" class="main">
	<tr>
		<td><img src="../images/header.png"></td>	
	</tr>
<!-- row for footer  -->
<tr>
	<td valign="top">
	<div class="title">ASKS - Base System Installer</div>
	<div class="warning">This system will attempt to create a <B>database</b>, create <b>tables</b> and create an <b>admin user</b>. By running this installer you run the risk of damaging any scores that already may be in the specified database.</div>	
	</td>
</tr>	

<tr><td><br><br></td></tr>
<tr>
	<td valign="top">
		<div class="mainbody">
			You will need to have a username and password that is allowed to create databases.<br><br>In most cases this would be the root mysql account. All passwords provided are stored in a local session and are destroyed at the conclusion of the installer.<br>
			<br>
			By clicking to start, you agree that ASKS developers are NOT responsible for anything negative that may happen to your data or system. 
		</div>	
	</td>
</tr>

<tr>
	<td align="center">
		<form action="installer2.php"><input type="submit" value="START"></form>
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
