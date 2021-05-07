<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Main Styles CSS -->
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/fonts.min.css">
<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">
<title>Result</title>
<?php include("navbar.php"); ?>
</head>
<?php
include( "connect.php" );

if ( isset( $_POST[ 'b1' ] ) ) {
  mysqli_query( $conn, "insert into facultyinfo set 
                                   facultyid    = '" . $_POST[ 'q1' ] . "',
                                   fname        = '" . $_POST[ 'q2' ] . "',
                                   dob          = '" . $_POST[ 'q3' ] . "',
                                   branch       = '" . $_POST[ 'q4' ] . "',
                                   designation  = '" . $_POST[ 'q5' ] . "',
                                   email        = '" . $_POST[ 'q6' ] . "',
                                   phone        = '" . $_POST[ 'q7' ] . "',
                                   experience   = 22 " );
}
?>
<body style="padding-top: 120px; align-content: center">
<center>
  <h1>Add Teaching staff from here</h1>
  <h2>entries from here will be live at main page!</h2>
</center>
<hr>
<div class="container">
  <div class="ui-block col-xl-6 offset-xl-3" style="padding-top:15px; ;">
    <form method="post" action="?">
      <div class="form-group row" style="padding-left:15px ">
        <label for="q1" class="col-form-label"><strong>Faculty ID:</strong> </label>
        <div class="col-sm-5">
          <input type="text" class="form-control form-control-lg" name="q1" id="q1">
        </div>
      </div>
        <div class="form-group row" style="padding-left:15px ">
        <label for="q2" class="col-form-label"><strong>Full Name;</strong> </label>
            
        <div class="col-sm-3">
            <select class="form-control"><option>dfd</option></select></div>
            <div class="col-sm-5">
          <input type="text" class="form-control form-control-lg" name="q2" id="q1">
        </div>
      </div>
        <div class="form-group row" style="padding-left:15px ">
        <label for="q3" class="col-form-label"><strong>Date of Birth:</strong> </label>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="q3" id="q3">
        </div>
      </div>
        <div class="form-group row" style="padding-left:15px ">
        <label for="q4" class="col-form-label"><strong>Department:</strong> </label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="q4" id="q4">
        </div>
      </div>
        <div class="form-group row" style="padding-left:15px ">
        <label for="q5" class="col-form-label"><strong>Designation:</strong> </label>
        <div class="col-sm-5">
          <input type="text" class="form-control form-control-lg" name="q5" id="q5"
                 style="padding: 1rem 1rem;
                        font-size: 1.0rem;"
                 >
        </div>
      </div>
        <div class="form-group row" style="padding-left:15px ">
        <label for="q6" class="col-form-label"><strong>Email:</strong> </label>
        <div class="col-sm-5">
          <input type="text" class="form-control form-control-lg" name="q6" id="q6" style="padding: 1rem 1rem;
                        font-size: 1.0rem;">
            
        </div>
            
                
        <label for="q7" class="col-form-label"><strong>Mobile:</strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control form-control-lg" name="q7" id="q7" >
            </div>
      
        </div>
        <input type="submit" class="btn btn-success btn--half-width" align="right" name="b1">    </form>
      
  </div>
    
</div>
    
</body>
</html>