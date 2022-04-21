<div class="menu-item">
    <div class="menu-image">
        <img onerror="this.src = '/assets/res/img/food_placeholder.png'" src="<?= ITEM_IMG_DIR.$item['photo'] ?>" alt="<?= $item['item_name'] ?>"/>
    </div>
    <b><p class="menu-about"> <?= $item['item_name'] ?> </p></b>
    by <em class="menu-about"> <?= $item['vendor_name'] ?> </em>
    <span class="meal-price"><span>&#8358;</span><?= $item['price'] ?></span>

    <div>
        <?php if ($page == 'favorites'){
            ?>
            <a onclick="removeFromFav(<?= $item['iditem']?>, '<?= $item['item_name'] ?>')" class="btn-fav" >r<ion-icon name="heart-dislike-outline"></ion-icon></a>
            <?php
        }else{
         ?>
            <a onclick="addToFav(<?= $item['iditem']?>, '<?= $item['item_name'] ?>')" class="btn-fav" >f<ion-icon name="heart-outline"></ion-icon></a>
        <?php
        }
        ?>
        <a onclick="addToCart(<?= $item['iditem']?>)" class="btn-add">a<ion-icon name="add-outline"></ion-icon></a>
    </div>
</div>