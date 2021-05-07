<?php
session_start();
include( "connect.php" );
if ( isset( $_POST[ 'addpost' ] ) ) {
	
  date_default_timezone_set ("asia/kolkata");
				$date =  date("F d")." at ".date(" h:i a");
  $username = $_SESSION['username'];
        
  if( isset($_FILES[ 'pic' ]['type']) && $_FILES[ 'pic' ]['type']!=="" ){
       
    $directory = "postimages/" . $username . "/";
    if ( !is_dir( $directory ) ) {
      mkdir( $directory );
    }
    
    $filename = basename( $_FILES[ 'pic' ][ 'name' ] );
    $target = $directory . $filename;
    $type = $_FILES[ 'pic' ][ 'type' ];
    $tmpname = $_FILES[ 'pic' ][ 'tmp_name' ];
   move_uploaded_file( $tmpname, $target );
      
      mysqli_query( $conn, "insert into posts set
                                    post        =   '" . $_POST[ 'postcontent' ] . "',
                                    user =      '" . $username . "',
								    path 		=	'" . $target  . "',
									filename = '".$filename."',
									datetime = '".$date."' " )
		  ;
    
    header( "location:index.php" );
       exit();
  } else{
	  if(!empty($_POST['postcontent'])){
    mysqli_query( $conn, "insert into posts set
                                    post =   '" . $_POST[ 'postcontent' ] . "',
                                    user =      '" . $username . "',
									datetime = '".$date."' " );
    header( "location:index.php" );
        exit();
  }
else{
	
	 header( "location:index.php" );
        exit();
}}
}

?>