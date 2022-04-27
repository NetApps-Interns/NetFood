
<?php

include '../api/v-reg.php'; 
?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<section class="image-background">  
<h1 class="">VENDOR REGISTRATION</h1>

<form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-request" id ="vendor-registration">

    <!-- <div class="log-in-form" class=""> -->

        <div class="mb-3">
            <label>VENDOR/COMPANY NAME</label>
            <input name="vendor_name"  placeholder="Vendor/Company Name" type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label> VENDOR/COMPANY ADDRESS</label>
            <input name="vendor_address"  placeholder="Vendor/Company address "type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label >VENDOR/COMPANY CITY</label>
        <select name="idcity" id="idcity" type="text" class="form-select">
            <option value="">gwagwalada</option>
            <option value="">gwarimpa</option>
            <option value="">jabi</option>
            
        </select>
        <div class="row">
            <div class="col">
                <label >VENDOR/COMPANY EMAIL</label>
                <input name="email"  placeholder="Vendor/Company Email"type="email" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" id="">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>

            <div class="col">
                <label>VENDOR/COMPANY PHONE</label>
                <input name="contact"  placeholder="Vendor/company Phone"type="phone" class="form-control" id="">
            </div>

        </div>
        <div class="row">
            <div class="col">
                <label>CREATE PASSWORD</label>
                    <input name="vendor_password"  placeholder="Create Password "type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $vendor_password; ?>" id="">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                
            </div>
            <div class="col">
                <label>CONFIRM PASSWORD</label>
                    <input name="confirm_password"  placeholder="confirm Password "type="password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" id="">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
        </div>

        <div class="mb-3">
        <label>VENDOR/COMPANY DESCRIPTION</label>
            <textarea name="description"  placeholder="enter resturant description" type="text" class="form-control" id="" > </textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="sign-up" action="submit"  value="sign-up">sign-up</button>
        <!-- <input type="submit" class="btn btn-primary" value="Sign Up>"> -->
</div> 
    <p>Already have an account? <a href="../pages/vendor_login.php">Login here</a>.</p>
</form>
</section>

<style>
    body{
    padding: 50px;
    background-color: rgba(0, 0, 0, 0.068);
}
.form-control{
    background-color: rgba(187, 192, 241, 0.459);
}
</style>

<!-- <script>
    
		$('#vendor-registration').on('submit', async function(e){
			e.stopPropagation();
			e.preventDefault();
			vendor_name = $('#vendor_name').val();
            description = $('#description').val();
            contact = $('#contact').val();
			email = $('#email').val();
			vendor_address = $('#vendor_address').val();
			idcity = $('#idcity').val();
            vendor_password = $('#vendor_password').val();
			vendor_password = $('#signupPassword').val();
			
			data= { 
					vendor_name: vendor_name,
					description: description,
					contact: contact,
					email: email,
					vendor_address: vendor_address,
                    idcity: idcity,
                    vendor_password: vendor_password

				}
				console.log(data);
				console.log("");
			res = await $.post(
				'api/v-reg.php', 
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></body>

</body>
</html>
