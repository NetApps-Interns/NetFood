
<section class="image-background">
    <div class="admin hover-tab">
		
        <button class="tablink" onclick="openPage('log-in-tab', this, 'initial')"id="defaultOpen"></button>

		<!-- LOG IN -->
		<div id="log-in-tab" class="tabcontent">

			
		
		<?php
			// include "api\user-login.php";
			// echo $error?>

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
				'/api/login_admin.php', 
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

				location.href = 'admin.php?page=dashboard';

			}else{
				Swal.fire(
					res.msg[0],
					res.msg[1],
					'error'
				)
			}
		});

	

	</script>