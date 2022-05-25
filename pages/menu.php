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
	
<?php 
	foreach  ($items as $item): 
		include 'components/menu_item.php';
	endforeach; 
?>
	
</div>

<div id="result-con" style="<?= $divCtrlSearch ?>">
	<?php	
		if(isset($searchItems)){
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