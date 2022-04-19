<?php
    // if (!isset($_SESSION[""])) {
    //     echo "Sign in to see favorites";
    //     // output_json()
    //     exit;
    // }
    
    $userID=$_SESSION["userid"];
    // echo $userID;
    $statement = $pdo->prepare('SELECT i.iditem, i.item_name, i.description, i.price, i.photo FROM favorites f JOIN item i ON f.item_id= i.iditem where f.idcustomer="$userID"');
    $statement->execute();
    $items=$statement->fetchAll(PDO::FETCH_ASSOC);



?>

<section class="image-background">
	<div class="search-request">
		<div>
			<ion-icon name="search-outline"></ion-icon>
			<input
				placeholder="Search favorites"
				name="meal-request"
				class="input"
			/>
		</div>
	</div>

<div class="center-con">
	
	<?php foreach  ($items as $item): ?>
        <div class="menu-item">
            <div class="menu-image">
				<img onerror="this.src = '/assets/res/img/food_placeholder.png'" src="<?= ITEM_IMG_DIR.$item['photo'] ?>" alt="<?= $item['item_name'] ?>"/>
            </div>
			<b><p class="menu-about"> <?= $item['item_name'] ?> </p></b>
            <p class="menu-about"> <?= $item['description'] ?> </p>
            <span class="meal-price"><span>&#8358;</span><?= $item['price'] ?></span>

			<div>
				<a onclick="addToFav(<?= $item['iditem']?>, '<?= $item['item_name'] ?>')" class="btn-fav" >f<ion-icon name="heart-outline"></ion-icon></a>
				<a onclick="addToCart(<?= $item['iditem']?>)" class="btn-add">a<ion-icon name="add-outline"></ion-icon></a>
			</div>
        </div>
    <?php endforeach; ?>

</div>
</section>