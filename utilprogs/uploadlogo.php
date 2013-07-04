<?php session_start(); ob_start(); ?>

<html>
<head>

<link rel="stylesheet" type="text/css" href="../includes/main.css" />

</head>

<div class="mainbody">
<?php 

$tmpfile = $_FILES['logofile']['tmp_name'];
$path = "../images/header.png";

$move = move_uploaded_file($tmpfile,$path);

if($move == false) {
  echo '<META HTTP-EQUIV=Refresh CONTENT="3; URL=../sitesettings.php">';
  echo "File Upload FAILED! - Please make sure the image is less than 1MB - 1,000KB";
} else{
  echo '<META HTTP-EQUIV=Refresh CONTENT="3; URL=../index.php">';
  echo "File Uploaded!";
}

?>
</div>

</html>