
 <?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
     exit;
  }
 include_once('config.php'); 
$sql = " SELECT * FROM  profileinfo   WHERE  usertag = '$_SESSION[username]'  " ;
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($result);
  

  $sql = " SELECT * FROM  profileimg   WHERE  usertag = '$_SESSION[username]'  " ;
  $result = mysqli_query($link,$sql);
  $rowimg = mysqli_fetch_assoc($result);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Style  Hero & NavBar  CSS -->

<link rel="stylesheet" href="css/navbar.css">
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <!-- Title  -->
    <title>Johnny Kru  - Life Coach</title>
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">
<style type="text/css">

   body{ font: 14px sans-serif; }
  .wrapper{ width: 350px; padding: 20px;
  }
  body{
   
    font-family: 'Barlow Condensed', sans-serif;
  }
  h4 {
    color:#00008B;
  }
  .container {
    position: absolute;
    top: 100px;
    box-shadow: 0 0 50px rgba(0,0,0,.3);
    padding: 15px;
    border-radius: 15px 15px;
}

.display{
    position: absolute;
    top: 200px;
    right: 20%;
    width: 450px;
    height: 600px;
    padding: 5px;
    box-shadow: 0 0 50px rgba(0,0,0,.3);
    margin: 0 auto;
    background-color:;
}

 .l_form{
    position: relative;
    top: 200px;
    width: 400px;
    padding: 20px;
    background-color: blue;
 }
 label{
    font-size: 20px;
 }
 input {
  text-align: left;
  font-size: 10px;
 }
.textarea{
    width: 300px;
    height: 50px;
    border-radius: 5px;
    border:0.1px solid black;
    color: black;
    text-align: left;
    word-wrap: break-word;
}
.infoBox{ 
    width: 300px;
    height: 30px;
    border-radius: 10px;
    text-align: left;
    font-size: 18px;
    border: 0.1 solid black;
 }
.infoBox0{
    display: none;
}
.profile_img{
    width: 200px;
    height:200px;
}

</style>
</head>


<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="sonar-load"></div>
        </div>
    </div>

    <!-- Preloader End -->

<?php include 'navbar_mem.php';?>

  <div class="container">

    <h2>Edit your <a href="logout.php">  (TRIBE)</a> profile here.</h2>
      <p>Please fill out the area(s) you wish to change and click submit.</p>
      <p>This site is password encrypted for your protection.</p> 
      <p>*Web owner does not have acsess to your password. Remember to keep your password in a safe place. Thank you</p>
        <div class="display"> 
          <div class="profile_img">
            <?php 
          $sqlimg = " SELECT * FROM  profileimg   WHERE  usertag = '$_SESSION[username]'  " ;
          $resultimg = mysqli_query($link,$sqlimg);
          while ($rowimg = mysqli_fetch_assoc($resultimg)){
            if ($rowimg['status'] == 1 ){ 
                echo "<img src='http://localhost/Kru/Tribe/uploads/".$rowimg['img']." ' width= 200 >";
                } else {
                echo "<img src='http://localhost/Kru/Tribe/uploads/".$rowimg['img']." ' width= 200 >"; 
                echo "<h3 style='color:green;'>".'Your profile image loaded sucsessfuly !!'. "</h3>";          
            }  
            } 
            ?>       
            <h4>Pick an image you want as your profile.</h4>  
            <br>
            <br>
            <form action="uploads.php"  method="POST" enctype="multipart/form-data">
          <input class="infoBox0" type="text"  placeholder="First Name" value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" name="id" required />
          <input class="infoBox0" type="text"  placeholder="First Name" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" name="username" required />
          <input class="infoBox" type="file" placeholder=" Upload Profile image" name="image" required/>
          <input class="infoBox0" type="text" value="1" name="status" required/>
              <br>
              <input type="submit" class="btn btn-primary" value="Submit Photo">
            </form>
            <p>Profile Page  <a href="profilepage.php">Login here</a>.</p>
            <p>Edit Profile   <a href="profilecontrol.php">Login here</a>.</p>
          </div> 
        </div>  



    <form  class="StyleForm" action="profileEditVal.php"  method="POST">
      <div class="form-group">
        <input class="infoBox0" type="text"  placeholder="First Name" value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" name="id" required />
        <input class="infoBox0" type="text"  placeholder="First Name" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" name="userTag" required />
        <h4>First Name</h4>
        <input class="infoBox" type="text"  placeholder value ="<?php echo "  ".$row["firstname"]; ?>" name="firstname" required />
        <h4>Last Name</h4>
        <input class="infoBox"type="text" placeholder value ="<?php echo "  ".$row["lastname"]; ?>"  name="lastname" required/>
        <h4>E- Mail</h4>
        <input class="infoBox"type="text" placeholder value ="<?php echo "  ".$row["email"]; ?>"  name="email" required />
        <h4>Phone Number </h4>
        <input class="infoBox"type="text" placeholder value ="<?php echo "  ".$row["contact"]; ?> "  name="contact" required/>
        <h4>School [Or Status]</h4>
        <input class="infoBox"type="text" placeholder value ="<?php echo "  ".$row["businessname"]; ?>" name="businessname" required/>
        <h4>Account Type</h4>
        <input class="infoBox"type="text" placeholder value ="<?php echo "  ".$row["accounttype"]; ?>"  name="accounttype" required/>
        <h4>City</h4>
        <input class="infoBox"type="text" placeholder  value ="<?php echo "  ".$row["city"]; ?>" name="city" required/>
        <h4>State</h4>
        <input class="infoBox"type="text" placeholder value ="<?php echo "  ".$row["state"]; ?>" name="state" required/>
        <h4>Zip</h4>
        <input class="infoBox"type="text" placeholder value ="<?php echo "  ".$row["zip"]; ?>"  name="zip" required/>
        <h4>Country </h4>
        <input class="infoBox"type="text" placeholder value ="<?php echo "  ".$row["country"]; ?>" name="country" required/>
        <br><br><br>
          <label>"What is you're Specialty?" </label><br>
          <input class="infoBox" type="text" id="Art" name="specialty" value="<?php echo "  ".$row["specialty"]; ?>" required/>
          <div class="form-group">
          <label>Profile comment area.</label><br>
          <input class="textarea" type="text" placeholder value ="<?php echo "  ".$row["textcomment"]; ?>"  name="textcomment" required /></input> 
          <br><br>
          <input type="submit" class="btn btn-primary" value="Submit">
          <input type="reset" class="btn btn-default" value="Reset">
        </div>
      </div>
    </form>
</div>

</body>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
 <script src="js/JqueryAct.js"></script>
 <script src="js/navbar.js"></script>
  <script src="anglControl.js"> </script>
</html>