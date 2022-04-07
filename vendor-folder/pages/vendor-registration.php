
<?php
//link to php
include '../components/vendor_header.php';
include '../api/v-reg.php';

?>

<style>
.sign-up-form {
    margin-top: 5%;
        text-align: center;
        width:auto;}
        
.button{
        width: 13%;
        margin-top: 50px;}

.button {
	background-color: #e4a804;
	color: white;
	padding: 20px 20px;
	border: none;
	cursor: pointer;
}

.button:hover {
	opacity: 0.8;
	color: #000000;
}

</style>

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

                <a class="button" type="submit" name="sign-up" action="submit"  value="sign-up">sign-up</a>

    
            </div>

        </form>

    </div>
    <?php include '../components/vendor_footer.php'; ?>