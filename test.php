<?php

// Initialize the session
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
 <link rel="stylesheet"   href="css/navbar.css">
<style type="text/css">

.img_wrapper{
  position: relative;
  top: 140px;
  left: 0px;
  width: 60%;
  height: 400px;
  overflow: scroll;
  background-color: black;
   box-shadow: 10px 20px 20px black ; 
}
   #content{
    position: absolute;
    bottom:10px;
    left: 0px;
    width: 60%;
    margin: 10px auto;
    border: 1px solid #cbcbcb;
    background-color: black;
    box-shadow: 10px 20px 20px black ; 
   }

   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_loader{
    position: relative;
    left: 0px;
   	width: 40%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_loader:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
    max-height: 200px;
    max-width: 400px;
   	float: left;
   	margin: 5px;
   	width: 100px;
   	height: auto;
   }
</style>
</head>
<body>
  <?php include 'navbar_mem.php';?>
<div class="img_wrapper">
 <?php
// Initialize the session
session_start();
?>

<?php
require_once "config.php";
 $sql = " SELECT * FROM  images " ;
        $result = mysqli_query($link,$sql);
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_loader'>";
        echo "<img src='http://localhost/Kru/Tribe/img/hoop/".$row['image']. " ' > ";
        echo "<p style='color:white; font-size:16px;'>".$row['image_text']."</p>";
      echo "</div>";
    }

?>
</div>


<div id="content">

<?php 
echo $_SESSION['id'] ;
echo $_SESSION['username'] ;
echo $_SESSION['firstname'] ;
echo $_SESSION['lastname'] ;
echo $_SESSION['email'] ;
echo $_SESSION['contact'] ;
echo $_SESSION['businessName'] ;
echo $_SESSION['accountType'] ;
echo $_SESSION['city'] ; 
echo $_SESSION['state'] ; 
echo $_SESSION['zip'] ;
echo $_SESSION['country'] ; 
echo $_SESSION['specialty'] ; 
echo $_SESSION['textComment'] ;

?>

  <form method="POST" action="photo_upload.php" enctype="multipart/form-data">
  	<input type="file" name="image" value="">
  	<div>
  	  <input type="text" name="image_text">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>