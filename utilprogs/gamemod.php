<?php session_start(); ob_start(); ?>

<?php

session_start();

include("../includes/adminconnect.inc");

// add routine is here


if( $_REQUEST["mode"] == "add"){

$gamename = trim($_POST['game']);
$lives = trim($_POST['livespercred']);
$typeofgame = trim($_POST['gametype']);
	
$query="INSERT INTO games(gamename,livespercredit,gametype) VALUES ('$gamename','$lives','$typeofgame')";

if (!mysql_query($query)){
	die('Error: ' . mysql_error());
	}else {
	header("location:../managegames.php");
	}


}
	
// delete routine is here

if( $_REQUEST["mode"] == "remove"){

		$delgid = $_SESSION['editgameid'];
		$query="DELETE FROM games WHERE gameid='$delgid'";

		if (!mysql_query($query)) {
			die('Error: ' . mysql_error());
			}else{
			$_SESSION['editgameid'] = null;
			header("location:../managegames.php");
				}
			
}

// edit routine is here

if( $_REQUEST["mode"] == "edit"){

$gameid = 		$_SESSION['editgameid'];
$gamename = trim($_POST['game']);
$lives = trim($_POST['livespercred']);
$typeofgame = trim($_POST['gametype']);


$query='update games set gamename="'.$gamename.'", livespercredit="'.$lives.'" where gameid="'.$gameid.'";';	

if (!mysql_query($query)){
	die('Error: ' . mysql_error());
	}else {
		$_SESSION['editgameid'] == null;
		header("location:../managegames.php");
	}

}

?>