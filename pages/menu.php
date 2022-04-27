<?php
	$SQL= "SELECT i.id itemId, i.photo pix, i.item_name itemName, i.description itemDescription, i.price itemPrice , v.vendor_name vendorName FROM ".TBL_ITEM." i JOIN ".TBL_VENDOR." v ON i.idvendor = v.id";

    $statement = $pdo->prepare($SQL);
    $statement->execute();
    $items=$statement->fetchAll(PDO::FETCH_ASSOC);

	$search = $_GET['s'] ?? '';
	if($search){
		$SQL .= " WHERE";
		$SQL .= " i.item_name LIKE ? OR v.vendor_name LIKE ?";
		$statement = $pdo->prepare($SQL);
		$statement->execute(["%$search%", "%$search%"]);
		$searchItems=$statement->fetchAll(PDO::FETCH_ASSOC);
	}

	$divCtrlOrig = $search ? "display: none" : "";
	$divCtrlSearch = $search ? "display: flex" : "display: none";
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
				value="<?= $search  ?>"
			/>
		</div>
	</div>

<div id="center-con" style="<?= $divCtrlOrig ?>">
	
<<<<<<< HEAD
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
=======
<?php 
	foreach  ($items as $item): 
		include 'components/menu_item.php';
	endforeach; 
?>
>>>>>>> 19ee2e58d75077522322ed13f245322451f57732
	
</div>

<div id="result-con" style="<?= $divCtrlSearch ?>">
	<?php	
		if($searchItems){
			foreach  ($searchItems as $item): 
				include 'components/menu_item.php';
			endforeach; 
		} else{
			?>
<br><br><br><h1>Items not found.</h1>
			<?php
		}
	?>
</div>

</section>
<?php
$search = '';
?>