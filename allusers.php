<?php

session_start();

include( "includecss.html" );

include( "navbar.php" );;

?>

<!doctype html>

<html>
<head>
<meta charset="utf-8">

<!-- Main Styles CSS -->

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/fonts.min.css">

<!-- Bootstrap CSS -->

<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">
<title >All users</title>
</head>

<body style="padding-top: 4rem;

			 text-align: center">
<div class="crumina-module crumina-heading with-title-decoration">
  <h1 class="heading-title">All Users</h1>
  <hr>
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
                    <?php
                    if ( !isset( $_REQUEST[ 'selectyear' ] ) )

                    {
                        ?>
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
                <button> Search </button>
                <span class="material-input"></span></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col ui-block">
        <table width="100%" border="0">
          <tbody>
            <tr>
              <th scope="col">User</th>
              <th scope="col">Info</th>
              <th scope="col">Status</th>
              <th scope="col">Delete</th>
            </tr>
            <?php

            include( "connect.php" );


            //----------------------Enable/disable/Delete Start------------------------// 

            if ( isset( $_GET[ 'eid' ] ) ) {

                mysqli_query( $conn, "update user_info set status = '1' where uid = '" . $_GET[ 'eid' ] . "'" );


            }


            if ( isset( $_GET[ 'did' ] ) ) {

                mysqli_query( $conn, "update user_info set status = '0' where uid = '" . $_GET[ 'did' ] . "'" );


            }

            if ( isset( $_GET[ 'id' ] ) ) {

                mysqli_query( $conn, "delete from user_info where uid = '" . $_GET[ 'id' ] . "' " );

                mysqli_query( $conn, "delete from posts where user = '" . $_GET[ 'username' ] . "' " );

            }

            //----------------------Enable/disable/Delete END--------------------------// 

            if ( isset( $_REQUEST[ 'selectyear' ] ) && $_REQUEST[ 'selectyear' ] !== 'All Years' ) {

                $Q = mysqli_query( $conn, "select * from user_info where year = '" . $_POST[ 'selectyear' ] . "' 

	 															" );

            } else {

                $Q = mysqli_query( $conn, "select * from user_info" );

            }


            $num = mysqli_num_rows( $Q );

            if ( $num > 0 ) {

                $count = 1;


                while ( $row = mysqli_fetch_array( $Q ) ) {


                    ?>
            <tr>
              <td rowspan="2"><img src="<?php echo $row['pfp']?>" alt="Pfp" style="max-height: 100px"  /></td>
              <td height="59" align="left"><p> 
                <a class="h3 post__author-name fn" href="Friend_profile.php?user=<?php echo $row['uid'] ?>">
                <h4><?php echo $row['fname']?></h4>
                </a> @<?php echo $row['username']?>
                </p></td>
              <td rowspan="2"><div class="">
                  <label> 
                    
                    <!--=========Enable Disable Buttons====--> 
                    
                    <a href="allusers.php?todo=update&eid=<?php echo $row[0] ?>" style="text-decoration: none" role="button" class="btn btn-outline-primary"> Enable </a> <a href="allusers.php?todo=update&did=<?php echo $row[0] ?>" style="text-decoration: none" role="button" class="btn btn-outline-danger" aria-pressed="true"> Disable </a> 
                    
                    <!--=========END Enable Disable Buttons====--> 
                    
                  </label>
                </div></td>
              <td rowspan="2"><!--======DELETE BUTTON======--> 
                
                <a href="allusers.php?action=delete&id=<?php echo $row[0]?>&username=<?php echo $row['username']?>" role="button" class="btn btn-danger">Delete</a> 
                
                <!--======END DELETE BUTTON======-->
                
            </tr>
            <tr>
              <td><table width="100%" border="0"  style="
    font-size: .8rem;
">
                  <tbody align="left">
                    <tr>
                      <td><strong>Roll No.:</strong></td>
                      <td><?php echo $row['rollno']?></td>
                      <td><strong>Branch:</strong></td>
                      <td><?php echo $row['branch']?></td>
                    </tr>
                    <tr>
                      <th scope="row">SPN No.:</th>
                      <td><?php echo $row['spnno']?></td>
                      <td><strong>Year:</strong></td>
                      <td><?php echo $row['year']?></td>
                    </tr>
                    <tr>
                      <th scope="row">Email:</th>
                      <td><?php echo $row['email']?></td>
                      <td><strong>Mobile:</strong></td>
                      <td><?php echo $row['phone']?></td>
                    </tr>
                    <tr>
                      <th scope="row">Gender:</th>
                      <td><?php echo $row['gender']?></td>
                      <td><strong>Status:</strong></td>
                      <td><?php
                      if ( $row[ 'status' ] == '1' )

                      {
                          echo "Enabled";
                      } else {
                          echo "Disabled";
                      }
                      ?></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td colspan="4"><hr></td>
            </tr>
            <?php $count++; }}?>
          </tbody>
        </table>
        <hr>
      </div>
    </div>
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
