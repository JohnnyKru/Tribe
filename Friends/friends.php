
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tribe Fight Community</title>
 <link rel="stylesheet"   href="css/profile.css">
<link rel="stylesheet"   href="css/navbar.css">
</head>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
body{
font-family: 'Montserrat', sans-serif;
}
h3{
	font-size: 20px;
}
	.members_area{
		position: absolute;
		top: 200px;
		left: 0px;
		width: 100%;
		height: 600px;
		padding: 20px;
	}
.member_window{
	position: relative;
 width: 100%;
  height: 800px;
  object-fit: cover;
	border: 1px solid blue;
}
</style>

<body>
<?php include 'navbar_mem.php';?>
  <div  class="members_area">
    <div class="member_window">
  <?php
 include_once('config.php'); 
	 $sql = (" SELECT * FROM profileimg ");
	 $result = mysqli_query($link,$sql);
	     while ($row = mysqli_fetch_array($result)){
	     
 	?>
 	    <div>
 	  	   	  	  	  	
  <?php	
	 	  	 if ($row["usertag"] !== $_SESSION['username']){
	             echo "<img src='http://localhost/Kru/Tribe/uploads/".$row['img']." ' class='uh-image-inner '>"."<br>";
	 	  	  	 echo $row["usertag"]."  "."is a member.";
	 	  	     }else{
	 	  	 	
	 	  	 }
	 	  	}
	   ?>

	           </div>
          
  
</div>
</div>

</body>
</html>