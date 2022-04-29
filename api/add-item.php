<?php
include __DIR__.'/../CORE/config/init.php';
header('content-type: application/json');


if (isset($_POST['item_name'], $_POST['ingredients'], $_POST['price'], $_POST['description'], $_FILES['photo'])) {
  $item_name =    $_POST['item_name'];
  $ingredients =  $_POST['ingredients'];
  $price =        $_POST['price'];
  $description =  $_POST['description'];
  $image =        $_POST['photo'] ?: null;

  // echo ("hello");

  $target_dir = __DIR__ . "/../".ITEM_IMG_DIR;
  $new_file_name= md5(uniqid(time(),true));
  $uploaded_file_name = basename($_FILES["image"]["name"]);
  $target_file = $target_dir . $new_file_name;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    // echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    die(output_json(["Sorry, only JPG, JPEG & PNG files are allowed."], 0));
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    die(output_json(["Sorry, your file was not uploaded."], 0));
    // if everything is ok, try to upload file
  } else {
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
     die(output_json(["Sorry, there was an error uploading your file."], 0));
    }
  }

  $statement = $pdo->prepare("INSERT INTO ".TBL_ITEM." (item_name, ingredients,  price, image, description) 
                                      VALUES(:item_name, :ingredients, :price, :image, :description)");

  $statement->bindValue(':item_name', $item_name);
  $statement->bindValue(':ingredients', $ingredients);
  $statement->bindValue(':description', $description);
  $statement->bindValue(':price', $price);
  $statement->bindValue(':image', $new_file_name);
  if ($statement->execute()){
    die(output_json(["Item added succesfully"], 1));
  }
  
}
die(output_json(["Error in adding item"], 0));
