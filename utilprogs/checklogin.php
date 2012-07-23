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
	$regrights=$results['accesslevel'];
	$_SESSION['username'] = $regname;
	$_SESSION['rights'] = $regrights;
	$_SESSION['authfail'] = 0;
	header("location:../index.php");

}
else{

	$_SESSION['authfail'] = 1;
	header("location:../login.php");

}

?>