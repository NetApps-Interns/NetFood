<?php
    $statement = $pdo->prepare("SELECT i.iditem, i.item_name, i.description, i.price, i.photo, v.vendor_name FROM item i JOIN vendor v ON i.idvendor = v.idvendor");
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

<div id="center-con">
	
<?php 
	foreach  ($items as $item): 
		include 'components/menu_item.php';
	endforeach; 
?>
	
</div>

<div id="result-con">

</div>

</section>