<?php session_start(); ob_start(); ?>

<?php

session_start();

include("../includes/adminconnect.inc");

// add routine is here


if( $_REQUEST["mode"] == "add"){

$today = date("l F dS Y");
$author = $_SESSION['username'];
$subject = $_POST['newssub'];
$body = $_POST['newsbody'];


$query="INSERT INTO news(news_title,news_author,news_date,news_body) VALUES ('$subject','$author','$today','$body')";	

if (!mysql_query($query)){
	die('Error: ' . mysql_error());
	}else {
	header("location:../index.php");
	}


}
	
// delete routine is here

if( $_REQUEST["mode"] == "remove"){

		$delpid = $_SESSION['editnewsid'];
		$query="DELETE FROM news WHERE news_id='$delpid'";

		if (!mysql_query($query)) {
			die('Error: ' . mysql_error());
			}else{
			$_SESSION['editnewsid'] = null;
			header("location:../managenews.php");
				}
			
}

// edit routine is here

if( $_REQUEST["mode"] == "edit"){

$today = date("l F dS Y");
$author = $_SESSION['username'];
$subject = $_POST['newssub'];
$body = $_POST['newsbody'];
$editnews = $_SESSION['editnewsid'];


$query='update news set news_title="'.$subject.'", news_body="'.$body.'" where news_id="'.$editnews.'";';	

if (!mysql_query($query)){
	die('Error: ' . mysql_error());
	}else {
		$_SESSION['editnewsid'] == null;
		header("location:../index.php");
	}

}

?>