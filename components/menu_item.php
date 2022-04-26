<div class="menu-item">
    <div class="menu-image">
        <img onerror="this.src = '/assets/res/img/food_placeholder.png'" src="<?= ITEM_IMG_DIR.$item['pix'] ?>" alt="<?= $item['itemName'] ?>"/>
    </div>
    <b class="menu-about"> <?= $item['itemName'] ?></b>
    <p>by <em class="menu-about"> <?= $item['vendorName'] ?> </em></p>
    <span class="meal-price">&#8358;<?= $item['itemPrice'] ?></span>

    <div>
        <?php 
        if(isset($_SESSION['userid'])){
            if ($page == 'favorites'){
                ?>
                <a onclick="removeFromFav(<?= $item['id']?>, '<?= $item['itemName'] ?>')" class="btn-fav" >r<ion-icon name="heart-dislike-outline"></ion-icon></a>
                <?php
            }else{
            ?>
                <a onclick="addToFav(<?= $item['idItem']?>, '<?= $item['itemName'] ?>')" class="btn-fav" >f<ion-icon name="heart-outline"></ion-icon></a>
            <?php
            }
        }
        ?>
        <a onclick="addToCart(<?= $item['idItem']?>)" class="btn-add">a<ion-icon name="add-outline"></ion-icon></a>
    </div>
</div>