<section class="image-background">
    <div class="hover-tab">
		
        <button class="tablink" onclick="openPage('log-in-tab', this, 'initial')"id="defaultOpen">Log In</button>
       <button class="tablink" onclick="openPage('sign-up-tab', this, 'initial')" >Sign Up</button>

		<!-- SIGN UP        onsubmit="return signupValidation()" -->

        <div id="sign-up-tab" class="tabcontent">
			<?php 
			include "api\user-signin.php";
			echo $error?>

            <form action="" method="post" name="sign-up" class="login-request" >
			
				<div class="row">
					<div class="col span-1-of-2">
						<input type="text" name="fname" placeholder="First Name" required>
					</div>
					<div class="col span-1-of-2">
						<input type="text" name="lname" placeholder="Last Name" required>
					</div>
				</div>

				<div class="row">
						<input type="email" name="email" id="email" placeholder="E-mail" required>
				</div>
				
				<div class="row">
						<input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" required>
				</div>

				<div class="row">
					<input class="col password" type="password" name="password" placeholder="Password" required>
					<ion-icon name="eye-outline" class="col togglePassword"></ion-icon>
				
				</div>

				<button type="submit" name="sign-up-submit" id="signup-btn">Sign Up</button>
				
			</form>
        </div>
		

		<!--  -->
		<!-- LOG IN -->
		<div id="log-in-tab" class="tabcontent">

			
		
		<?php
			include "api\user-login.php";
			echo $error?>

			<form name="login" action="" method="post" class="login-request">
			
				<div class="row">
					<input type="text" name="username" id="username" placeholder="Email or Phone Number" required>
				</div>
				
				<div class="row">
						<input class="col password" name="password" type="password" placeholder="Password" required>
					<ion-icon name="eye-outline" class="col togglePassword"></ion-icon>
				</div>

				<button type="submit" name="log-in-submit" id="login-btn">Log In</button>

			</form>

        </div>
        

    </div>
    </section>
