<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 
	<?php include ("includes/functions.php"); theme_set(); ?>

</head>
<body>

<table align="center" class="main">
	<tr>
		<td><img src="images/header.png"></td>	
	</tr>
	
<!-- row for system stats  -->	
	<tr>
		<td>
			<?php include("includes/header.php"); ?>
		</td>	
	</tr>

<!-- row for main left and right  -->
<!-- php for when an option button is pressed to set the variables properly and decide which method to use -->

<?php 
					if(isset($_POST['newsoption'])) {
						
					$action = $_POST['newsoption'];	
					
//					echo $action;
					
										if($action == "New"){
						
															header("location:addnews.php");
						
										}	
						
									 if($action == "Delete"){
															$_SESSION['editnewsid'] = $_POST['newsid'];
															header("location:utilprogs/newsmod.php?mode=remove");
										}
																	
										if($action == "Edit"){
															$_SESSION['editnewsid'] = $_POST['newsid'];
															header("location:addnews.php?mode=edit");
										}													
						
						
					}
		
						
?>

<!-- -->
	<tr>
		<td>
		<table align="center" class="inside">
				<tr>
					<td valign="top" width="200px">
						<div class="navigation">
						<?php include("includes/sidenav.php"); ?>
						</div>					
					</td>
					<td valign="top" width="440">

<!-- new table for showing the body content -->				
						<table cellspacing="0" cellpadding="0" width="100%">
							<tr><td><div class="title">News Management<br></div></td></tr>
							<tr><td><div class="subtitle">These are all posted news articles: </div><br></td></tr>
							<tr><td><div>
							
<form method="post" action="managenews.php">


<table cellpadding="0" class="content" cellspacing="0" width="100%">
<tr><th>News Date</th><th>Subject</th><th>Author</th><th>Selected</th></tr>
<?php

include("includes/adminconnect.inc");

$newsquery = mysql_query("SELECT * FROM news") or die(mysql_error());

while($row = mysql_fetch_array( $newsquery )){

$newsid=$row['news_id'];
$newssubject=$row['news_title'];
$newsauthor=$row['news_author'];
$newsdate=$row['news_date'];
	
	echo "<tr>";
		echo '<td>'.$newsdate.'</td>';
		echo '<td>'.$newssubject.'</td>';
		echo '<td>'.$newsauthor.'</td>';	
		echo '<td><input type="radio" name="newsid" value="'.$newsid.'"></td>';
	echo "</tr>";
}
?>
<tr><td>

	<table>
		<tr><td><input type="submit" name="newsoption" value="Delete"/></td><td><input type="submit" name="newsoption" value="Edit" label="Edit"/><input type="submit" name="newsoption" value="New"/></td></tr>
	</table>

</table>


</form>
<br>
<br>

							</td></tr></div>

<!-- add div here -->


						</table>							

				</td>				
				</tr>
	</table>			
	</td>
	</tr>

<!-- row for footer  -->

	<tr>
		<td>
				<?php include("includes/footer.php"); ?>
		</td>	
	</tr>
	
	
</table>



</body>
</html>
