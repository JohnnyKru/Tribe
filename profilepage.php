
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

        if($row == 0 ){
   header("Location: newprofile.php");
  }
          $sqlimg = " SELECT * FROM  profileimg   WHERE  usertag = '$_SESSION[username]'  " ;
          $resultimg = mysqli_query($link,$sqlimg);
          while ($rowimg = mysqli_fetch_assoc($resultimg)){
                if($row == 0 ){
   header("Location: newprofile.php");
  }
            if ($rowimg['status'] == 1 )
            { 
              $img = "<img src='http://localhost/Kru/Tribe/uploads/".$rowimg['img']." ' class='uh-image-inner '  >";  
            }
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
    <link rel="stylesheet" href="css/videolightbox.css">
<link rel="stylesheet" href="css/profile.css">
<link rel="stylesheet" href="css/navbar.css">
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <!-- Title  -->
    <title>Johnny Kru  - Life Coach</title>
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

<style type="text/css">


     #img_div{
      width: 200px;
      height: 180px;
      margin: 15px auto;
      border: 1px solid #cbcbcb;
      background-size: cover;
      background-repeat: no-repeat;
      background-color:transparent;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 200px;
    height:auto;
   }

#img_dis{
    width: 20%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
   }
#img_dis:after{
    content: "";
    display: block;
    clear: both;
   }
.video_demo{
  position: absolute;
  top: 50%;
  width: 100%;
  height: 300px;
}

</style>   
</head>

<body>
 <?php include 'navbar_mem.php';?>

<div class="container">

<div class="user-header-wrapper">
<div class="user-header-inner">
  <div class="uh-left">
    <div class="uh-image">
       <?php  echo $img ;?> 
      <div class="gradient1"></div>
    </div>
  </div>
  <div class="uh-right">
    <div class="user-info">
      <h3>
        <?php echo "  ".$row["usertag"]; ?>
        <svg class="uname-verified" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1350.03 1326.16">
                            <defs><style>.cls-11{fill:var(--blue);}.cls-12{fill:#ffffff;}</style></defs><title>verified</title>
                            <g id="Layer_3" data-name="Layer 3">
                                <polygon class="cls-11" points="0 747.37 120.83 569.85 70.11 355.04 283.43 292.38 307.3 107.41 554.93 107.41 693.66 0 862.23 120.83 1072.57 126.8 1112.84 319.23 1293.35 399.79 1256.05 614.6 1350.03 793.61 1197.87 941.29 1202.35 1147.15 969.64 1178.48 868.2 1326.16 675.02 1235.17 493.77 1315.72 354.99 1133.73 165.58 1123.29 152.16 878.64 0 747.37"/></g>
                            <g id="Layer_2" data-name="Layer 2">
                                <path class="cls-12" d="M755.33,979.23s125.85,78.43,165.06,114c34.93-36,234.37-277.22,308.24-331.94,54.71,21.89,85,73.4,93,80.25-3.64,21.89-321.91,418.58-368.42,445.94-32.74-3.84-259-195.16-275.4-217C689.67,1049.45,725.24,1003.85,755.33,979.23Z" transform="translate(-322.83 -335.95)"/></g>
                        </svg>
      </h3>
   <a href="profilecontrol.php"><button class="btn">Edit Profile</button></a>
    </div>
    <div class=user-links>
      <a><span>2.1k</span> Posts</a>
      <a><span>421k</span> Followers</a>
      <a>Following <span>388</span></a>
    </div>
    <div class="user-bio">
    Name:  <p class="user-bio-name"><?php echo "  ".$row["firstname"]; ?><?php echo "  ".$row["lastname"]; ?></p>
    State:  <p><?php echo "  ".$row["state"]; ?></p>
    Specialty:<p><?php echo "  ".$row["specialty"]; ?></p>
    School / Business:  <p><?php echo "  ".$row["businessname"]; ?></p>
     Account Type: <h4><?php echo "  ".$row["accounttype"]; ?></h4>
    About me: <p><?php echo $row["textcomment"]; ?></p>
    </div>
  </div>
</div>
</div>  
<div  class='video_demo'>
    <div   style="width: 100%; height: 300px; background-color: white; position: absolute; top: 500px; left:0px; overflow: scroll;">
      <a href="https://youtu.be/1liPVcjqEOQ" class="mediabox"><img style="width: 250px; height: auto;"  src="http://localhost/Kru/Tribe/img/MuayThaidemo.jpg"></a>
      <a href="https://vimeo.com/71495477" class="mediabox"><img  style="width: 250px; height: auto; " src="https://i.vimeocdn.com/video/445086363_640.jpg"></a>
 <a href="Kru/Tribe/vid/VID_341860417_210513_130.mp4" controls class="mediabox"><img  style="width: 250px; height: auto;" src="https://i.vimeocdn.com/video/445086363_640.jpg"></a>

  Your browser does not support the video tag.
  </video>
    </div>
</div>

<section>
<div class="user-stories">
   <div class='user-stories-inner'>
     <?php
        $sql = " SELECT * FROM  images " ;
        $result = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($result)) 
         {   
          echo "<div class='story-wrapper'>";
            echo"<div class='story-inner'>";
            echo "<img src='http://localhost/Kru/Tribe/img/hoop/". $row['image']." 'id='img_div' >"; 
            echo "</div>";
           echo "</div>";

         }
      ?>
</div>
</div>
</section>
</div>

</body> 

 <script src="js/videolightbox.js"></script>
</html>
