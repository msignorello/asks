<?php 

if(isset ($_SESSION['rights'])){

	if($_SESSION['rights'] == "admin"){
			$db = $_SESSION['db']; 
			$dbuser = $_SESSION['dbuser'];
			$dbpass = $_SESSION['dbpass'];
			$dbhost = $_SESSION['dbhost'];

mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
//echo "Connected to MySQL<br>";
mysql_select_db($db) or die(mysql_error());


	}elseif($_SESSION['rights'] == "player"){

	$_SESSION['authfail'] = 2;
	header("location:login.php");
		}
	
}else{

	header("location:login.php");
}					

?>