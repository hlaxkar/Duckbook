<?php

session_start();
//-------------LOGIN-----------//

if ( !isset( $_SESSION[ 'username' ] ) && $_SESSION[ 'uid' ] == "" ) //----------LOGOUT if not valid-------
{
    header( "location:login.php" );
    exit();
} else {
    include( "navbar.php" );

    include( "connect.php" );
    //----------/LOGIN-----------//

    $timeline = mysqli_query( $conn, "select * from user_info where uid = '" . $_GET['user'] . "'" );
    $user = mysqli_fetch_array( $timeline );
   
if($_SESSION['username'] == $user['username'] ){
	header( "location:timeline.php" );
    exit();
}
?>
<!doctype html>
<html>
<head>
<title>Profile Page - Friends</title>
<?php include("includecss.html");?>

</head>

<body >
<!-- Top Header-Profile -->
<div class="header-spacer"></div>
<div class="container">
  <div class="row" style="width: 100%">
    <div class="ui-block">
      <div class="top-header">
		  <div class="top-header-thumb" style="width: auto; height: 450px; overflow: hidden;"> <a target="_blank" href="<?php if(isset($user['header']) && $user['header']!=""){echo $user['header'];} else{echo "img/top-header2.jpg";} ?>" ><img src="<?php if(isset($user['header']) && $user['header']!=""){echo $user['header'];} else{echo "img/top-header2.jpg";} ?>" alt="Header"></a> </div>
        <div class="profile-section">
          <div class="row">
            <div class="col col-lg-5 col-md-5 col-sm-12 col-12">
              <ul class="profile-menu">
                <li> <a href="02-ProfilePage.html" class="active">Timeline</a> </li>
                <li> <a href="05-ProfilePage-About.html">About</a> </li>
                <li> <a href="06-ProfilePage.html">Friends</a> </li>
              </ul>
            </div>
            <div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
              <ul class="profile-menu">
                <li> <a href="07-ProfilePage-Photos.html">Photos</a> </li>
                <li> <a href="09-ProfilePage-Videos.html">Videos</a> </li>
              </ul>
            </div>
          </div>
          
        </div>
        <div class="top-header-author"> <a href="02-ProfilePage.html" class="author-thumb" > <img src="<?php echo $user['pfp'] ?>" alt="author" style="width: 142px;
    height: 142px;
    border-radius: 100%;
    overflow: hidden;
    "> </a>
          <div class="author-content"> <a href="02-ProfilePage.html" class="h4 author-name"><?php echo $user['fname'] ?></a>
            <div class="country"><?php echo $user['branch'] ?>, <?php echo $user['year'] ?> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ... end Top Header-Profile -->
<div class="container">
  <div class="row">
    <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
      <div class="ui-block">
        <div class="ui-block-title">
          <h6 class="title">Profile Intro</h6>
        </div>
        <div class="ui-block-content"> 
          
          <!-- W-Personal-Info -->
          
          <ul class="widget w-personal-info item-block">
			  <li> <span class="title">About Me:</span><p><?php echo $user['bio'] ?></p> <span class="text"></span> </li>
            <li> <span class="title">Favourite TV Shows:</span> <span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span> </li>
            <li> <span class="title">Favourite Music Bands / Artists:</span> <span class="text">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</span> </li>
          </ul>
          
          <!-- .. end W-Personal-Info --> 
          <!-- W-Socials -->
          
          <div class="widget w-socials">
            <h6 class="title">Other Social Networks:</h6>
            <a href="<?php echo $user['facebook'] ?>" class="social-item bg-facebook"> <i class="fab fa-facebook-f" aria-hidden="true"></i> Facebook </a> <a href="<?php echo $user['twitter'] ?>" class="social-item bg-twitter"> <i class="fab fa-twitter" aria-hidden="true"></i> Twitter </a> <a href="<?php echo $user['instagram'] ?>" class="social-item bg-danger"> <i class="fab fa-instagram" aria-hidden="true"></i> Instagram </a> </div>
        </div>
      </div>
    </div>
    <div class="col order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12 col-xl-7"> 
      
      <!-- Post -->
      
      <div id="newsfeed-items-grid">
       <!-- --------- Posts display-----------    -->
        <?php 
      include("connect.php");
      $q = mysqli_query($conn, "select * from posts where user = '".$user['username']."' order by postid DESC");
    $numr= mysqli_num_rows($q);
	if($numr>0){    
	
	while($row = mysqli_fetch_array($q))
        {
            $postuser = $row[1];
            $postcont = $row[2];
		$q2 =	mysqli_query($conn, "select * from user_info where username = '".$postuser."' ");
            $row2 = mysqli_fetch_array($q2);
       ?>

        <div class="ui-block ">
          <div class="ui-block-content">
            <div class="post__author author vcard inline-items">
              <img src="<?php echo $row2['pfp'] ?>" alt="author">

              <div class="author-date">
                <a class="h6 post__author-name fn" href="#"><?php echo $row2['fname'] ?></a>
                
				  <div class="post__date">
					
                  <time class="published" datetime="2004-07-24T18:18">
					  <?php echo $row['datetime'] ?>
                    
                  </time>
                </div>
              </div>

            </div>
            <p> <?php echo $postcont ?></p>
			  <?php if(isset($row['filename']) && $row[3]!=="")
	   {?>
			  <center><a target="_blank" href="<?php echo $row['path'] ?>" ><img src="<?php echo $row['path'] ?>" alt="post image" style="max-height: 450px"></a></center>
		  <?php } ?>
          </div>
        </div>
        <?php  }}else{
			
			echo "<h4>No posts from user currently</h4>";
		}
      ?>
        <!-- ---------end Posts display-----------    -->
        
        <!-- .. end Post --> </div>
    </div>
  </div>
</div>
</div>
<?php	include("includejs.php");?>
</body>
<?php }?>
</html>