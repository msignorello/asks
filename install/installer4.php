<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 
	<link rel="stylesheet" type="text/css" href="../includes/main.css" />

</head>
<body>

<?php
session_start(); 
$_SESSION['pagecount']=4 ; //Set the page we are on. 

if($_SESSION['nextpage'] != $_SESSION['pagecount'] ){

echo 'You are trying to skip steps! This Is BAD!!</br>';
echo 'Please start from <a href="installer.php">The Beginning</a>';
die;
}

$checkname = "../install/installed";
if (!file_exists($checkname)){
}else{
echo 'Looks like ASKS is already installed!</br>';
echo 'Please goto <a href="./index.php">the index</a>';
die;
}

$dbadmin = $_SESSION['dbadmin'];
$dbadminpass = $_SESSION['dbadminpass'];
$dbhost = $_SESSION['dbhost'];
$dbname = $_SESSION['dbname'];

?>

<table align="center" class="main">
	<tr>
		<td><img src="../images/header.png"></td>	
	</tr>
<!-- row for footer  -->
<tr>
	<td valign="top">
		<div class="title">ASKS - Base System Installer<div>
		<div class="bigsubunderline">Write Settings To Disk</div>
		<br>
	</td>
</tr>	

<tr>
	<td align="center">
	<?php

			$l1 = '<?php '."\n";
			$l2 = '$dbhost = "'.$dbhost.'";'."\n";
			$l3 = '$dbuser = "'.$dbadmin.'";'."\n";
			$l4 = '$dbpass = "'.$dbadminpass.'";'."\n";
			$l5 = '$db = "'.$dbname.'";'."\n";
			$l6 = 'mysql_connect($dbhost,$dbuser,$dbpass);'."\n";
			$l7 = 'mysql_select_db($db);'."\n";
			$l8 = '?>'."\n";

			$FileName = "../includes/sqlconnect.inc";
			$fh = fopen($FileName, 'w') or die("can't open file");
			
			fwrite($fh, $l1);
			fwrite($fh, $l2);
			fwrite($fh, $l3);
			fwrite($fh, $l4);
			fwrite($fh, $l5);
			fwrite($fh, $l6);
			fwrite($fh, $l7);
			fwrite($fh, $l8);
			
			fclose ($fh);

	?>
	<?php
	$FileName = "../install/installed";
	$fh = fopen($FileName, 'w') or die("can't open file");
	fclose($fh);
	?>
	</td>
</tr>

<tr>
	<td align="center">
	<br><br>
		<form action="../index.php">
		<div class="mainbody"> Files are written to disk. Ready to go! </div>
		<input type="submit" value="LAUNCH!!">		
		</form>	
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
