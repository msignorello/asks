<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 
	<link rel="stylesheet" type="text/css" href="../includes/main.css" />

</head>
<body>

<?php session_start(); 
$_SESSION['pagecount']=1; //Set the base count of pages to 1 so that we know we are going in order and not skipping steps 
$_SESSION['nextpage']=2; // Everything is good for next page


// check to see if the system is installed already. if so, bomb out. 

$checkname = "../install/installed";
if (! file_exists($checkname)){
}else{
echo 'Looks like ASKS is already installed!</br>';
echo 'Please goto <a href="../index.php">the index</a>';
echo '<br><br>';
echo 'If you would like to RE-Install, please remove "installed" from the installation folder.';
die;
}

?>

<table align="center" class="main">
	<tr>
		<td><img src="../images/header.png"></td>	
	</tr>
<!-- row for footer  -->

<tr>
	<td valign="top">
	<div class="title">ASKS - Base System Installer<br><Br></div>
	<div class="bigwarning" align="center">This system will attempt to create a <B>database</b>, create <b>tables</b> and create an <b>admin user</b>. By running this installer you run the risk of damaging any scores that already may be in the specified database.</div>	
	</td>
</tr>	

<tr><td><br><br></td></tr>
<tr>
	<td valign="top">
<div class="bigmainbody">
					Thank you for your interest and taking the time to install ASKS!<br>
					This installer will go through the steps of establishing a database and all corresponding tables.<br><br>
</div>
<div class="bigmainbody" valign="top">
			Prior to proceeding you must address the following: 
		<ul>
			<li>At least MySQL 5.0 or above installed and listening to localhost or configured for external access.</li>			
			<li>Valid MySQL Credentials to create a database or access an existing database to be used.</li>
			<li>Valid email server credentials for email notifications (Not Implemented Yet)</li>	
			<li>Properly set permissions to allow for the ASKS installer to write the configuration file.</li>		
		</ul>			
</div>	
<div class="bigmainbody" align="center">

<?php

$installedpath="../install";
$installcheck=is_writable($installedpath);

$includepath="../includes";
$includecheck=is_writable($includepath);

echo "Can I write to the install folder: ";
if($installcheck == 1){
		echo '<div class="notice">Yes!</div>';	
}else{
		echo '<div class="warning">No</div>';	
}

echo "<br>";

echo "Can I write to the include folder: ";
if($includecheck == 1){
		echo '<div class="notice">Yes!</div>';
}else{
		echo '<div class="warning">No</div>';	
}

echo "<br>";

$count = 0;
$count = $includecheck + $installcheck;

if($count == 2){
		echo '<form action="installer2.php"><input type="submit" value="START"></form>';
}else{
		echo '<div class="bigwarning">Something Failed, need to correct permissions before proceeding. Please refresh the page.</div>';
}

  //echo "variables:<br>";
  //echo $installcheck."install check<br>";
  //echo $includecheck."include check<br>";
  //echo $count."count";

?>


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
