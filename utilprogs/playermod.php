<?php 

include("includes/adminconnect.inc");

if(isset($_POST['submit'])) {
	$delpid = trim($_POST['delete']);
			
$query="DELETE FROM players WHERE playerid='$delpid'";
$query2="DELETE FROM scores WHERE playerid='$delpid'";

if (!mysql_query($query)){
	die('Error: ' . mysql_error());
	}
	mysql_query($query2);
	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=delplayer.php">';
}

?>

