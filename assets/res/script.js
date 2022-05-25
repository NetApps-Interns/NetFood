

// Mobile View Link icon display
$(".js--nav-icon").click(function () {
	var nav = $(".main-nav");
	var icon = $(".js--nav-icon");
	
	nav.slideToggle(300);
	
	// if (icon.hasClass)
});

function stickify() {
	if (document.documentElement.scrollTop >= 120) {
		$("header").addClass("sticky");
		$("#cd-cart").addClass("sticky");
		$(".main-nav").addClass("nowSticky");
	} else {
		$("header").removeClass("sticky");
		$("#cd-cart").removeClass("sticky");
		$(".main-nav").removeClass("nowSticky");


	}
}

window.addEventListener("scroll", stickify);

// CART
jQuery(document).ready(function($){
	
	var $cart_trigger = $('#cd-cart-trigger'),
		$lateral_cart = $('#cd-cart'),
		$shadow_layer = $('.cart-close-trigger');


	//open cart
	$cart_trigger.on('click', function(event){
		event.preventDefault();
		toggle_panel_visibility($lateral_cart, $shadow_layer, $('body'));
		$(".main-nav.nowSticky").slideUp(300);
	});

	//close lateral cart or lateral menu
	$shadow_layer.on('click', function(){
		$shadow_layer.removeClass('is-visible');
		// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $lateral_cart.hasClass('speed-in') ) {
			$lateral_cart.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
		} else {
			$lateral_cart.removeClass('speed-in');
		}
	});
});

function toggle_panel_visibility ($lateral_panel, $background_layer, $body) {
	if( $lateral_panel.hasClass('speed-in') ) {
		// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		$lateral_panel.removeClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$body.removeClass('overflow-hidden');
		});
		$background_layer.removeClass('is-visible');

	} else {
		$lateral_panel.addClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$body.addClass('overflow-hidden');
		});
		$background_layer.addClass('is-visible');
	}
}


// 
function openPage(pageName,elmnt,color) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].style.backgroundColor = "";
	}

	document.getElementById(pageName).style.display = "block";
	elmnt.style.backgroundColor = color;
}
  
// Get the element with id="defaultOpen" and click on it



// To toggle Password Visibility
var togglePassword = document.querySelectorAll(".togglePassword");
togglePassword.forEach(e=>{
	var password = e.previousElementSibling;
	e.addEventListener("click", function () {
		// toggle the type attribute
		const type = password.getAttribute("type") === "password" ? "text" : "password";
		password.setAttribute("type", type);
		
	});
})

//
//
addToFav = async function(itemId, itemName){
	let res = await $.post( "api/addToFav.php",{
		itemId: itemId,
		itemName: itemName
	})

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

	if (res.flag){

		Toast.fire({
		icon: 'success',
		title: res.msg[0]
		})
	}else{	
		Toast.fire({
			icon: 'warning',
			title: res.msg[0]
		})
	}

}



function logout() {
	
	// alert(res.msg);
	Swal.fire({
		title: 'Are you sure you want to logout?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#e4a804',
		cancelButtonColor: '#e82d00',
		confirmButtonText: 'Yes, log out!'
	}).then((result) => {
		if (result.isConfirmed) {

			async function t(){
				res = await $.post('api/user_logout.php');
			
				if (res.flag){
					
					Swal.fire(
						res.msg[0],
						res.msg[1],
						'success'
					)
					location.href= '/';
				}
			}
			t();
		
		}
	});
		
}

// Search function
$('#landingSearchInput').on('keyup', async function(e){
	if(e.keyCode == 13)
	{
		location.href = '/?page=menu&s='+$(this).val()
	}
})


$('#searchInput').on('input', async function(e){
	e.stopPropagation()
	e.preventDefault();
	let search = $(this).val();
	let isItFavPage = ($(this).attr("name") == "fav-request") ? 1 : 0;
	pattern = /[a-z]{2,}/i
	
	if (!search){

		$("#result-con").html('');
		document.getElementById("center-con").style.display="flex";

	}

	if (pattern.test(search)){

		document.getElementById("center-con").style.display="none";

		res = await $.get(
			'/api/search.php', 
			{ search: search,
				isItFavPage: isItFavPage }
				)
				
		if (res.flag){			
			$("#result-con").html(buildBody(res.data))
		}else{
			$("#result-con").html('<br><br><br><h1>Items not found.</h1>')
		}
		document.getElementById("result-con").style.display="flex";
	}
	
			
})


