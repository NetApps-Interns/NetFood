<?php
$_SESSION = [];
// session_destroy();
?>
<section class="image-background">
    <div class="hover-tab">
		
        <button class="tablink" onclick="openPage('log-in-tab', this, 'initial')"id="defaultOpen">Log In</button>
       <button class="tablink" onclick="openPage('sign-up-tab', this, 'initial')" >Sign Up</button>

		<!-- SIGN UP        onsubmit="return signupValidation()" -->

        <div id="sign-up-tab" class="tabcontent">
			<?php 
			// include "api\user-signup.php";
			// echo $error
			?>

            <form action="" method="post" id="signupForm" class="login-request" >
			
				<div class="row">
					<div class="col span-1-of-2">
						<input type="text" name="fname" id="fname" placeholder="First Name" required>
					</div>
					<div class="col span-1-of-2">
						<input type="text" name="lname" id="lname" placeholder="Last Name" required>
					</div>
				</div>

				<div class="row">
						<input type="email" name="email" id="email" placeholder="E-mail" required>
				</div>
				
				<div class="row">
						<input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" required>
				</div>

				<div class="row">
					<input class="col password" id ="signupPassword" type="password" name="password" placeholder="Password" required>
					<ion-icon name="eye-outline" class="col togglePassword"></ion-icon>
				
				</div>

				<button type="submit" name="sign-up-submit" id="signup-btn">Sign Up</button>
				
			</form>
        </div>
		

		<!--  -->
		<!-- LOG IN -->
		<div id="log-in-tab" class="tabcontent">

			<form id="loginForm" action="" method="post" class="login-request">
			
				<div class="row">
					<input type="text" name="username" id="username" placeholder="Email or Phone Number" required>
				</div>
				
				<div class="row">
						<input class="col password" id="password" name="password" type="password" placeholder="Password" required>
					<ion-icon name="eye-outline" class="col togglePassword"></ion-icon>
				</div>

				<button type="submit" name="log-in-submit" id="login-btn">Log In</button>

			</form>

        </div>
        

    </div>
    </section>

	<script>
		$(document).ready(
			function(){
				document.getElementById("defaultOpen").click();
			}
		)

		$('#loginForm').on('submit', async function(e){
			e.stopPropagation()
			e.preventDefault();
			username = $('#username').val();
			password = $('#password').val();
			res = await $.post(
				'/api/user_login.php', 
				{ username: username, password: password }
			)

			if (res.flag){
				const Toast = Swal.mixin({
				toast: true,
				position: 'top',
				showConfirmButton: false,
				timer: 1500,
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

				location.href = '/?page=menu';

			}else{
				Swal.fire(
					res.msg[0],
					res.msg[1],
					'error'
				)
			}
		});

		$('#signupForm').on('submit', async function(e){
			e.stopPropagation();
			e.preventDefault();
			fname = $('#fname').val();
			lname = $('#lname').val();
			email = $('#email').val();
			phone_number = $('#phone_number').val();
			password = $('#signupPassword').val();

			const check=[];

			if (!(/[A-Z]+/).test(password)) {
				check.push("n uppercase");
			}
			if (!(/[a-z]+/).test(password)) {
				check.push(" lowercase");
			}
			if (!(/\d/).test(password)) {
				check.push(" number");
			}
			// if (!(/[^a-z0-9]/i).test(password)) {
			// 	check.push("special character");
			// }
			if(!password.length < 6){
				check.push(" length longer than 6");
			}
			
			if (check.length > 1) {
				check[check.length-1] = "and"+check[check.length-1];
			}
			// console.log(check);

			if (check){
				let msg = "Password must have at least a"+ check.join(", ");

				Swal.fire(
				'Password format invalid!',
				msg,
				'info');
				return;
			}

			
			data= { 
					fname: fname,
					lname: lname,
					email: email,
					phone_number: phone_number,
					password: password 
				}
				console.log(data);
				console.log("efdshbtrsfer");
			res = await $.post(
				'/api/user_signup.php', 
				data
			)

			// console.log("passed the res");
			// console.log(res) 
			// return;
			if (res.flag){
				Swal.fire(
					res.msg[0],
					res.msg[1],
					'success'
				)
				location.href = '/?page=login-signup';

			}else{
				Swal.fire(
				res.msg[0],
				res.msg[1],
				'info'
				)

				
			}

		});

	</script>