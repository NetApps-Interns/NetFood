<?php

include '../CORE/config/config.php';

    if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $statement=$pdo->prepare("SELECT * from item where id = $id");

    $statement->bindValue(':id', $id);
    $statement->execute();
    $item=$statement->fetchAll(PDO::FETCH_ASSOC);
    $user=$item[0] ?? '';

}

?>

<?php include '../components/vendor_header.php';?>

<section class="image-background">
         <h3>EDIT YOUR ITEM</h3>
    <form action="../api/v-a-edit.php" method="post" class="login-request">
          
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

            <button name="update" href="../pages/v-admin.php?id=<?= $user['id'] ?>" value="UPDATE" type="submit">EDIT ITEM</button>
        </div>
    </form>
</section>    
   <?php include '../components/vendor_footer.php';?>