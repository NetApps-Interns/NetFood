<div class="menu-item">
    <div class="menu-image">
        <img onerror="this.src = '/assets/res/img/food_placeholder.png'" src="<?= ITEM_IMG_DIR.$item['pix'] ?>" alt="<?= $item['itemName'] ?>"/>
    </div>
    <p><b class="menu-about"> <?= $item['itemName'] ?></b></p>
    <p>by <em class="menu-about"> <?= $item['vendorName'] ?> </em></p>
    <span class="meal-price">&#8358;<?= $item['itemPrice'] ?></span>

    <div class = "menu-btn">
            <?php 
            if(isset($_SESSION['userid'])){
                if ($page == 'favorites'){
                    ?>
                    <div>
                        <a onclick="removeFromFav(<?= $item['id']?>, '<?= $item['itemName'] ?>')" class="btn-fav" ><ion-icon name="heart-dislike-outline"></ion-icon></a>
                    </div>
                    <?php
                }else{
                ?>
                    <div>
                        <a onclick="addToFav(<?= $item['id']?>, '<?= $item['itemName'] ?>')" class="btn-fav" ><ion-icon name="heart-outline"></ion-icon></a>
                    </div>
                <?php
                }
            }
        ?>
                    
        <div>
            <a onclick="addToCart(<?= $item['id']?>)" class="btn-add">
                <ion-icon name="add-outline"></ion-icon>
            </a>
        </div>
    </div>
    
</div>

