<?php session_start(); ob_start(); ?>
<?php

include("../includes/sqlconnect.inc");

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql="SELECT * FROM players WHERE username='$username' and password='$password'";
$query = mysql_query($sql) or die(mysql_error());

$results = mysql_fetch_array( $query );

if($results != null){
	
	$regname=$results['player_first'];
	$pid=$results['playerid'];
	$regrights=$results['accesslevel'];
	
//
// if this is an admin keep the id seperate
//
	if($regrights=="admin") {$_SESSION["adminID"]=$pid;} else {$_SESSION["adminID"]="";}	
	
	$_SESSION['username'] = $regname;
	$_SESSION['rights'] = $regrights;
	$_SESSION['pid'] = $pid;
	$_SESSION['authfail'] = 0;

// set session DB variables. 	
	$_SESSION['db'] = $db;
	$_SESSION['dbuser'] = $dbuser;
	$_SESSION['dbpass'] = $dbpass;
	$_SESSION['dbhost'] = $dbhost;

	header("location:../index.php");

}
else{

	$_SESSION['authfail'] = 1;
	header("location:../login.php");

}

?>