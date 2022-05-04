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
                        <input type="text" value="<?= $customer['customerName']?>" id="profile_details" readonly>
                        <span class="editor"><ion-icon name="pencil-outline"></ion-icon></span>

                    </div>
                    <div class="profile_rows">

                        <div class="profile_detail_tag">Phone Number</div>
                        <input type="text" value="<?= $customer['customerPhone']?>" id="profile_details" readonly>

                    </div>
                    <div class="profile_rows">

                        <div class="profile_detail_tag">E-Mail</div>
                        <input type="text" value="<?= $customer['customerEmail']?>" id="profile_details" readonly>

                    </div>
                    <div class="profile_rows">

                        <div class="profile_detail_tag">Address</div>
                        <input type="text" value="<?= $customer['customerAddress']?>" id="profile_details" readonly>

                    </div>
                </div>

                <div class="half-the-con">
                    <h1 style="margin: 0 26%;margin-bottom: 1rem;">ORDER HISTORY</h1>

                    <div id="center-con" style="width: 100%; height: 325px; overflow: overlay;">
                    <?php 
	$SQL= "SELECT i.id itemId, i.photo pix, i.item_name itemName, i.description itemDescription, i.price itemPrice , v.vendor_name vendorName FROM ".TBL_ITEM." i JOIN ".TBL_VENDOR." v ON i.idvendor = v.id";

    $statement = $pdo->prepare($SQL);
    $statement->execute();
    $items=$statement->fetchAll(PDO::FETCH_ASSOC);

                        foreach  ($items as $item): 
                            include 'components/menu_item.php';
                        endforeach; 
                    ?>
	
                    </div>

                </div>
            </div>   
        </div>

    </div>


</div>

<script>
    $('#profile_details').click(function () {
        $(this).removeAttr('readonly');
        alert('editable');
    })
</script>

<style>
    .p-hover-tab .menu-item {
        margin: 1rem;
        /* min-height: 200px;
        max-height: 240px; */
        /* width: 130px; */
        background-color: #c1c1c1;
        padding: 10px;
        /* overflow: hidden; */
        border-radius: 15px;
        box-shadow: 1px 1px 10px #e4e4e4;
        color: black;
        text-align: center;
        float: left;
    }

    .profile_rows{
        margin-bottom:.6rem;
        width:inherit;
    }

    #profile_details{
        height: 20px;
        width: 20rem;
        max-width: 200x;
        padding: 0.875rem 1rem;
        margin-top: 10px;
        background-color: transparent;
        border: 2px solid #e4a804;
        outline-style: none;
        border-radius: 0.5rem;
        color: white;
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

    .editor{

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
        #profile_details{
            max-width:195px;
        }
    }

</style>