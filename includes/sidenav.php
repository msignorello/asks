         <div class="title">Players</div>
         <div>
         <ul>
             <li><a href="playerlist.php">Player List</a></li>
				 <li><a href="editplayer.php">Edit Profile</a></li>
             <li><a href="addplayer.php">Add Player</a></li>
         </div>
         <br>
			<div class="title">Games</div>
         <div>
         <ul>
             <li><a href="gamelist.php">Game List</a></li>             
         	 <li><a href="addscore.php">Add Score!</a></li>
          </ul>
         </div>
         <div class="title">Reports & Stats</div>
         <div >
         <ul>
	      <li><a href="allscores.php">All Scores</a></li>
	      <li><a href="selectreport.php">Run Custom Query</a></li>
	      <li>Top 3 Per Game</li>
         </ul>
         </div>

	<?php
	if(isset($_SESSION['rights'])){
		if($_SESSION['rights'] == "admin"){
			include ("adminsidenav.php");
		}
	}					
	
	?>