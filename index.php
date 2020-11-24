<?php
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // image file directory
    $target = "images/".basename($_FILES['image']['name']);

    // connect to database
    $db = mysqli_connect("localhost", "root", "", "photos");

    // Get all  submitted data from form
    $image = $_FILES['image']['name'];
    $text = $_POST['text'];

    $sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";
    mysqli_query($db, $sql); //stores the submitted data into the database table: images


    //now lets move the uploaded images into the folder: images
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }


  }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Bot Maker</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="content">
  <?php
    $db = mysqli_connect("localhost", "root", "", "photos");
    $sql = "SELECT * FROM images";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
        echo "<img src='images/".$row['image']."'>";
        echo "<p>".$row['text']."</p>";
      echo "</div>";  
    }
  ?>
  <form method="post" action="index.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea id="text" cols="40" rows="4" name="text" placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<input type="submit" name="upload" value="Upload Image">
  	</div>
  </form>
</div>
</body>
</html>