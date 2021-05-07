<!doctype html>

<html> <head>
<meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap.css">
<title>User List</title>
    
    <!-------------------Navbar Start--------------------->
    <div id="cssmenu" >
<ul>
   <li><a href='Enter_news.php'>    <strong>Home</strong></a></li>
   <li><a href='inbox.php'>         <strong>E-board</strong></a></li>
   <li><a href='News_fetch.php'>    <strong>News Fetch</strong></a></li>
   <li class='active'><a href='User_fetch.php'><strong>User List</strong></a></li>
    <!--==========LOGOUT BUTTON======-->
 <div style="float:right;" >
    <a href="login.php?action=logout" role="button" class="btn btn-warning">
        Sign Out  
    </a> 
</div>
    <!--==========/LOGOUT BUTTON======-->
</ul>
</div>
    <!-----------<======Navbar END=====>-------------->
    
</head>
<?php 
    include("connect.php");
     //-------------==========LOGIN========-----------
    session_start();
    if(!isset($_SESSION['sname'])  &&  $_SESSION['uid']=="") //----------LOGOUT if not valid-------
		{
				header("location:login.php");	
				exit();
		}else{
            if(isset($_REQUEST['id']))
               {
                   mysqli_query($conn, "delete from user_info where uid = '".$_GET['id']."' ");
                   echo "User has been Deleted !";
               }
    $q = mysqli_query($conn, "select * from user_info order by uid");
    $n = mysqli_num_rows($q);
    
    
    ?>
<body style="font-family: Raleway, sans-serif">
    <table width="100%" border="0" class="table table-light table-striped table-hover">
  <tbody>
    <tr>
      <th width="23%" scope="col">Full Name  </th>
      <th width="14%" scope="col">Username   </th>
      <th width="30%" scope="col">Email      </th>
      <th width="15%" scope="col">Status     </th>
      <th width="18%" scope="col">Delete User</th>
    </tr>
      <?php 
      
    
      
    if($n>0)
    {
        while($row = mysqli_fetch_array($q))
        {
            

?>
    <tr>
      <td><?php echo $row[1]?></td>
      <td><?php echo $row[2]?></td>
      <td><?php echo $row[4]?></td>
         <!----------------STATUS BUTTONS---------->
        <td align="center"><p>
                          
          <a href="User_fetch.php?todo=update&uid=<?php echo $row[0] ?>" style="text-decoration: none" role="button" class="btn btn-outline-primary">
              Enable   
          </a>     
          
          <a href="User_fetch.php?todo=update&did=<?php echo $row[0] ?>" style="text-decoration: none" role="button" class="btn btn-outline-danger" aria-pressed="true">
              Disable
          </a>
       
          
      </p></td>
        <!----------------/STATUS BUTTONS---------->
        <td align="center"><a href="User_fetch.php?action=delete&id=<?php echo $row[0]?>" role="button" class="btn btn-danger">Delete</a> </td>
    </tr>
      <?php 
        }  
               //----------------------Enable/disable Start-----------------------// 
              if(isset($_GET['uid']))
          {
             mysqli_query($conn, "update user_info set status = '1' where uid = '".$_GET['uid']."'");
                    
          }
          
          if(isset($_GET['did']))
          {
             mysqli_query($conn, "update user_info set status = '0' where uid = '".$_GET['did']."'");
              echo ("hello");
          } 
             //----------------------Enable/disable END--------------------------//
    }else{
      ?>
    <tr>
      <td colspan="5" bgcolor="#B04B4D" align="center" style="font-size: 25px"><B>No Users Found!</B></td>
    </tr><?php }}
?>  </tbody>
</table>

</body>
</html>