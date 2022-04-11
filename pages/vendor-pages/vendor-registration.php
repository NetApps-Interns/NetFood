
<?php
//link to php
include '/components/vendor_header.php';
include '/v-reg.php';

?>

    <h2>VENDOR REGISTRATION</h2>
<section class="image-background">  

        <form action="vendor-registration.php" method="post" class="login-request">
            <div class="sign-up-form" class="col-1">

         
                <div class="">
                    <input name="vendor_name"  placeholder="Vendor/Company Name" type="text" class="">
                </div>

                <!-- <label for="" class=""> VENDOR/COMPANY ADDRESS</label> -->
                <div class="">
                    <input name="vendor_address"  placeholder="Vendor/Company address "type="text" class="">
                </div>

            
                <!-- <label for="" class="">VENDOR/COMPANY EMAIL</label> -->
                <div class="">
                    <input name="email"  placeholder="Vendor/Company Email"type="email" class="" id="">
                </div>

                <!-- <label for="" class="">VENDOR/COMPANY PHONE</label> -->
                <div class="">
                    <input name="contact"  placeholder="Vendor/company Phone"type="phone" class="" id="">
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

                <button class="button" type="submit" name="sign-up" action="submit"  value="sign-up">sign-up</button>
    
            </div>

        </form>

    </div>
</section>
    <?php include '/components/vendor_footer.php'; ?>