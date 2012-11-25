<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
 
	<link rel="stylesheet" type="text/css" href="includes/main.css" />

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
						<table cellspacing="0" cellpadding="0" class="content">
							<?php 
							
							include("includes/adminconnect.inc"); 
							
							if(isset($_REQUEST["mode"])){

							$editid = $_SESSION['editnewsid'];
							$newsquery = mysql_query('SELECT * FROM news WHERE news_id = '.$editid.'') or die(mysql_error());

							while($row = mysql_fetch_array( $newsquery )){

							$newsid=$row['news_id'];
							$newssubject=$row['news_title'];
							$newsauthor=$row['news_author'];
							$newsdate=$row['news_date'];
						 $bodyedit=$row['news_body'];

							echo '<tr><td colspan="2"><div class="title">News & Announcements<Br><br></div></td></tr>
							<tr><td colspan="2"><div class="bigmainbody">Modify an announcement: <Br><br></div></td></tr>
							<form action="utilprogs/newsmod.php?mode=edit" method="post">
							<tr><td><div class="bigmainbody">Title: </div></td><td><div><input align="right" type="text" name="newssub" size="50" value="'.$newssubject.'"/><br><br></div></td></tr>
							<tr><td colspan="2"><div> <textarea rows="10" cols="50" name="newsbody">'.$bodyedit.'</textarea><br></div></td></tr>
							<tr align="right"><td colspan="2"><div><button name="submit" type="submit">Update</button></div></td></tr>
							</form>
							</td></tr>
							<tr><td></td></tr>';

							}}else{							
							
							echo '<tr><td colspan="2"><div class="title">News & Announcements<Br><br></div></td></tr>
							<tr><td colspan="2"><div class="bigmainbody">Create a new announcement: <Br><br></div></td></tr>
							<form action="utilprogs/newsmod.php?mode=add" method="post">
							<tr><td><div class="bigmainbody">Title: </div></td><td><div><input align="right" type="text" name="newssub" size="50" /><br><br></div></td></tr>
							<tr><td colspan="2"><div> <textarea rows="10" cols="50" name="newsbody"></textarea><br></div></td></tr>
							<tr align="right"><td colspan="2"><div><button name="submit" type="submit">Submit</button></div></td></tr>
							</form>
							</td></tr>
							<tr><td></td></tr>';
									
									};				
						?>		
						
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