function buildBody(data){
	let menuBody = '';

	for (let item of data) {
		menuBody += `
		<div class="menu-item">
			<div class="menu-image">
				<img onerror="this.src = '/assets/res/img/food_placeholder.png'" src= "${IMG+item.pix}" alt="${item.itemName}"/>
			</div>

			<strong><p class="menu-about">${item.itemName}</p></stromg>
			<p>by <em class="menu-about">${item.vendorName}</em></p>
			<span class="meal-price"><span>&#8358;</span>${item.itemPrice}</span>

			<div class = "menu-btn">
				<div>
					<a onclick="addToFav(${item.itemId}, '${item.itemName}')" class="btn-fav" ><ion-icon name="heart-outline"></ion-icon></a>
				</div>
				<div>
					<a onclick="addToCart(${item.itemId})" class="btn-add"><ion-icon name="add-outline"></ion-icon></a>
				</div>
			</div>
		</div>
		`
		}
		return menuBody;
}


function buildFavBody(data){
	let menuBody = '';

	for (let item of data) {
		menuBody += `
		<div class="menu-item">
			<div class="menu-image">
				<img onerror="this.src = '/assets/res/img/food_placeholder.png'" src= "${IMG+item.pix}" alt="${item.itemName}"/>
			</div>

			<strong><p class="menu-about">${item.itemName}</p></strong>
			by <em class="menu-about">${item.vendorName}</em>
			<span class="meal-price"><span>&#8358;</span>${item.itemPrice}</span>

			<div class = "menu-btn">
				<div>
					<a onclick="removeFromFav(${item.itemId}, '${item.itemName}')" class="btn-fav" ><ion-icon name="heart-dislike-outline"></ion-icon></a>
				</div>
				<div>
					<a onclick="addToCart(${item.itemId})" class="btn-add"><ion-icon name="add-outline"></ion-icon></a>
				</div>
			</div>
		</div>
		`
		}
		return menuBody;
}

// // prevent form submit and page reload
// const form = document.querySelector("form");
// form.addEventListener('submit', function (e) { 
// 	e.preventDefault();
// });

// // Stay on that page
// function stayHere(where) {
// 	alert("sign up tab ")
// 	document.getElementsById(where).click();
// }


// // When the user clicks on div, open the popup
// function myFunction() {
// 	var popup = document.getElementById("cart");
// 	popup.classList.toggle("show");
// }



// function signupValidation() {
// 	console.log("Sign up starting")
// 	var valid = true;
// 	$("#username").removeClass("error-field");
// 	$("#email").removeClass("error-field");
// 	$("#password").removeClass("error-field");
// 	var UserName = $("#username").val();
// 	var email = $("#email").val();
// 	var Password = $('#signup-password').val();
// 	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
// 	$("#username-info").html("").hide();
// 	$("#email-info").html("").hide();
// 	if (UserName.trim() == "") {
// 		$("#username-info").html("required.").css("color", "#ee0000").show();
// 		$("#username").addClass("error-field");
// 		valid = false;
// 	}
// 	if (email == "") {
// 		$("#email-info").html("required").css("color", "#ee0000").show();
// 		$("#email").addClass("error-field");
// 		valid = false;
// 	} else if (email.trim() == "") {
// 		$("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
// 		$("#email").addClass("error-field");
// 		valid = false;
// 	} else if (!emailRegex.test(email)) {
// 		$("#email-info").html("Invalid email address.").css("color", "#ee0000")
// 		.show();
// 		$("#email").addClass("error-field");
// 		valid = false;
// 	}
// 	if (Password.trim() == "") {
// 		$("#signup-password-info").html("required.").css("color", "#ee0000").show();
// 		$("#signup-password").addClass("error-field");
// 		valid = false;
// 	}
	
// 	if (valid == false) {
// 		$('.error-field').first().focus();
// 		valid = false;
// 	}
// 	return valid;
// }


// // login

// function loginValidation() {
// 	console.log("Login starting")
// 	var valid = true;
// 	$("#username").removeClass("error-field");
// 	$("#password").removeClass("error-field");
	
// 	var UserName = $("#username").val();
// 	var Password = $('#login-password').val();
	
// 	$("#username-info").html("").hide();
	
// 	if (UserName.trim() == "") {
// 		$("#username-info").html("required.").css("color", "#ee0000").show();
// 		$("#username").addClass("error-field");
// 		alert("NAH")
// 		valid = false;
// 	}
// 	if (Password.trim() == "") {
// 		$("#login-password-info").html("required.").css("color", "#ee0000").show();
// 		$("#login-password").addClass("error-field");
// 		alert("NAH")
// 		valid = false;
// 	}
// 	if (valid == false) {
// 		$('.error-field').first().focus();
// 		valid = false;
// 		alert("NAH")
// 	}
// 	alert("You're iN")
// 	return valid;
// }