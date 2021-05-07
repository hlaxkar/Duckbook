<?php
include( "connect.php" );

//-------------LOGIN-----------//
session_start();
if ( !isset( $_SESSION[ 'username' ] ) /* &&  $_SESSION['uid']==""*/ ) //----------LOGOUT if not valid-------
{
    header( "location:login.php" );
    exit();
} else {

    $userq = mysqli_query( $conn, "select * from user_info where uid = '" . $_SESSION[ 'uid' ] . "' " );


    $user = mysqli_fetch_array( $userq );

    //----------/LOGIN-----------//
    ?>
<!doctype html>
<html>
<head>
<!-- Required meta tags always come first -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!-- Main Styles CSS -->
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/fonts.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

<!-- Main Font --> 
<script src="js/libs/webfontloader.min.js"></script> 
<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
</script>
<title>Newsfeed</title>
</head>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #262626;
         "><a class="navbar-brand" href="index.php"><img src="img/logo.png" class="navbar-brand" style="max-height: 35px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent1">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active "><a class="nav-link" href="index.php">Home</a></li>
      <li class="nav-item "><a class="nav-link" href="timeline.php">Timeline</a></li>
      <?php
      if ( $_SESSION[ 'username' ] == "admin" ) {
          ?>
      <li class="nav-item "><a class="nav-link" href="approve_user.php">Approve Users</a></li>
      <li class="nav-item "><a class="nav-link" href="allusers.php">All Users</a></li>
      <?php }?>
    </ul>
    
    <!--	Search bar	-->
    
    <div  class="mr-auto">
      <form class="form-inline" method="get" action="search_friends.php">
        <input type="text" class="form-control mr-sm-2" placeholder="Search Friends" style="
			background: white;" name="search">
        <button type="submit" class="btn btn-yellow" value="Search" style="background-color: yellow">Search</button>
      </form>
    </div>
    
    <!--End bar-->
    <!--=====LOGOUT BUTTON======-->
    <div style="float:right;" >
      <ul class="navbar-nav" >
        <li class="nav-item author-thumb form-inline">
          <!--
			 <a class="nav-link" href="timeline.php"><img src="<?php echo $user['pfp']; ?>"  style="height: 36px;
    width: 36px;"><h6><?php echo $_SESSION['username'] ?></h6></a></li>-->
          
        <li class="nav-item "><a href="login.php?action=logout" role="button" class="btn btn-danger" style="margin-bottom: 0px">Sign Out</a></li>
      </ul>
    </div>
    
    <!--====/LOGOUT BUTTON======-->
  </div>
</nav>

<body style="padding-top: 100px; align-content: center;">
<div class="container">
  <div class="row"> 
    <!--   ==============Sidebar===========     -->
    <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
      <div class="ui-block ">
        <div class="align-center">
          <div class="author-thumb1"> <img src="<?php echo $user['pfp']; ?>"> </div>
        </div>
        <div class="ui-block-title">
          <h3><?php echo $user['fname']; ?> </h3>
        </div>
        <div class="ui-block-content">
          <ul class="widget w-personal-info item-block">
            <li> <span class="title">About Me:</span> <span class="text"><?php echo $user['bio'] ?></span> </li>
            <li> <span class="title">Favourite TV Shows:</span> <span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span> </li>
            <li> <span class="title">Favourite Music Bands / Artists:</span> <span class="text">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</span> </li>
          </ul>
        </div>
      </div>
    </aside>
    <!--   ==============end Sidebar===========     -->
    <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
      <div class="ui-block"> 
        
        <!-- News Feed Form  -->
        
        <div class="news-feed-form"> 
          
          <!-- Tab panes -->
          
          <div class="tab-pane active" id="home-1" aria-expanded="true"> 
            <!--===========Form for post ============ -->
            
            <form method="post" action="add post.php"  name="frm1" enctype="multipart/form-data">
              <div class="author-thumb"> <img src="<?php echo $user['pfp'];?>" alt="author" style="height: 36px; width: 36px"> </div>
              <div class="form-group with-icon label-floating is-empty">
                <textarea class="form-control" placeholder="Share what you are thinking here..." name="postcontent"></textarea>
              </div>
              <div class="add-options-message inline--media-content">
                <label for="ddf"><a class="options-message" data-toggle="tooltip" data-placement="top"  data-original-title="ADD PHOTOS">
                  <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                  </svg>
                  </a></label>
                <input type="file" name="pic" id="ddf" value="pic" hidden accept="image/jpeg">
                <button type="submit" class="btn btn-primary btn-md-2 float-lg-right" name="addpost">Post Status</button>
              </div>
            </form>
            <!--===========end of Form for post ============ --> 
          </div>
        </div>
        
        <!-- ... end News Feed Form  --> 
      </div>
      <hr>
      <!-- --------- Posts display-----------    -->
      <?php
      include( "connect.php" );
      $q = mysqli_query( $conn, "select * from posts order by postid DESC" );
      while ( $row = mysqli_fetch_array( $q ) ) {
          $postuser = $row[ 1 ];
          $postcont = $row[ 2 ];
          $q2 = mysqli_query( $conn, "select * from user_info where username = '" . $postuser . "' " );
          $row2 = mysqli_fetch_array( $q2 );
          ?>
      <div class="ui-block ">
		  <article class="hentry post has-post-thumbnail">
        <div class="uiblock-content">
          <div class="post__author author vcard inline-items"> <img src="<?php echo $row2['pfp'] ?>" alt="author">
            <div class="author-date"> <a class="h6 post__author-name fn" href="Friend_profile.php?user=<?php echo $row2['uid'] ?>"><?php echo $row2['fname'] ?></a>
              <div class="post__date">
                <time class="published" datetime="2004-07-24T18:18"> <?php echo $row['datetime'] ?> </time>
              </div>
            </div>
            <div class="more">
              <svg class="olymp-three-dots-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
              </svg>
              <ul class="more-dropdown">
				  <?php if($row2["username"] == $_SESSION["username"]){ ?>
                <li> <a href="#" >Edit Post</a> </li>
				   <?php } ?>
				  <?php if($_SESSION["username"] == "admin" || $row2["username"] == $_SESSION["username"]){ ?>
                <li> <a href="#" data-toggle="modal" data-target="#faqs-popup">Delete Post</a> </li>
				  <?php } ?>
				   <?php if($row2["username"] !== $_SESSION["username"] && $_SESSION["username"] !== "admin"){ ?>
                <li> <a href="#" >Report to Admin</a> </li>
				  <?php } ?>
              </ul>
            </div>
          </div>
          <p> <?php echo $postcont ?></p>
          <?php
          if ( isset( $row[ 'filename' ] ) && $row[ 3 ] !== "" ) {
              ?>
			<div class="post-thumb">
          <center>
            <a target="_blank" href="<?php echo $row['path'] ?>"><img src="<?php echo $row['path'] ?>" alt="post image" style="max-height: 450px; max-width: auto"></a>
          </center>
			</div>
          <?php } ?>
        </div>
		  <div class="post-additional-info inline-items">
							
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
										<span>18</span>
									</a>
							
									
							
									<div class="names-people-likes">
										<a href="#">Jenny</a>, <a href="#">Robert</a> and
										18 more liked this
									</div>
							
									<div class="comments-shared">
										<a href="#" class="post-add-icon inline-items">
											<svg class="olymp-speech-balloon-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
							
											<span>0</span>
										</a>
							
										<a href="#" class="post-add-icon inline-items">
											<svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
							
											<span>16</span>
										</a>
									</div>
							
							
								</div>
			  </article>  </div>
      <?php
      }
      ?>
      <!-- ---------end Posts display-----------    --> 
      <a id="load-more-button" href="#" class="btn btn-control " data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
      <svg class="olymp-three-dots-icon">
        <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
      </svg>
      </a> </main>
	 
  </div>
</div>
	<!-- Faqs Popup -->

<div class="modal fade" id="faqs-popup" tabindex="-1" role="dialog" aria-labelledby="faqs-popup" aria-hidden="true">
	
	<div class="modal-dialog window-popup faqs-popup" role="document">
		<div class="modal-content bg-transparent "  style="
    backdrop-filter: blur(35px); color: white;">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon">
					<use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
				</svg>
			</a>

			<div class="modal-header bg-transparent" style="
    backdrop-filter: blur(35px); color: white;">
				<h6 class="title" style="color: white;">Delete Post?</h6>
			</div>

			<div class="modal-body">
				<div class="modal-content bg-transparent" style="
    backdrop-filter: blur(35px); ">
					 
			<h3 class="title" align="center" style="color: white;">ARE YOU SURE ABOUT THAT?</h3>
				
			<div class="inline-items bg-transparent" align="center" style="
    backdrop-filter: blur(35px); color: white;">
				 <form method="post" action="?">
				<button class="btn btn-danger btn-control" type="submit" name="deletepost">YES</button> <button class="btn btn-success btn-control" data-dismiss="modal" aria-label="Close">NO</button>
				</div>
					</form>
			</div>
			<div class="modal-footer bg-transparent" style="
    backdrop-filter: blur(35px); "> The changes are permanent </div>
		</div>
	</div>
</div>
	</div>
	
<!-- ... end Faqs Popup -->

</body>
<?php } ?>
<!-- JS Scripts -->
<script src="js/jQuery/jquery-3.4.1.js"></script>
<script src="js/libs/jquery.appear.js"></script>
<script src="js/libs/jquery.mousewheel.js"></script>
<script src="js/libs/perfect-scrollbar.js"></script>
<script src="js/libs/jquery.matchHeight.js"></script>
<script src="js/libs/svgxuse.js"></script>
<script src="js/libs/imagesloaded.pkgd.js"></script>
<script src="js/libs/Headroom.js"></script>
<script src="js/libs/velocity.js"></script>
<script src="js/libs/ScrollMagic.js"></script>
<script src="js/libs/jquery.waypoints.js"></script>
<script src="js/libs/jquery.countTo.js"></script>
<script src="js/libs/popper.min.js"></script>
<script src="js/libs/material.min.js"></script>
<script src="js/libs/bootstrap-select.js"></script>
<script src="js/libs/smooth-scroll.js"></script>
<script src="js/libs/selectize.js"></script>
<script src="js/libs/swiper.jquery.js"></script>
<script src="js/libs/moment.js"></script>
<script src="js/libs/daterangepicker.js"></script>
<script src="js/libs/fullcalendar.js"></script>
<script src="js/libs/isotope.pkgd.js"></script>
<script src="js/libs/ajax-pagination.js"></script>
<script src="js/libs/Chart.js"></script>
<script src="js/libs/chartjs-plugin-deferred.js"></script>
<script src="js/libs/circle-progress.js"></script>
<script src="js/libs/loader.js"></script>
<script src="js/libs/run-chart.js"></script>
<script src="js/libs/jquery.magnific-popup.js"></script>
<script src="js/libs/jquery.gifplayer.js"></script>
<script src="js/libs/mediaelement-and-player.js"></script>
<script src="js/libs/mediaelement-playlist-plugin.min.js"></script>
<script src="js/libs/ion.rangeSlider.js"></script>
<script src="js/libs/leaflet.js"></script>
<script src="js/libs/MarkerClusterGroup.js"></script>
<script src="js/main.js"></script>
<script src="js/libs-init/libs-init.js"></script>
<script defer src="fonts/fontawesome-all.js"></script>
<script src="Bootstrap/dist/js/bootstrap.bundle.js"></script>
</html>