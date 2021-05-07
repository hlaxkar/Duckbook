<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Search Friends</title>
</head>
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
	<?php 
	session_start();
	include("connect.php");
	include("navbar.php");?>
	<body style="padding-top: 4rem;
			 text-align: center">
<div class="crumina-module crumina-heading with-title-decoration">
  <h1 class="heading-title">Search Users</h1>
  
  <div class="container">
    <div class="row">
      <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="ui-block responsive-flex1200">
          <div class="ui-block-title">
			  
            <form class="form-inline" action="?" method="post">
              <div class="w-select">
                <div class="title">Branch:</div>
                <fieldset class="form-group">
                  <select class="form-control selectpicker" name="branch">
                    <option>Computer Science</option>
                    <option>Electrical</option>
                    <option>Mechanical</option>
                  </select>
                  <span class="material-input"></span>
                </fieldset>
              </div>
              <div class="w-select">
                <div class="title">Year:</div>
                <fieldset class="form-group">
                  <select class="form-control selectpicker" name="selectyear">
					  <?php if(!isset($_REQUEST['selectyear']))
{ ?>
					<option >All Years</option>
                    <option >I Year</option>
                    <option >II Year</option>
                    <option >III Year</option>
					  <?php }else{?>
					<option <?php if($_REQUEST['selectyear']=="All Years"){echo "selected";}?>>All Years</option>
                    <option <?php if($_REQUEST['selectyear']=="I Year"){echo "selected";}?>>I Year</option>
                    <option <?php if($_REQUEST['selectyear']=="II Year"){echo "selected";}?>>II Year</option>
                    <option <?php if($_REQUEST['selectyear']=="III Year"){echo "selected";}?>>III Year</option>
					<?php  } ?>
                  </select>
                </fieldset>
              </div>
              <div>
                <input type="submit" class="btn btn-primary">
              </div>
            </form>
            <form class="w-search">
              <div class="form-group with-button is-empty">
                <input class="form-control" type="text" placeholder="Search Users......">
                <button>
                Search
                </button>
                <span class="material-input"></span></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
	<div class="container">
  <div class="row">
	<?php
	
	if(isset($_REQUEST['selectyear']) && $_REQUEST['selectyear']!=='All Years'){
	 $Q = mysqli_query( $conn, "select * from user_info where year = '".$_POST['selectyear']."' 
	 															");
}else{ 
$Q = mysqli_query( $conn, "select * from user_info where status = '1' and fname like '".$_GET['search']."%' ");
}
           
            $num = mysqli_num_rows( $Q );
            if ( $num > 0 ) {
                $count = 1;


                while ( $row = mysqli_fetch_array( $Q ) ) {

                    ?>
  <div class="col-3-width" style="padding-left: 10px;">
      <div class="ui-block">
        <div class="ui-block-title">
          <div class="post__author author vcard inline-items align-left" > <img src="<?php echo $row['pfp']; ?>" alt="author" style="width: 100px;
    height: 100px;
    border-radius: 100%;
    overflow: hidden;
    margin-right: 12px;">
            <div class="author-date">
				<h3><a class="h3 post__author-name fn" href="Friend_profile.php?user=<?php echo $row['uid'] ?>"> <?php echo $row['fname']; ?></a></h3></h3>
              <div class="post__date"> <?php echo "@".$row['username']; ?></div>
            </div>
          </div>
        </div>
        <div class="ui-block-content" style="
    padding-bottom: 3px;
    padding-right: 15px;
    padding-left: 15px;
    padding-top: 10px;
">
          <table width="100%" border="0">
            <tbody align="left">
              <tr>
                <td width="23%" height="35" scope="row"><strong>Branch</strong>:</td>
                <td width="40%"><?php echo $row['branch']; ?></td>
                <th width="21%">Year:</th>
                <td width="16%"><?php echo $row['year']; ?></td>
              </tr>
              
              
              <tr>
                
                <td colspan="3"><div class="row" >
                    <div class="col" style="padding-top: 5px"><a href="#" aria-pressed="true" role="button"  class="btn btn-block btn-outline-secondary" style="color: aliceblue;background-color: mediumpurple"> Add Friend </a></div>
                    <div class="col" style="padding-top: 5px"> <a href="#" style="text-decoration: none" role="button" class="btn btn-success btn-block" aria-pressed="true"> Message </a> </div>
                  </div></td>
              </tr>
            </tbody>
          </table>
          </p>
        </div>
      </div>
    </div>
		<?php }} ?>
	</div>
</div>
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
</body>
</html>