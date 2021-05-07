<?php 
	session_start();
	include("navbar.php"); 
	include("connect.php");
	
	$uq = mysqli_query($conn, "select * from user_info where uid = '".$_SESSION['uid']."'");
    $urow = mysqli_fetch_array($uq);
	$name= explode(" ",$urow['fname']);
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

	
	

<title>Edit Profile</title>
	
</head>

<body>
	<!-- Top Header-Profile -->
<div class="header-spacer"></div>
	<div class="container">
	<div class="row" style="width: 100%">
		
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb" style="width: auto; height: 450px; overflow: hidden;">
						<img src="<?php if(isset($urow['header']) && $urow['header']!=""){echo $urow['header'];} else{echo "img/top-header2.jpg";} ?>" alt="Header">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="02-ProfilePage.html" class="active">Timeline</a>
									</li>
									<li>
										<a href="05-ProfilePage-About.html">About</a>
									</li>
									<li>
										<a href="06-ProfilePage.html">Friends</a>
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="07-ProfilePage-Photos.html">Photos</a>
									</li>
									<li>
										<a href="09-ProfilePage-Videos.html">Videos</a>
									</li>
									
								</ul>
							</div>
						</div>

						<div class="control-block-button">
							

							<div class="btn btn-control bg-primary more" style="
    border-radius: 100%;
    width: 50px;
    height: 50px;
    background-color: hsl(264deg 4% 25%);
">
								<svg class="olymp-settings-icon" style="     padding-top: 0px;     margin-top: 6px; "><use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									
									<li>
										<a href="updatepic.php" >Update Profile & Header Photo</a>
									</li>
									
								</ul>
																		

							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="02-ProfilePage.html" class="author-thumb" >
							<img src="<?php echo $urow['pfp'] ?>" alt="author" style="width: 142px;
    height: 142px;
    border-radius: 100%;
    overflow: hidden;
    ">
						</a>
						<div class="author-content">
							<a href="02-ProfilePage.html" class="h4 author-name"><?php echo $urow['fname'] ?></a>
							<div class="country"><?php echo $urow['branch'] ?>, <?php echo $urow['year'] ?> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<?php
	include("formedit_profile.php");
	include("includejs.php"); ?>
</body>
</html>