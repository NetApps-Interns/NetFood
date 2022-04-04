		<div id="OpeningParallexImage">
			<div class="address-request">
				<p>
					<ion-icon name="search"></ion-icon>
					<span> What do you want to eat?</span>
				</p>
				<div>
					<input
					onforminput="menu.html"
						placeholder=""
						autocomplete="off"
						name="address"
						class="input"
					/>
					<i class="delete" style="display: none"></i>
				</div>
				<div id="geo-dropdown" style="display: none">
					<!---->
					<div class="geo-option">
						<ion-icon name="map"></ion-icon>
						<span class="pls"> Choose on map </span>
					</div>
				</div>
			</div>

		</div>


		<div class="popular-dishes image-background">
			<h1>Popular Orders</h1>
			<div class="splide">
				<div class="splide__track">
					<div class="container splide__list">
						<div class="menu-item splide__slide">
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

						<div class="menu-item splide__slide">
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

						<div class="menu-item splide__slide">
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

						<div class="menu-item splide__slide">
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

						<div class="menu-item splide__slide">
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

						<div class="menu-item splide__slide">
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

					</div>
				</div>
			</div>
		</div>

		<script>
		var splide = new Splide( '.splide', {
			type    : 'loop',
			perPage : 4,
			autoplay: true,
  			gap    : '3rem',
			  breakpoints: {
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

		