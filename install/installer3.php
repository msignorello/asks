<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 
	<link rel="stylesheet" type="text/css" href="../includes/main.css" />

</head>
<body>

<?php
session_start(); 
$_SESSION['pagecount']=3 ; //Set the page we are on. 

if($_SESSION['nextpage'] != $_SESSION['pagecount'] ){

echo 'You are trying to skip steps! This Is BAD!!</br>';
echo 'Please start from <a href="installer.php">The Beginning</a>';
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
		<div class="bigsubunderline">Database & Table Generation & User Creation</div>
		<br>
	</td>
</tr>	

<tr>
	<td align="center">
<?php

$dbconnect = mysql_connect($dbhost, $dbadmin,$dbadminpass); 
$testdb = 'USE '.$dbname.';';
$query = mysql_query($testdb, $dbconnect);

	echo '<div class="header">Creating The Database - "'.$dbname.'"</div>';
	if(! $query){ 
	
		$makedb = 'CREATE Database '.$dbname.';';
		mysql_query($makedb, $dbconnect);
		echo '<div class="notice">Done.</div>';
	 mysql_select_db("$dbname");	
	
	}else{ 
	
		echo '<div class="warning">DB Exists Already.</div>';
		mysql_select_db("$dbname");
	}

//-------------------

	echo '<div class="header">Creating or Updating Tables...</div>';
	$makegames = 'CREATE TABLE IF NOT EXISTS `games` (
  						`gameid` int(11) NOT NULL AUTO_INCREMENT,
 						`gamename` varchar(30) NOT NULL,
  						`livespercredit` varchar(30) NOT NULL,
  						`gametype` varchar(30) NOT NULL,
  						PRIMARY KEY (`gameid`)
						) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;';
	
	$gamequery = mysql_query($makegames, $dbconnect);

	if (!$gamequery){
	//echo "game table not created";
	mysql_error();
	die;
	}else{
	echo '<div class="notice">Game Table Created...</div>';
	}
	
//-------------------

	$makeplayers = 'CREATE TABLE IF NOT EXISTS `players` (
  						`playerid` int(11) NOT NULL AUTO_INCREMENT,
  						`player_first` varchar(30) NOT NULL,
  						`player_last` varchar(30) NOT NULL,
  						`player_initials` varchar(30) NOT NULL,
  						`username` varchar(20) NOT NULL,
  						`password` varchar(20) NOT NULL,
  						`email` varchar(20) NOT NULL,
  						`accesslevel` varchar(20) NOT NULL,
  						PRIMARY KEY (`playerid`)
						) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6;';
	
	$playerquery = mysql_query($makeplayers, $dbconnect);

	if (!$playerquery){
	echo "player table not created";
	mysql_error();
	die;
	}else{
	echo '<div class="notice">Player Table Created...</div>';
	}	
	
//----------------

	$addadmin = "INSERT INTO `players` (`playerid`, `player_first`, 
						`player_last`, `player_initials`, `username`, `password`, 
						`email`, `accesslevel`) VALUES (1, 'Default', 'Admin', 
						'ADM', 'admin', 'admin', '', 'admin');";

	$adminquery = mysql_query($addadmin, $dbconnect);

	if (!$adminquery){
	echo "admin user not created";
	mysql_error();
	die;
	}else{
	echo '<div class="notice">Default Admin Account Created...</div>';
	}	

//----------------

	$addscores = 'CREATE TABLE IF NOT EXISTS `scores` (
  						`scoreid` int(11) NOT NULL AUTO_INCREMENT,
  						`score` int(30) NOT NULL,
  						`gameid` varchar(30) NOT NULL,
  						`playerid` varchar(30) NOT NULL,
  						`date` varchar(30) NOT NULL,
  						PRIMARY KEY (`scoreid`)
						) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;';

	$scoresquery = mysql_query($addscores, $dbconnect);

	if (!$scoresquery){
	echo "scores table not created";
	mysql_error();
	die;
	}else{
	echo '<div class="notice">Scores Table Created...</div>';
	$_SESSION['nextpage']=4;
	}	

?>
	
</td>
</tr>

<tr>
	<td align="center">
	<br><br>
		<form action="installer4.php">
		<div class="mainbody"> If you have no errors, the last step will write the values to disk. </div>
		<input type="submit" value="Finalize">		
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
