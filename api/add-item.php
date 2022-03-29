<?php
include __DIR__.'/../CORE/config/init.php';


if (isset($_POST['item_name'], $_POST['ingredients'], $_POST['price'], $_POST['description'], $_FILES['photo'])) {
  $item_name =    $_POST['item_name'];
  $ingredients =  $_POST['ingredients'];
  $price =        $_POST['price'];
  $description =  $_POST['description'];
  $image =        $_POST['photo'] ?: null;

  echo ("hello");

  $target_dir = __DIR__ . "/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"]));
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  $statement = $pdo->prepare("INSERT INTO items (item_name, ingredients,  price, image, description) 
                                      VALUES(:item_name, :ingredients, :price, :image, :description)");

  $statement->bindValue(':item_name', $item_name);
  $statement->bindValue(':ingredients', $ingredients);
  $statement->bindValue(':description', $description);
  $statement->bindValue(':price', $price);
  $statement->bindValue(':image', $target_file);
  $statement->execute();

}
