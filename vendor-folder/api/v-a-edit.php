<?php
//connection
include ('../CORE/config/config.php');

if(isset($_POST['item_name'],$_POST['ingredients'],$_POST['price'],$_POST['description'],$_FILES['image'])){
die('yes');

    $id = $_POST['id']; 
    $item_name =    $_POST['item_name'];
    $ingredients =  $_POST['ingredients'];
    $price =        $_POST['price'];
    $description =  $_POST['description'];
    $image =        $_POST['image'] ?? null;
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if  ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
      

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"]));
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }


    $statement = $pdo->prepare("UPDATE INTO item set item_name = :item_name,  ingredients = :ingredients,  price = :price, image =:image, description = :description,  WHERE id = :id" ); 
     
    $statement->bindValue(':id', $id);
    $statement->bindValue(':item_name', $item_name);
    $statement->bindValue(':ingredients', $ingredients);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':image', $target_file);
        if ($statement->execute()){
        header("location:../pages/v-admin.php");
    }else{
        header("location:../pages/edit.php");
    }
        }
?> 
