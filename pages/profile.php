<?php
$userId = $_SESSION["userid"];

    $SQL= "SELECT c.id idCustomer, c.customer_name customerName, c.customer_address customerAddress, c.customer_email customerEmail , c.customer_phone_number customerPhone FROM customer c WHERE  c.id = $userId";

    $statement = $pdo->prepare($SQL);
    $statement->execute();
    $customer=$statement->fetchAll(PDO::FETCH_ASSOC);
    $customer=$customer[0];

    $SQL= "SELECT c.id idCustomer, c.customer_name customerName, c.customer_address customerAddress, c.customer_email customerEmail , c.customer_phone_number customerPhone FROM customer c WHERE  c.id = $userId";

    $statement = $pdo->prepare($SQL);
    $statement->execute();
    $customer=$statement->fetchAll(PDO::FETCH_ASSOC);
    $customer=$customer[0];

// print_r($_SESSION);
?> 

<div class="image-background">
    <div class="p-hover-tab">
        <div class="tabcontent" style="display: block;">
            <div class="profile-page">
                <div class="half-the-con">
                    <h1 style="margin: 0; margin-bottom:1rem;">PROFILE</h1>
                    <div class="profile_rows">

                        <div class="profile_detail_tag">Name</div>
                        <input type="text" value="<?= $customer['customerName']?>" class="profile_details">

                    </div>
                    <div class="profile_rows">

                        <div class="profile_detail_tag">Phone Number</div>
                        <input type="text" value="<?= $customer['customerPhone']?>" class="profile_details">

                    </div>
                    <div class="profile_rows">

                        <div class="profile_detail_tag">E-Mail</div>
                        <input type="text" value="<?= $customer['customerEmail']?>" class="profile_details">

                    </div>
                    <div class="profile_rows">

                        <div class="profile_detail_tag">Address</div>
                        <input type="text" value="<?= $customer['customerAddress']?>" class="profile_details">

                    </div>
                </div>

                <div class="half-the-con">
                    <h1 style="margin: 0; margin-bottom:2rem;">ORDERS</h1>
                    <div class="profile_row">
                        <img src="/uploads/img/item/chicken.jpg" alt="" class="logo" style=" width:50px; height:50px; border-radius: 50%;background-size: cover;    background-attachment: fixed; overflow:hidden ;"> <span>iaxmak</span>
                    </div>



                </div>
            </div>   
        </div>

    </div>


</div>

<style>
    .profile_rows{
        margin-bottom:.6rem;
        width:inherit;
    }

    .profile_details{
        height: 20px;
        width: 20rem;
        max-width: 200x;
        padding: 0.875rem 1rem;
        margin-top: 10px;
        background-color: transparent;
        border: 2px solid #e4a804;
        outline-style: none;
        color: #e4a804;
            border-radius: 0.5rem;
    }
    .profile_detail_tag{
        background: #e4a804;
        margin-bottom: -23px;
        box-sizing: border-box;
        border: 2px solid #e4a804;
        font-size: 16px;
        margin-left: 7px;
        overflow: hidden;
        padding: 0 8px;
        padding-bottom: 3px;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: fit-content;
        z-index: 2;
        border-radius: 1.25rem;
        position: relative; 

    }

    .profile-page{
        display:flex;
	    justify-content: space-around;
        flex-wrap: wrap;
        }

    .p-hover-tab{
        background-color: #e82e009d;
        width: 80%;
        margin: 10% 10%;
        border-radius: 1.25rem;
    }
    

    
    .half-the-con{
        display: block;
        /* justify-content:center;
        align-items:center; */
        padding: .8rem;
        width: 46.4%;
        margin: .3rem;
    }

    @media only screen and (max-width:768px){
        .half-the-con{
            width: 100%;
            
        }
        .tabcontent{
            padding: .2em;
            
        }
        
    }
    @media only screen and (max-width:425px){
        .profile_details{
            max-width:195px;
        }
    }

</style>