
 
 <?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
  }
?><?php 
 include_once('config.php'); 
echo htmlspecialchars($_SESSION["id"]);
        $sql = " SELECT * FROM  profileinfo   WHERE  usertag = '$_SESSION[username]'  " ;
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_assoc($result);
 
                  echo htmlspecialchars($_SESSION["id"]);
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
    top:100px;
    width:100%;
    left:0%;
  box-shadow: 0 0 50px rgba(0,0,0,.3);
  margin:  auto 30px;
  overflow: hidden;
  width:90%;
  height:900px;
  padding: 15px;
  border-radius: 15px 15px;
}

.display{
  position: absolute;
  left: 0px;
  width: 450px;
  height: 800px;
padding: 15px;
 box-shadow: 0 0 50px rgba(0,0,0,.3);
 margin: 0px auto;
 background-color:;
}
.infoBox{ 
width: 400px;
height: 40px;
border-radius: 10px;
margin: 0px;
text-align: left;
font-size: 18px;
 }

 label{
  font-size: 20px;
 }
 
textarea{
  width: 200px;
  height: 150px;
  border-radius: 15px;
}
.infoBox0{
display: none;
}
.profile_img{
width: 200px;
height:200px;
left: 0px;
}

</style>
</head> 
<body>
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
                         echo "<img src='http://localhost/Kru/Tribe/uploads/default.jpg' width='200'>";                           
              } else {
              
                            echo "<img src='http://localhost/Kru/uploads/".$rowimg['img']." ' width= 200 >"; 
                            echo "<h3 style='color:green;'>".'Your profile image loaded sucsessfuly !!'. "</h3>";  
            } 
            } 
            echo htmlspecialchars($_SESSION["username"]).'  ';
            echo htmlspecialchars($_SESSION["id"]);
           
  // Close connection
    mysqli_close($link);
            ?>
            <h4>Set up Profile Image.</h4>  
            <p> 1)Click "Browes" button & follow steps below. </p>
            <p>2) Select an image from your computer. <b style="color: red">( No offensive images please)</b>. </p> 
            <p>3) Click "Upload Photo" button on the bottom .</p>
            <p>4)** If you dont see your image, you will need to refresh your browser.</p>
            <br>

        <form action="uploads.php"  method="POST" enctype="multipart/form-data">
          <input class="infoBox0" type="text"  placeholder="First Name" value="<?php echo htmlspecialchars($_SESSION["id"]); ?>" name="id" required />
          <input class="infoBox0" type="text"  placeholder="First Name" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" name="username" required />
          <input class="infoBox" type="file" placeholder=" Upload Profile image" name="image" required/>
          <input class="infoBox0" type="text" value="1" name="status" required/>
              <br>
              <button class="submit" name="submit">Upload Photo</button>
        </form>

          </div> 
        </div>   
      </div>
      </body>
    </html>