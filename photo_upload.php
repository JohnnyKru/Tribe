 <?php
 require_once "config.php";


  // Initialize message variable
  $msg = "";

  if (isset($_POST)){
    $image = $_FILES['image']['name'];
    $image_text = mysqli_real_escape_string($link, $_POST['image_text']);
    $target = "img/hoop/".basename($image);
    $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
    mysqli_query($link, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
       header("Location: test.php");
    }else{
      $msg = "Failed to upload image";
    }
  }

  ?>