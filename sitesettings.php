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
					<td valign="top" width="450px">

<!-- new table for showing the multiple server info -->				
						<table span="100%" cellspacing="0" cellpadding="0" border="0" class="content">
							
							<tr><td><div class="title">Site Settings<Br></div></td></tr>
							<tr><td><div class="subtitle">You will be able to modify certain aspects of the site through this page as well as upload your own logo image. </div><br></td></tr>

<!-- Theme Selection -->
							<tr><td><div>
								<form method="post" action="utilprogs/changetheme.php">
								<table class="content" border="0">
									<tr>
										<td width="100px"><div class="subunderline">Theme Selection:</div></td>
										<td><input type="radio" name="theme" value="default" checked>Default</td>
										<td><input type="radio" name="theme" value="dark">Dark</td>
									</tr>
									<tr><td><input type="submit" name="theme" value="Submit"></td></tr>								
								</table>
								</form>							
							</div><td></tr>
								
<!-- Logo Upload Selection -->
							<tr><td><div>
								<form method="post" action="utilprogs/uploadlogo.php" enctype="multipart/form-data">
									<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
										<table class="content" border="0">
											<tr><td width="100px"><div class="subunderline">Logo Upload</div></td></tr>
											<tr><td>Choose a file to upload. Dimensions of logo should be 640x96 px and needs to be in PNG format. Any other size will not be supported and may not render properly. A blank template file has been included in the "images" folder.</td></tr>
											<tr><td><input type="file" name="logofile"></td><tr>		
											<tr><td><input type="submit" name="uplogo" value="Upload"></td></tr>								
										</table>
								</form>		
							</div><td></tr>								
															
							
												
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
