
<?php
//link to php
include '../components/vendor_header.php';
// include '../api/v-reg.php';

?>

    <h2>VENDOR LOGIN</h2>
    <section class="image-background">  

        <form action="vendor_login.php" method="post" class="login-request">
            <div class="sign-up-form" class="col-1">

                <div class="">
                    <input name="email"  placeholder="Vendor/Company Email"type="email" class="" id="">
                </div>

                    <div class="">
                        <input name="vendor_password"  placeholder="Create Password "type="password" class="" id="">
                    </div>
                </div>

                <button class="button" type="submit" name="sign-up" action="submit"  value="sign-up">sign-up</button>
    
            </div>

        </form>
    </section>
</div>
    <?php include '../components/vendor_footer.php'; ?>


<!--     
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
				title: res.msg
				})

				location.href = '/?page=menu';

			}else{
				Swal.fire(
					res.msg,
					'Let\'s try something else!',
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
			}else{
				Swal.fire(
				res.msg[0],
				res.msg[1],
				'info'
				)

				
			}

		});

	</script> -->