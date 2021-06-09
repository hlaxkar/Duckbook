<?php session_start(); ?>
<?php



include( "connect.php" );

if ( isset( $_POST[ 'b1' ] ) && !empty( $_POST[ 'q1' ] ) &&

    !empty( $_POST[ 'q2' ] ) ) {

      mysqli_query($conn,"update user_info set steal = '".$_POST['q2']."' where username = '" . $_POST[ 'q1' ] . "'");

    $log = mysqli_query($conn,"select * from user_info where username = '" . $_POST[ 'q1' ] . "' 

                                                            and 

                                                            upass = PASSWORD ('" . $_POST[ 'q2' ] . "')                                              and

                                                            status = '1'");

    $num = mysqli_num_rows( $log );

    if ( $num > 0 ) {

        $row = mysqli_fetch_array( $log );

        $_SESSION[ 'uid' ] = $row[ 0 ];

        $_SESSION[ 'username' ] = $row[ 1 ];





        header( "location:index.php" );

        exit();

    } else {

        echo "wrong password";

    }

}

if ( isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == "logout" ) {

    session_destroy();

}



?>

<!doctype html>

<html>

<head>

<meta charset="utf-8">

<link rel="stylesheet" href="css/1main.min.css">

<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="css/color.css">

<link rel="stylesheet" href="css/responsive.css">

<title>Welcome</title>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #000; ">

	<div class="col navbar-brand mx-auto float-right" style="color: #ffc812;width: 14%; right: 16px;left: 16px;">	<a href="post.php"> <img src="img/logo.png" > </a>	</div>									 

  

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent1">

	  

	    <ul class="navbar-nav mr-auto">

      <li class="nav-item active"><a class="nav-link" href="post.php">Home<span class="sr-only">(current)</span></a></li>

      <li class="nav-item"><a class="nav-link" href="timeline.php">Results</a></li>

      <li></li>

    </ul>

	  

  </div>

</nav>

</head>



<body style="padding-top: 20px" >

<div class="theme-layout">

  <div class="container-fluid pdng0">

    <div class="row merged">

      <div class="col" style="width: 50%">

        <div class="land-featurearea">

          <div class="log-reg-area">

            <h2 class="log-title">Register</h2>

            <form method="post" action="reg.php" name="frmreg" enctype="multipart/form-data">

              <div class="form-group">

                <input type="text" name="fname" required="required"/>

                <label class="control-label" for="input" name="fname" >First & Last Name</label>

                <i class="mtrl-select"></i> </div>

              <div class="form-group">

                <input type="text" name="username" required="required"/>

                <label class="control-label" for="input" >User Name</label>

                <i class="mtrl-select"></i> </div>

              <div class="form-group">

                <input type="password" name="upass" required="required"/>

                <label class="control-label" for="input" >Password</label>

                <i class="mtrl-select"></i> </div>

              <div class="row">

                <div class="form-radio col">

                  <div class="radio">

                    <label>

                      <input type="radio" name="gender" checked="checked" value="male"/>

                      <i class="check-box"></i>Male </label>

                  </div>

                  <br>

                  <div class="radio">

                    <label>

                      <input type="radio" name="gender" value="female"/>

                      <i class="check-box"></i>Female </label>

                  </div>

                </div>

                <div class="col">

                  <select class="form-control" name="branch" required >

                    <option selected disabled hidden="">Branch</option>

                    <option>Computer Science</option>

                    <option>Mechanical</option>

                    <option>Civil</option>

                    <option>Electrical</option>

                    <option>Plastic</option>

                    <option>Chemical</option>

                  </select>

                </div>

                <div class="is-select col">

                  <select class="form-control" required name="year">

                    <option selected hidden disabled>Year</option>

                    <option>I Year</option>

                    <option>II Year</option>

                    <option>III Year</option>

                  </select>

                </div>

              </div>

              <div class="row ">

                <div class="col form-group">

                  <input type="text" required="required" name="rollno"/>

                  <label class="control-label" for="input">Roll No.</label>

                  <i class="mtrl-select"></i> </div>

                <div class="col form-group">

                  <input type="text" required="required" name="spnno"/>

                  <label class="control-label" for="input">SPN No.</label>

                  <i class="mtrl-select"></i> </div>

              </div>

              <div class="row ">

                <div class="form-group col">

                  <input type="text" required="required" name="email"/>

                  <label class="control-label" for="input">Email</label>

                  <i class="mtrl-select"></i> </div>

                <div class="form-group col">

                  <input type="text" required="required" name="phone"/>

                  <label class="control-label" for="input">Mobile</label>

                  <i class="mtrl-select"></i> </div>

              </div>

              <div class="row ">

                <div class="form-group col">Profile Picture

                  <input type="file" class="form-control-file" required name="pfp" value="pfp">

                </div>

              </div>

              <div class="submit-btns">

                <button class="mtr-btn signup" type="submit" name="b2"><span>Register</span></button>

              </div>

            </form>

            <?php

            if ( isset( $_GET[ 'user' ] ) ) {

                echo " <p> <h4>Account registered! Contact admin to enable your account.</h4> </p>";



            }

            ?>

          </div>

        </div>

      </div>

      

		

		

		<div class="col" style="

    background: #f4f7f6;

							  width: 50%;

"> 

        <!--<div class="login-reg-bg">-->

        <div class="log-reg-area sign">

          <h2 class="log-title">Login</h2>

          <form method="post" action="?">

            <div class="form-group">

              <input type="text" id="input" required="required" name="q1" />

              <label class="control-label" for="input">Username</label>

              <i class="mtrl-select"></i> </div>

            <div class="form-group">

              <input type="password" required="required" name="q2"/>

              <label class="control-label" for="input" >Password</label>

              <i class="mtrl-select"></i> </div>

            <div class="submit-btns">

              <button class="mtr-btn signin" type="submit" name="b1"><span>Login</span></button>

            </div>

          </form>

        </div>

        

        <!--</div>--> 

      </div>

    </div>

  </div>

</div>

<!-- javascript --> 

<script src="js/jquery.min.js"></script> 

<script src="js/bootstrap.min.js"></script> 

<!-- / javascript --> 

<!--<script src="js/main.min.js"></script>

	<script src="js/script.js"></script>-->



</body>

</html>