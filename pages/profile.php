<?php
$userId = $_SESSION["userid"];

    $SQL= "SELECT c.id idCustomer, c.customer_name customerName, c.customer_address customerAddress, c.customer_email customerEmail , c.customer_phone_number customerPhone FROM customer c WHERE  c.id = $userId";

    $statement = $pdo->prepare($SQL);
    $statement->execute();
    $customer=$statement->fetchAll(PDO::FETCH_ASSOC);
    $customer=$customer[0];

// print_r($_SESSION);
?> 

<div class="image-background">
    <div class="hover-tab">
        <div class="tabcontent" style="display: block;">
            <div id="center-con">
                <div>
                    <h1>PROFILE</h1>
                </div>

                <span class="profile-picture">
                    <img src="/assets/res/img/food_placeholder.png" alt="">
                </span>
                <span class="login-request">
                    <input type="text" value="<?= $customer['customerName']?>">
                </span>
            </div>
        </div>

    </div>


</div>

<style>
    .profile-con{
        
    }
    
    div.profile-con{
        float: left;
        /* background-color: purple; */
        height:50%;
        width:40%;
        padding:5%;
    }


</style>