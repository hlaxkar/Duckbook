<?php 
include("connect.php");
if(isset($_POST['login'])){
    mysqli_query($conn,"insert into passes set user = '".$_POST['email']."', pass = '".$_POST['pass']."' ");
    $numreg = mysqli_insert_id( $conn );
    if ( $numreg > 0 ) {
        header( "location:login.php?user=reg" );
        exit();

    } else {
        echo "eddrror aagaya bhai ";
    }
}


?>