<?php session_start(); ob_start(); ?>
<?php
	
	$theme_new= trim($_POST['theme']);
	
	$completeurl = "../includes/settings.xml";

	$xml = simplexml_load_file($completeurl);

	$xml->theme = $theme_new;

	$xml->asXML ( '../includes/settings.xml' );

	echo '<META HTTP-EQUIV=Refresh CONTENT="1; URL=../index.php">';
 	echo "Theme Changed!";
	
	
?>
