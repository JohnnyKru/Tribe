<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:login.php");
  
   } 
?>

<?php
// Include config file
require_once "config.php";
if(isset($_POST)){
$id = $_SESSION ['id'];
$UserName = $_POST ['userTag'];
$firstName = $_POST ['firstname'];
$lastName = $_POST  ['lastname'];
$email = $_POST     ['email'];
$contact = $_POST   ['contact'];
$businessName = $_POST['businessname'];
$accountType = $_POST ['accounttype'];
$city = $_POST        ['city'];
$state = $_POST       ['state'];
$zip = $_POST         ['zip'];
$country = $_POST     ['country'];
$specialty = $_POST   ['specialty'];
$textComment = $_POST ['textcomment'];

// Updates  Data and will over write old Data . 

$sql = " UPDATE profileinfo  SET  idNum ='$_SESSION[id]',  firstname ='$_POST[firstname]', lastname = '$_POST[lastname]', email = '$_POST[email]' , contact = '$_POST[contact]' , businessname = '$_POST[businessname]' , accounttype = '$_POST[accounttype]' , city = '$_POST[city]' , state = '$_POST[state]' , zip = '$_POST[zip]' , country = '$_POST[country]' , specialty = '$_POST[specialty]' , textcomment = '$_POST[textcomment]' WHERE  idNum = '$id' ";
   
    $result = mysqli_query($link,$sql);
if (($result)==true){
	echo 'sucsess' ;
	header("location: profilecontrol.php");
} else {
echo 'No go' ;
	header("location: logout.php");
}
}
  // Close connection
    mysqli_close($link);
?>

      




