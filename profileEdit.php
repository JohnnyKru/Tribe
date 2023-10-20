
 <?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
  }
  ?>

  
  <?php 
include_once('config.php'); 
echo htmlspecialchars($_SESSION["id"]);
        $sql = " SELECT * FROM  profileinfo   WHERE  usertag = '$_SESSION[username]'  " ;
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_assoc($result);

                  echo htmlspecialchars($_SESSION["id"]);
                          $sqlimg = " SELECT * FROM  profileimg   WHERE  usertag = '$_SESSION[username]'  " ;
                          $resultimg = mysqli_query($link,$sqlimg);
                          $rowimg = mysqli_fetch_assoc($resultimg);

       if(empty($row) || empty($rowimg)){
 $text = " To log in to your profile page, you must complete both the bio  and profile Image.";
}else{
$text1 = " Info was sent.";
header("Location: profilecontrol.php");
}
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
  top: 250px;
  right: 20%;
  width: 450px;
  height: 600px;
padding: 25px;
 box-shadow: 0 0 50px rgba(0,0,0,.3);
 margin: 0 auto;
 background-color:;
}
.infoBox{ 
width: 300px;
height: 30px;
border-radius: 10px;
margin: 0px;
text-align: left;
font-size: 18px;
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
 
textarea{
  width: 300px;
  height: 100px;
  border-radius: 15px;
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
    <?php echo "<h3 style='color:red;'>". $text. "</h3>"; ?>
    <?php echo "<h3 style='color:red;'>". $text1. "</h3>"; ?>
    <h2>Edit your <a href="logout.php">  (TRIBE)</a> profile here.</h2>
      <p>Please fill out the area(s) you wish to change and click submit.</p>
      <p>This site is password encrypted for your protection.</p> 
      <p>*Web owner does not have acsess to your password. Remember to keep your password in a safe place. Thank you</p>
      
      <form  class="StyleForm" action="profileVal.php"  method="POST">
        
         <input class="infoBox" type="text"  placeholder value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" name="id" required />
        <input class="infoBox" type="text"  placeholder value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" name="username" required />
        <h4>First Name</h4>
        <input class="infoBox" type="text"  placeholder value ="" name="firstname" required />
        <h4>Last Name</h4>
        <input class="infoBox"type="text" placeholder value =""  name="lastname" required/>
        <h4>E- Mail</h4>
        <input class="infoBox"type="text" placeholder value =""  name="email" required />
        <h4>Phone Number </h4>
        <input class="infoBox"type="text" placeholder value =""  name="contact" required/>
        <h4>School [Or Status]</h4>
        <input class="infoBox"type="text" placeholder value ="" name="businessname" required/>
        <h4>Account Type</h4>
        <input class="infoBox"type="text" placeholder value =""  name="accounttype" required/>
        <h4>City</h4>
        <input class="infoBox"type="text" placeholder  value ="" name="city" required/>
        <h4>State</h4>
        <input class="infoBox"type="text" placeholder value ="" name="state" required/>
        <h4>Zip</h4>
        <input class="infoBox"type="text" placeholder value =""  name="zip" required/>
        <h4>Country </h4>
        <input class="infoBox"type="text" placeholder value ="" name="country" required/><br>
            <label for="specialty">What is you're Specialty?:</label><br>
              <select class="infoBox" id="Art" name="specialty">
                <option value="Boxing">Boxing</option>
                <option value="Kickboxing">Kickboxing </option>
                <option value="Muay Thai ">Muay Thai </option>
                <option value="Brazilian Jiu-Jitsu">BJJ</option>
                <option value="Military Combat "> Military</option>
                <option value="Mixed Martial Arts ">MMA</option>
              </select>    
          <div class="form-group">
          <label>Your bio area goes here.</label><br>
          <textarea type="text" placeholder value =""  name="textcomment" required /></textarea> <br>
          <input type="submit" class="btn btn-primary" value="Submit">
          <input type="reset" class="btn btn-default" value="Reset">
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
