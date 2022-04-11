<?php

    include('config.php');

    if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $statement=$pdo->prepare("SELECT * from item where id = $id");

    $statement->bindValue(':id', $id);
    $statement->execute();
    $item=$statement->fetchAll(PDO::FETCH_ASSOC);
    $user=$item[0] ?? '';

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eidt</title>

    <!-- <script src="https://cdn.tiny.cloud/1/c0lgoz25m6o9bc31eb8j4z920haqesw1sbg6yhhchf6jnt7m/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({ 
            selector:'#myEditor' 
            });
        </script> -->
    <link rel="stylesheet" href="vendor/css/grid.css" />
    <link rel="stylesheet" href="vendor/css/normalize.css" />
    <link rel="stylesheet" href="res/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&display=swap" rel="stylesheet" />


</head>

<body>
    <header class="row">
        <h2>NETFood</h2>
        <nav>
            <a class="mobile-nav-icon js--nav-icon">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
            <ul class="main-nav">
        
            </ul>
        </nav>
    </header>
    <div id="OpeningParallexImage">
    <h3>EDIT YOUR ITEM</h3>
        <form action="v-a-edit.php" method="post" class="login-request">
            <div class="adds" class="col-1">

            </div>

        <div>
             <input type="hidden" name="id" value="<?= $user['id'] ?>">
            
        </div>
            <div class="">
                <input name="item_name" value="<?php echo $user['item_name'] ?>" placeholder="food title/ name" type="text" class="">
        
            <div class="">
                <input name="ingredients" value="<?php echo $user['ingredients'] ?>" placeholder="enter ingredients used" type="text" class="">

            <div class="">
            <label for="" class=""> update food image </label>
                <input  type="file" value="<?php echo $user['image'] ?>" name="image" class="">
            </div>

            <label for="" class=""> Food Description</label>
            <div class="">
                <textarea id="myEditor" type="text"  name="description"  placeholder="edit Your item description"><?php echo $user['description'] ?></textarea>
                
            </div>

            <div class="">
                <input type="number" class="" name="price" value="<?php echo $user['price'] ?>" placeholder="₦0000.00" id="">
            </div>

            <button name="submit" href="v-admin.php?id=<?= $user['id'] ?>" value="UPDATE" type="submit">EDIT ITEM</button>
    </div>


    </form>

    </div>
    <footer>
        <div class="row">
            <div class="col span-1-of-2">
                <ul class="footer-nav">
                    <li><a href="#">About us</a></li>
                    <li><a href="vendor-registration.html">Become a Vendor</a></li>
                    <li><a href="#">iOS App</a></li>
                    <li><a href="#">Android App</a></li>
                </ul>
            </div>
            <div class="col span-1-of-2">
                <ul class="social-icon">
                    <li>
                        <a href="#">
                            <ion-icon name="logo-youtube" class="icon-small"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="logo-facebook" class="icon-small"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="logo-instagram" class="icon-small"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="logo-twitter" class="icon-small"></ion-icon>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <p>
                Copyright&copy; 2022 by NETFood. All rights reserved.
            </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>