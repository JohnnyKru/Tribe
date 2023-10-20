
 <?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
  }

include_once('config.php'); 
echo htmlspecialchars($_SESSION["id"]);
        $sql = " SELECT * FROM  profileinfo   WHERE  usertag = '$_SESSION[username]'  " ;
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_assoc($result);
        if ($row == 0 ){
           header("Location: newprofile.php");
}


        $sql = " SELECT * FROM  profileimg WHERE  usertag = '$_SESSION[username]'";
        $resultimg = mysqli_query($link,$sql);
        $rowimg = mysqli_fetch_assoc($resultimg);
        if ($rowimg == 0 ){ 
          header("Location: newprofile.php");
    }else{ header("Location: profileEdit.php");}
   
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
    left: 0px;
    height: 700px;
    width: 100%;
    top: 100px;
    margin: 10 auto;
    box-shadow: 0 0 50px rgba(0,0,0,.3);
    padding: 15px;
    border-radius: 15px 15px;
}

.display{
   position: absolute;
   left: 20px;
   width: 650px;
   height: 600px;
   padding: 25px;
   box-shadow: 0 0 50px rgba(0,0,0,.3);
   margin: 0 auto;
   background-color:;
}
.infoBox0{
   display: none;
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
  <?php  
  $id = $_SESSION ['id'];
  $UserName = $_SESSION ['username'];
  $file =    "default.jpg";
  $status =   1 ;

$sqlimg = "INSERT INTO profileimg ( idNum , usertag , img  , status ) 
VALUES ('$id', '$UserName' , '$file' , '$status');";
$resultimg = mysqli_query($link, $sqlimg);


  $id = $_SESSION ['id'];
  $UserName = $_SESSION ['username'];
$firstName = $_POST ['firstname']."First";
$lastName =  $_POST  ['lastname']."last";
$email =     $_POST ['email']."email";
$contact =   $_POST ['contact']."111-111-111";
$businessName = $_POST['businessname']."Biz";
$accountType = $_POST ['accounttype']."Type";
$city =      $_POST     ['city']."City";
$state =     $_POST     ['state']."State";
$zip =       $_POST     ['zip']."00000";
$country =   $_POST   ['country']."USA";
$specialty = $_POST  ['specialty']."MMA";
$textComment = $_POST['textcomment']."Say something";


// Will Insert Data  Used with " ProfileEdit.php  page."

$sql = " INSERT INTO profileinfo (idNum , usertag , firstname , lastname , email ,  contact , businessname , accounttype , city  , state , zip  ,country , specialty  ,  textcomment ) 
VALUES ( '$id' , '$UserName' , '$firstName', '$lastName' , '$email' , '$contact' , '$businessName' , '$accountType' , '$city' , '$state' , '$zip' , '$country' , '$specialty' ,'$textComment' )";
$result = mysqli_query($link,$sql);   
if (($result)==true){
header("Location: profilecontrol.php");
} else {
echo 'No go. Somthing went wrong. ' ;
}



?>
  <div class="container">
    <div class="display">
     
    <?php echo "<a href='profileEdit.php'>"."<h3 style='color:;'>". $text. "</h3>"."</a>"; ?>

    <?php echo "<h3 style='color:;'>". $text1. "</h3>"."</a>"; ?>
     <br>
    <h4> <?php echo "Welcome" ." ". htmlspecialchars($_SESSION["username"]).'  ';?></h4>  
    <br>
    <form>
        <input class="infoBox0" type="text"  placeholder="id" value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" name="id" required />
        <input class="infoBox0" type="text"  placeholder="Username" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" name="username" required />
        <h4>First Name</h4>
        <input class="infoBox" type="text"  placeholder value ="firstname" name="firstname" required />
        <h4>Last Name</h4>
        <input class="infoBox"type="text" placeholder value ="lastname"  name="lastname" required/>
        <h4>E- Mail</h4>
        <input class="infoBox"type="text" placeholder value ="email@.com"  name="email" required />
        <h4>Phone Number </h4>
        <input class="infoBox"type="text" placeholder value ="123-456-7890"  name="contact" required/>
        <h4>School [Or Status]</h4>
        <input class="infoBox"type="text" placeholder value ="businessname" name="businessname" required/>
        <h4>Account Type</h4>
        <input class="infoBox"type="text" placeholder value ="accounttype"  name="accounttype" required/>
        <h4>City</h4>
        <input class="infoBox"type="text" placeholder  value ="city" name="city" required/>
        <h4>State</h4>
        <input class="infoBox"type="text" placeholder value ="st" name="state" required/>
        <h4>Zip</h4>
        <input class="infoBox"type="text" placeholder value ="123"  name="zip" required/>
        <h4>Country </h4>
        <input class="infoBox"type="text" placeholder value ="country" name="" required/><br>
            <label for="specialty">What is you're Specialty?:</label><br>
              <select class="infoBox" value ="Muay Thai" id="Art" name="specialty">
                <option value="Boxing">Boxing</option>
                <option value="Kickboxing">Kickboxing </option>
                <option value="Muay Thai ">Muay Thai </option>
                <option value="Brazilian Jiu-Jitsu">BJJ</option>
                <option value="Military Combat "> Military</option>
                <option value="Mixed Martial Arts ">MMA</option>
              </select>    
          <div class="form-group">
          <label>Your bio area goes here.</label><br>
          <textarea type="text" placeholder value ="Say Something about yourself."  name="textcomment" required /></textarea> <br>
          <input type="submit" class="btn btn-primary" value="Submit">
         </form>
  </div> 
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
