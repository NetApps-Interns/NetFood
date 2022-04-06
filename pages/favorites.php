<?php
    if (!isset($_SESSION["userid"])) {
        header('Location: index.php?page=login-signup');
        exit;
    }
    
    $statement = $pdo->prepare('SELECT * FROM favorite where idcustomer= userid');
    $statement->execute();
    $items=$statement->fetchAll(PDO::FETCH_ASSOC);


?>

<section class="image-background menu-page">
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

</div>
</section>