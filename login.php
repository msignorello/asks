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
							<tr><td><div class="title">Please Login<Br><br></div></td></tr>
							<tr><td><div>
							<form name="login" method="post" action="utilprogs/checklogin.php">
								Username: <input name="username" type="text" id="username"><br>
								Password: <input name="password" type="password" id="password"><br>
								<input type="submit" name="Submit" value="Login">
							</form>
							</div></td></tr>
							</td></tr>
							<tr><td><br></td></tr>
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
