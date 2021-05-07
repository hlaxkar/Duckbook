
<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #262626;
         ">
    <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="navbar-brand" style="max-height: 35px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item "> <a class="nav-link" href="index.php">Home 
			
			
			</a> </li>
        <li class="nav-item "> <a class="nav-link" href="timeline.php">Timeline</a> </li>
		
		  <?php
		  if($_SESSION['username']=="admin"){ ?>
		  	  
		 <li class="nav-item "> <a class="nav-link" href="approve_user.php">Approve Users</a> </li>
		<li class="nav-item "> <a class="nav-link" href="allusers.php">All Users</a> </li>
		  <?php }?>
		  </ul>
		
<!--	Search bar	-->
		
		<div  class="mr-auto">
		 <form class="form-inline" method="get" action="search_friends.php">
			
			<input type="text" class="form-control mr-sm-2" placeholder="Search Friends" style="
			background: white;" name="search">
			 <button type="submit" class="btn btn-yellow" value="Search" style="background-color: yellow">Search</button></form> 
		</div>
        
        
<!--End bar-->
		 <!--=====LOGOUT BUTTON======-->
 <div style="float:right;" >
	 <ul class="navbar-nav" >
		 <li class="nav-item author-thumb form-inline">
			 <!--
			 <a class="nav-link" href="timeline.php"><img src="<?php echo $user['pfp']; ?>"  style="height: 36px;
    width: 36px;"><h6><?php echo $_SESSION['username'] ?></h6></a></li>-->
	 
	 
   <li class="nav-item "> <a href="login.php?action=logout" role="button" class="btn btn-danger" style="margin-bottom: 0px">
        Sign Out  
	   </a></li></ul>
</div>
    
    <!--====/LOGOUT BUTTON======-->
    </div>

  </nav>

