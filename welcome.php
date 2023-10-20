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
   echo "<h4 style='color:red'>" ."Your profile has not been set up yet.." ."</h4>";}


        $sql = " SELECT * FROM  profileimg WHERE  usertag = '$_SESSION[username]'";
        $resultimg = mysqli_query($link,$sql);
        $rowimg = mysqli_fetch_assoc($resultimg);
        if ($rowimg == 0 ){ 
     echo "<h4 style='color:red'>"."    "."Your avatar has not been set up yet.." ."</h4>";}
    

?>

<style type="text/css">

  h2{
    color: blue;
  }
  .inner_container{
    position: absolute;
    top: 100px;
    left: 0px;
    width: 100%;
    height: 600px;
    background-image: url('http://localhost/Kru/Tribe/img/RamMuay.jpg');
    overflow: scroll;
  }
.welcome_menu{
  height: 50px;
  width: 100%;
  color: white;
position: absolute fixed;
top: 100px;

}
  .display_wrapper{
    width: 100%;
    background-color: grey;
    text-align: left;
   box-shadow: 10px 20px 30px white;

  }
  .display_news{
     width: 100%;
    height: auto;
    background-color: black;
    text-align: left;
    padding:50px;
    margin: 0 auto;
  }
  .spacer{
    width: 100%;
    height: 400px;

  }
</style>
<?php include 'header.php'; ?>
<?php include 'navbar_mem.php'; ?>
<!--<img src="http://localhost/Kru/img/Darklion.jpg" alt="" class="header-image" />-->

<div class="container">
  <div class="inner_container">
    <div class="welcome_menu"> <li><a href='#News'>News</a></li> <li>News</li><li>News</li></div>
   

<section>
  <div class="display_wrapper">
    <div class="display_news">
        <h1 style="text-align: center;" id="#News"> NEWS </h1> 
        <br>
        <h4> Point Kickboxing event in Durham. </h4>
        <p>12/5/2020</p> 
        <img src="http://localhost/Kru/Tribe/img/DarklionLeft.jpg" width="200">
        <p> Fighters from all over the triangle came out and put their skills to the test. </p>
          <p>No knockout. Just a way students can get the experiance to what it feels like to be in an accual compation. </p>
        <br> 
        <br>
      </div>
          <div class="display_news">
        <h4> Work Out Meet Up </h4>
        <p> Fighters from all over the triangle came out and put their skills to the test. </p>
          <p>No knockout. Just a way students can get the experiance to what it feels like to be in an accual compation. </p>
        <br> 
        <br>
      </div>
          <div class="display_news">
        <h4> Local Business </h4>
        <p> Fighters from all over the triangle came out and put their skills to the test. </p>
          <p>No knockout. Just a way students can get the experiance to what it feels like to be in an accual compation. </p>
        <br> 
        <br>
      </div>
    </div>
</section>
<div class="spacer"></div>
 
 <section>
  <div class="display_wrapper">
    <div class="display_news"> <h1 style="text-align: center;" id="#News"> Members  </h1> 
        <h4> Point Kickboxing event in Durham. </h4>
        <p> Fighters from all over the triangle came out and put their skills to the test. </p>
          <p>No knockout. Just a way students can get the experiance to what it feels like to be in an accual compation. </p>
        <br> 
        <br>
      </div>
    </div>
</section>
<div class="spacer"></div>




</div>
</div>


