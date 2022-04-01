// Mobile View Link icon display
$(".js--nav-icon").click(function () {
	var nav = $(".main-nav");
	var icon = $(".js--nav-icon");
	
	nav.slideToggle(300);
	
	// if (icon.hasClass)
});


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


<<<<<<< HEAD
async function logout() {
	res = await $.post('/api/user-logout.php');
	if (res.flag){
		alert(res.msg);
		location.href= '/';
	}
}


=======
function logout() {
	
	// alert(res.msg);
	Swal.fire({
		title: 'Are you sure you want to logout?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, log out!'
	}).then((result) => {
		if (result.isConfirmed) {

			async function t(){
				res = await $.post('/api/user_logout.php');
			
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



>>>>>>> ceb8ddc90de2be4e13c9c55ed67ebddee887099b
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