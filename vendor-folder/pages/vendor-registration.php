
<?php
//link to php
include 'pages/vendor/pages/vendor_header.php';
include 'api/v-reg';

?>

<section class="image-background">
    <div class="hover-tab">
		
        <button class="tablink" onclick="openPage('log-in-tab', this, 'initial')"id="defaultOpen">Log In</button>
       <button class="tablink" onclick="openPage('sign-up-tab', this, 'initial')" >Sign Up</button>

		<!-- SIGN UP        onsubmit="return signupValidation()" -->

        <div id="sign-up-tab" class="tabcontent">
   
 <h2>VENDOR_REGISTRATION AND LOGIN</h2>

        <form action="pages/vendour/vendor-registration.php" method="post" class="login-request">
            <div class="adds" class="col-1">

            <!-- <label for="" class=""> VENDOR/COMPANY NAME</label> -->
                <div class="row">
                    <input name="vendor_name"  placeholder="Vendor/Company Name" type="text" class="">
                </div>

                <!-- <label for="" class=""> VENDOR/COMPANY ADDRESS</label> -->
                <div class="row">
                    <input name="vendor_address"  placeholder="Vendor/Company address "type="text" class="">
                </div>

            
                <!-- <label for="" class="">VENDOR/COMPANY EMAIL</label> -->
                <div class="row">
                    <input name="contact_email"  placeholder="Vendor/Company Email"type="email" class="" id="">
                </div>

                <!-- <label for="" class="">VENDOR/COMPANY PHONE</label> -->
                <div class="row">
                    <input name="contact_info"  placeholder="Vendor/company Phone"type="phone" class="" id="">
                </div>


                <div class="row">
                    <!-- <label for="" class="">CREATE PASSWORD</label> -->
                    <div class="">
                        <input name="vendor_password"  placeholder="Create Password "type="password" class="" id="">
                    </div>
                </div>

                <label for="row" class="">VENDOR/COMPANY DESCRIPTION</label>
                <div class="row">
                    <textarea name="description"  placeholder="enter resturant description" type="text" class="" id=""> </textarea>
                </div>

                <button type="submit" name="sign-up-submit" id="signup-btn">Sign Up</button>
				

    
            </div>

        </form>

    </div>
   <?php include 'pages/vendor-pages/vendor_footer.php'; ?>