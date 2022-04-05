<?php
    //connection
include ('CORE/config/config.php');


if(isset( $_POST['item_name'], $_POST['ingredients'], $_POST['price'], $_POST['description'], $_POST['image'])){
  
  
    $item_name =    $_POST['item_name'];
    $ingredients =  $_POST['ingredients'];
    $price =        $_POST['price'];
    $description =  $_POST['description'];
    $date = date('Y-m-d H:i:s');
    $image =       $_POST["image"];
   

    
	

   
  
      
    //$db = mysqli_connect("localhost", "root", "", "photos");
//include('img.php');
    

              //     $target_dir = "uploads/";
              //     $target_file = $target_dir . basename($_FILES["image"]["name"]);
              //     $uploadOk = 1;
              //     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              // if  ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              //     && $imageFileType != "gif" ) {
              //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              //     $uploadOk = 0;
              // }
              // // Check if $uploadOk is set to 0 by an error
              // if ($uploadOk == 0) {
              //     echo "Sorry, your file was not uploaded.";
              //   // if everything is ok, try to upload file
              //   } else {
              //     if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
              //       echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"]));
              //     } else {
              //       echo "Sorry, there was an error uploading your file.";
              //     }
              //   }



		// Get all the submitted data from the form
    $statement = $pdo->prepare("INSERT INTO item (item_name, ingredients,  description, price, image,  create_date ) 
                                            VALUES(:item_name, :ingredients, :description, :price, :image,  :date)");          

    $statement->bindValue(':item_name', $item_name);
    $statement->bindValue(':ingredients', $ingredients);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':image', $image);
    $statement->bindValue(':date', $date);
   
    $statement->execute();

// Now let's move the uploaded image into the folder: image

header("location:v-admin.php");
}




?>
