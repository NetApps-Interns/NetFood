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
        $SQL = "SELECT i.iditem id, i.item_name itemName, i.description itemDescription, i.price itemPrice, i.photo pix, v.vendor_name vendorName FROM favorites f JOIN item i ON f.item_id= i.iditem JOIN vendor v ON i.idvendor = v.idvendor where f.idcustomer='$userID'";
        $statement = $pdo->prepare($SQL);
        $statement->execute();
        $items=$statement->fetchAll(PDO::FETCH_ASSOC);

		// var_dump($items);
		// exit;

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
				name="fav-request"
				class="input"
				id="searchInput"
			/>
		</div>
	</div>

<div id="center-con">
	
	<?php foreach  ($items as $item): 
        include 'components/menu_item.php';
     endforeach; ?>

</div>
<div id="result-con">

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