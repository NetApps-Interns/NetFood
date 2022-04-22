		<div id="OpeningParallexImage">
			<div class="address-request">
				<p>
					<ion-icon name="search"></ion-icon>
					<span> What do you want to eat?</span>
				</p>
				<div>
					<input
						id="landingSearchInput"
						class="input"
					/>
				</div>
			</div>

		</div>

		<?php
		
			$statement = $pdo->prepare("SELECT i.iditem, i.item_name, i.description, i.price, i.photo, v.vendor_name FROM item i JOIN vendor v ON i.idvendor = v.idvendor");

			// $statement = $pdo->prepare('SELECT id_order_details, SUM(no_of_items) qty FROM order_details GROUP BY id_order_details ORDER BY qty DESC LIMIT 5;');
			$statement->execute();
			$items=$statement->fetchAll(PDO::FETCH_ASSOC);


		?>


		<div class="popular-dishes image-background">
			<h1>Popular Orders</h1>
			<div class="splide">
				<div class="splide__track">
					<div class="container splide__list">
					<?php 
					foreach  ($items as $item): 
						include 'components/menu_item.php';
					endforeach; ?>

					</div>
				</div>
			</div>
		</div>

		<style>
			.splide__pagination {
				bottom: -1.5em;
			}
		</style>

		<script>
		var splide = new Splide( '.splide', {
			type    : 'loop',
			perPage : 4,
			autoplay: true,
			focus  : 'center',
  			gap    : '3rem',
			wheel    : true,
			  breakpoints: {
				860: {
				perPage: 3,
				gap    : '2rem',
				// height : '6rem',
				},
				640: {
				perPage: 2,
				gap    : '1rem',
				// height : '6rem',
				},
				480: {
				perPage: 1,
				gap    : '1rem',
				// height : '6rem',
				},
			},

					} );
			splide.mount();
		</script>

		