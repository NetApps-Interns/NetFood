
<?php
//link to php
include('api/v-reg.php');

?>


<section>
    <header class="row">
        <h2>VENDOR_REGISTRATION</h2>
        
    </header>
    <div id="OpeningParallexImage">

        <form action="pages/vendour/vendor-registration.php" method="post" class="login-request">
            <div class="adds" class="col-1">

            <!-- <label for="" class=""> VENDOR/COMPANY NAME</label> -->
                <div class="">
                    <input name="vendor_name"  placeholder="Vendor/Company Name" type="text" class="">
                </div>

                <!-- <label for="" class=""> VENDOR/COMPANY ADDRESS</label> -->
                <div class="">
                    <input name="vendor_address"  placeholder="Vendor/Company address "type="text" class="">
                </div>

            
                <!-- <label for="" class="">VENDOR/COMPANY EMAIL</label> -->
                <div class="">
                    <input name="contact_email"  placeholder="Vendor/Company Email"type="email" class="" id="">
                </div>

                <!-- <label for="" class="">VENDOR/COMPANY PHONE</label> -->
                <div class="">
                    <input name="contact_info"  placeholder="Vendor/company Phone"type="phone" class="" id="">
                </div>


                <div class="">
                    <!-- <label for="" class="">CREATE PASSWORD</label> -->
                    <div class="">
                        <input name="vendor_password"  placeholder="Create Password "type="password" class="" id="">
                    </div>
                </div>

                <label for="" class="">VENDOR/COMPANY DESCRIPTION</label>
                <div class="">
                    <textarea name="description"  placeholder="enter resturant description" type="text" class="" id=""> </textarea>
                </div>

                <button type="submit" name="sign-up-submit" id="signup-btn">Sign Up</button>
				

    
            </div>

        </form>

    </div>
 </section>   
    