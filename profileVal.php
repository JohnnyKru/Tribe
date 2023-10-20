<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
}
?>

<?php
require_once "config.php";

if(isset($_POST)){
	
$id =        $_POST ['id'];
$UserName =  $_POST ['username'];
$firstName = $_POST ['firstname'];
$lastName =  $_POST  ['lastname'];
$email =     $_POST ['email'];
$contact =   $_POST ['contact'];
$businessName = $_POST['businessname'];
$accountType = $_POST ['accounttype'];
$city =      $_POST     ['city'];
$state =     $_POST     ['state'];
$zip =       $_POST     ['zip'];
$country =   $_POST   ['country'];
$specialty = $_POST  ['specialty'];
$textComment = $_POST['textcomment'];


// Will Insert Data  Used with " ProfileEdit.php  page."

$sql = " INSERT INTO profileinfo (idNum , usertag , firstname , lastname , email ,  contact , businessname , accounttype , city  , state , zip  ,country , specialty  ,  textcomment ) 
VALUES ( '$id' , '$UserName' , '$firstName', '$lastName' , '$email' , '$contact' , '$businessName' , '$accountType' , '$city' , '$state' , '$zip' , '$country' , '$specialty' ,'$textComment' )";
$result = mysqli_query($link,$sql);   
if (($result)==true){
header("Location: profilecontrol.php");
} else {
echo 'No go. Somthing went wrong. ' ;
} 
}
    // Close connection
    mysqli_close($link);



