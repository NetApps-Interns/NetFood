<?php
// die(json_encode($_SESSION));
    // if (!isset($_SESSION[""])) {
    //     echo "Sign in to see favorites";
    //     // output_json()
    //     exit;
    // }
    if(isset($_SESSION['userid'])){

        $userID=$_SESSION["userid"];
        // echo $userID;
        $SQL = "SELECT i.iditem, i.item_name, i.description, i.price, i.photo FROM favorites f JOIN item i ON f.item_id= i.iditem where f.idcustomer='$userID'";
        $statement = $pdo->prepare($SQL);
        $statement->execute();
        $items=$statement->fetchAll(PDO::FETCH_ASSOC);

    }else{

        $items = [];
        $_SESSION['error_msg'] = "Log in to see your favorites";
    }

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
				<a onclick="removeFromFav(<?= $item['iditem']?>, '<?= $item['item_name'] ?>')" class="btn-fav" >r<ion-icon name="heart-dislike-outline"></ion-icon></a>
				<a onclick="addToCart(<?= $item['iditem']?>)" class="btn-add">a<ion-icon name="add-outline"></ion-icon></a>
			</div>
        </div>
    <?php endforeach; ?>

</div>
</section>

<script>
    //
//
removeFromFav = async function(itemId, itemName){
	let res = await $.post( "/api/removeFromFav.php",{
		itemId: itemId,
		itemName: itemName
	})

	// alert(res.msg[0]);
	// return;
	if (res.flag){
		const Toast = Swal.mixin({
			toast: true,
			position: 'top',
			showConfirmButton: false,
			timer: 1000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
			})
	
		Toast.fire({
		icon: 'success',
		title: res.msg[0]
		})
        location.href = "/?page=favorites";

	}else{
		const Toast = Swal.mixin({
			toast: true,
			position: 'top',
			showConfirmButton: false,
			timer: 1000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
			})
	
		Toast.fire({
			icon: 'warning',
			title: res.msg[0]
			})
	
	}

}
</script>