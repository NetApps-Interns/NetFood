<?php

    $statement = $pdo->prepare('SELECT * FROM item');
    $statement->execute();
    $items=$statement->fetchAll(PDO::FETCH_ASSOC);


?>

<section class="image-background">
	<div class="search-request">
		<div>
			<ion-icon name="search-outline"></ion-icon>
			<input
				placeholder="What do you want?"
				name="meal-request"
				class="input"
			/>
		</div>
	</div>


	<?php foreach  ($items as $item): ?>
        <div class="menu-item">
            <div class="menu-image">
                <img src="<?php echo $item['photo'] ?>" alt="food image"/>
            </div> <br />

            <p class="menu-about"> <?php echo $item['description'] ?> </p>
            <span class="meal-price"><span>&#8358;</span><?php echo $item['price'] ?></span>

			<div>
				<span class="btn-fav"><ion-icon name="heart-outline"></ion-icon></span>
				<span class="btn-add"><ion-icon name="add-outline"></ion-icon></span>
			</div>
        </div>
    <?php endforeach; ?>

	<div class="menu-item">
		<div class="menu-image">
			<img
				src="res/img/brownies.jpg"
				alt="food image"
			/>
		</div>
		<br />
		<p class="menu-about">Delicious, might get you high</p>
		<span class="meal-price">#1300</span>
		<div>
			<span class="btn-fav"><ion-icon name="heart-outline"></ion-icon></span>
			<span class="btn-add"><ion-icon name="add-outline"></ion-icon></span>
		</div>
	</div>
	<div class="menu-item">
		<div class="menu-image">
			<img
				src="res/img/brownies.jpg"
				alt="food image"
			/>
		</div>
		<br />
		<p class="menu-about">Delicious, might get you high</p>
		<span class="meal-price">#1300</span>
		<div>
			<span class="btn-fav"><ion-icon name="heart-outline"></ion-icon></span>
			<span class="btn-add"><ion-icon name="add-outline"></ion-icon></span>
		</div>
	</div>
	<div class="menu-item">
		<div class="menu-image">
			<img
				src="res/img/brownies.jpg"
				alt="food image"
			/>
		</div>
		<br />
		<p class="menu-about">Delicious, might get you high</p>
		<span class="meal-price">#1300</span>
		<div>
			<span class="btn-fav"><ion-icon name="heart-outline"></ion-icon></span>
			<span class="btn-add"><ion-icon name="add-outline"></ion-icon></span>
		</div>
	</div>
	<div class="menu-item">
		<div class="menu-image">
			<img
				src="res/img/brownies.jpg"
				alt="food image"
			/>
		</div>
		<br />
		<p class="menu-about">Delicious, might get you high</p>
		<span class="meal-price">#1300</span>
		<div>
			<span class="btn-fav"><ion-icon name="heart-outline"></ion-icon></span>
			<span class="btn-add"><ion-icon name="add-outline"></ion-icon></span>
		</div>
	</div>
	<div class="menu-item">
		<div class="menu-image">
			<img
				src="res/img/brownies.jpg"
				alt="food image"
			/>
		</div>
		<br />
		<p class="menu-about">Delicious, might get you high</p>
		<span class="meal-price">#1300</span>
		<div>
			<span class="btn-fav"><ion-icon name="heart-outline"></ion-icon></span>
			<span class="btn-add"><ion-icon name="add-outline"></ion-icon></span>
		</div>
	</div>
	<div class="menu-item">
		<div class="menu-image">
			<img
				src="res/img/brownies.jpg"
				alt="food image"
			/>
		</div>
		<br />
		<p class="menu-about">Delicious, might get you high</p>
		<span class="meal-price">#1300</span>
		<div>
			<span class="btn-fav"><ion-icon name="heart-outline"></ion-icon></span>
			<span class="btn-add"><ion-icon name="add-outline"></ion-icon></span>
		</div>
	</div>

</section>