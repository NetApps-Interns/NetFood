<?php

    $statement = $pdo->prepare('SELECT * FROM item');
    $statement->execute();
    $items=$statement->fetchAll(PDO::FETCH_ASSOC);


?>

<section class="image-background menu-page">
	<div class="search-request">
		<div>
			<ion-icon name="search-outline"></ion-icon>
			<input
				id="searchInput"
				placeholder="What do you want?"
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
				<a class="btn-fav" ><ion-icon name="heart-outline"></ion-icon></a>
				<a onclick="addToCart(<?= $item['iditem']?>)" class="btn-add"><ion-icon name="add-outline"></ion-icon></a>
			</div>
        </div>
    <?php endforeach; ?>
	
</div>

</section>