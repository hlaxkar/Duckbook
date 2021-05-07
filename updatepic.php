<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
session_start();
include( "connect.php" );
include( "includecss.html" );
if(isset($_REQUEST['b1'])){
	

if ( isset( $_FILES[ 'pfp' ][ 'type' ] ) && $_FILES[ 'pfp' ][ 'type' ] !== "" ) {
    $username = $_SESSION[ 'username' ];
    $directory = "userimages/" . $username . "/";
    if ( !is_dir( $directory ) ) {
        mkdir( $directory );
    }

    $filename = basename( $_FILES[ 'pfp' ][ 'name' ] );
    $target = $directory . $filename;
    $type = $_FILES[ 'pfp' ][ 'type' ];
    $tmpname = $_FILES[ 'pfp' ][ 'tmp_name' ];
    move_uploaded_file( $tmpname, $target );
	
	mysqli_query( $conn, "update user_info set pfp = '" . $target  . "' where username = '".$username."'");
}
	if ( isset( $_FILES[ 'headpic' ][ 'type' ] ) && $_FILES[ 'headpic' ][ 'type' ] !== "" ) {
    $username = $_SESSION[ 'username' ];
    $directory = "userimages/" . $username . "/";
    if ( !is_dir( $directory ) ) {
        mkdir( $directory );
    }

    $filename = basename( $_FILES[ 'headpic' ][ 'name' ] );
    $headtarget = $directory . $filename;
    $type = $_FILES[ 'headpic' ][ 'type' ];
    $tmpname = $_FILES[ 'headpic' ][ 'tmp_name' ];
    move_uploaded_file( $tmpname, $headtarget );
	
	mysqli_query( $conn, "update user_info set header = '" . $headtarget  . "' where username = '".$username."' ");
}

	header("location:timeline.php");
	exit();
	
}
    ?>

<body style="align-items: center">
	<div class="container">
		<div class="row">
			<div class="ui-block">
				<div class="ui-block-content">
	<form class="form-group" method="post" action="?" enctype="multipart/form-data">
<h5>Update profile picture:</h5>
<input type="file" name="pfp" class="form-control-file">
<h5>Update header picture:</h5>
<input type="file" name="headpic" class="form-control-file">
		<input type="submit" name="b1" class="btn btn-primary">
	</form>
				</div></div></div></div>
</body>
</html>