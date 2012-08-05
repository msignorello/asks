<?php

session_start();

include("includes/adminconnect.inc");

switch ($_POST['playeroption']){
		case "Delete":

		$delpid = trim($_POST['edit']);
		$query="DELETE FROM players WHERE playerid='$delpid'";
		$query2="DELETE FROM scores WHERE playerid='$delpid'";

		if (!mysql_query($query)){
			die('Error: ' . mysql_error());
			}{
			mysql_query($query2);

		}
		header("location:adminsettings.php");
		break;

		case "Edit":
		
		$_SESSION['pid'] = $_POST['edit'];
		header("location:editplayer.php?mode=player");
		break;

}

?>

