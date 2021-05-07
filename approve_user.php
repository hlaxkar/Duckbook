<?php

	include("connect.php");

	

    //-------------LOGIN-----------//

    session_start();

    if(!isset($_SESSION['username'])  &&  $_SESSION['uid']=="") //----------LOGOUT if not valid-------

		{

				header("location:login.php");	

				exit();

		}else{

		if($_SESSION['username']!=="admin"){

			header("location:login.php?action=logout");	

				exit();}else{

			

	$userq =	mysqli_query($conn,"select * from user_info where uid = '".$_SESSION['uid']."' ");

		

		

		$user= mysqli_fetch_array($userq);

			include("navbar.php");

    //----------/LOGIN-----------//

    ?>

<!doctype html>

<html>

<head>

<meta charset="utf-8">

	<?php include("includecss.html")?>

	

<title>Approve Users</title>



</head>



<body style="padding-top: 80px; text-align: center;">

<h1>Approve Users</h1>

<hr>

<div class="container">

  <div class="row">

    <?php

			 //----------------------Enable/disable Start------------------------// 

    if ( isset( $_GET[ 'uid' ] ) ) {

        mysqli_query( $conn, "update user_info set status = '1' where uid = '" . $_GET[ 'uid' ] . "'" );



    }



    if ( isset( $_GET[ 'did' ] ) ) {

        mysqli_query( $conn, "delete from user_info where uid = '" . $_GET[ 'did' ] . "'" );



    }

    

    //----------------------Enable/disable END--------------------------//

    $users = mysqli_query( $conn, "select * from user_info where status = '0' order by uid DESC" );

	  $n = mysqli_num_rows($users);

    if($n>0){

		

	

    while ( $row = mysqli_fetch_array( $users ) ) {





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

              <h3><?php echo $row['fname']; ?></h3>

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

          <table width="100%" border="0" style="
    font-size: .8rem;
">

            <tbody align="left">

              <tr>

                <td width="23%" height="35" scope="row"><strong>Branch</strong>:</td>

                <td width="40%"><?php echo $row['branch']; ?></td>

                <th width="21%">Year:</th>

                <td width="16%"><?php echo $row['year']; ?></td>

              </tr>

              <tr>

                <td height="44" ><strong>Roll No.:</strong></td>

                <td><?php echo $row['rollno']; ?></td>

                <th scope="row">SPN No.:</th>

                <td><?php echo $row['spnno']; ?></td>

              </tr>

              <tr>

                <td height="44" ><strong>Mobile:</strong></td>

                <td><?php echo $row['phone']; ?></td>

                <th scope="row">Email:</th>

                <td><?php echo $row['email']; ?></td>

              </tr>

              <tr>

                <td height="44" ><strong>Gender:</strong></td>

                <td><?php echo $row['gender']; ?></td>

                <th scope="row">Status</th>

                <td>Disabled</td>

              </tr>

              <tr>

                <th height="32" > Action: </th>

                <td colspan="3"><div class="row" >

                    <div class="col" style="padding-top: 5px"><a href="approve_user.php?todo=update&uid=<?php echo $row[0] ?>" aria-pressed="true" role="button"  class="btn btn-outline-primary btn-block"> Approve </a></div>

                    <div class="col" style="padding-top: 5px"> <a href="approve_user.php?todo=update&did=<?php echo $row[0] ?>" style="text-decoration: none" role="button" class="btn btn-outline-danger btn-block" aria-pressed="true"> Delete </a> </div>

                  </div></td>

              </tr>

            </tbody>

          </table>

          </p>

        </div>

      </div>

    </div>

    <?php

    }



   

}else {

		?>

	<div class="col ui-block">

		<h3 align="center">No New Users.... Check <a href="allusers.php">ALL USERS</a> ?</h3></div>

	<?php

	}

    ?>

  </div>

</div>

</body>

<?php }}?>

</html>

