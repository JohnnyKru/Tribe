

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

if (isset($_POST)){
  $id = $_POST ['id'];
  $UserName = $_POST ['username'];
  $file = $_FILES['image'];
  $status = $_POST    ['status'];
  $fileName = $_FILES['image']['name'];
  $fileTmpName = $_FILES['image']['tmp_name'];
  $fileSize = $_FILES['image']['size'];
  $fileError = $_FILES['image']['error'];
  $fileType = $_FILES['image']['type'];
  
    $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed =  array('jpg','jpeg', 'png' , 'pdf');
    
    if (in_array($fileActualExt, $allowed)){
      if ($fileError === 0 ){ 
      if ($fileSize < 1000000){ 
        $fileNameNew = "profile".$id. ".".$fileActualExt;
            $fileDestination = 'uploads/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            $sql = " UPDATE profileimg  SET   idNum  ='$_POST[username]', img = '$fileNameNew', status = '$_POST[status]'  WHERE  idNum = '$id' ";
            $result = mysqli_query($link, $sql);
            echo " file should work . Check your folder. ";
            header("Location: profilecontrol.php");
    } else {
             echo "Your file is too big !!";
        }

   } else {
        echo " There was an error uploading your file ! ";
    }
}  else {
    echo " You cannot upload files of this type!";
}

}
    // Close connection
    mysqli_close($link);
?>

