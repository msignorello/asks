<?php session_start(); ob_start(); ?>
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

	<tr>
		<td>
		<table align="center" class="inside">
				<tr>
					<td width="200px">
						<div class="navigation">
						<?php include("includes/sidenav.php"); ?>
						</div>					
					</td>
					<td valign="top" width="440">

<!-- new table for showing the multiple server info -->				
						<table cellspacing="0" cellpadding="0" class="content" span="100%" >
<?php

	
		include("includes/sqlconnect.inc");

		$allnews = mysql_query("SELECT * FROM news ORDER BY news_id DESC");
		$num_rows = mysql_num_rows($allnews);
		
		while($row = mysql_fetch_array( $allnews )){

						$newstitle=$row['news_title'];
						$newsauthor=$row['news_author'];
			  		$newsbody=$row['news_body'];
							$newsdate=$row['news_date'];
							
							echo '<tr width="100%"><td colspan="2"><div class="title">'.$newstitle.'</div></td><tr>';
							echo '<tr width="100%"><td><div class="content">Written By: '.$newsauthor.'</td></tr>';
							echo '<tr width="100%"><td> Sibmitted On: '.$newsdate.'</td></tr>';
							echo '<tr width="100%"><td colspan="2"><div class="content"><br>'.$newsbody.'<Br><br></div></td><tr>';
				}


?>



							<tr><td></td></tr>
							</td></tr>
							<tr><td>
								
							
							
							
							</td></td></tr>
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
