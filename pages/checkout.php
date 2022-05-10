    <?php
     $userId = $_SESSION["userid"];
    $SQL= "SELECT c.id idCustomer, c.customer_name customerName, c.customer_address customerAddress, c.customer_email customerEmail , c.customer_phone_number customerPhone FROM customer c WHERE  c.id = $userId";

    $statement = $pdo->prepare($SQL);
    $statement->execute();
    $customer=$statement->fetchAll(PDO::FETCH_ASSOC);
    $customer=$customer[0];
    ?>
<div class="image-background">
    <div class="hover-tab">
        <div class="tabcontent" style="display: block;">
        <!-- <div class="ldBar"
        style="width:100%;height:60px",
        data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
        data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20"
        ></div> -->
        <div class="row" style="display: flex;justify-content: center;">
            <h1 style="margin: 0; margin-bottom:1rem;display:inline-block">CHECKOUT</h1>
        </div>
        <div class="row">
            <div class="col span-2-of-3">
                <h2 style="margin: 0; margin-bottom:1rem; display: flex;justify-content: left;">ORDER DETAILS</h2>
                <!-- <form id="updateForm"> -->
                <div class="profile_rows">
                    <div class="profile_detail_tag">Address to deliver to</div>
                    <input id="address" type="text" value="<?= $customer['customerAddress']?>" class="profile_details" readonly>

                </div>
                <div class="profile_rows">

                    <div class="profile_detail_tag">Name to deliver to</div>
                    <input id="name" type="text" value="<?= $customer['customerName']?>" class="profile_details" readonly>
                    

                </div>
                <div class="profile_rows">

                    <div class="profile_detail_tag">Phone Number</div>
                    <input id="number" type="text" value="<?= $customer['customerPhone']?>" class="profile_details" readonly>
                    

                </div>
                

                <button id="update-btn" style="width: 40%; border-radius: 20px;">Update</button>
                <!-- </form> -->
                    
            </div>
            <div class="col span-1-of-3">
                <div id="cartSumm">
                <div class="cart_header">
                    <span><h2 style="display: inline-block; margin-top:1rem;">Cart Summary</h2></span>
                </div>
                    <ul class="cartSumm-items cartBody">
                    <?php
                    foreach($cartObj['items'] as $item){
                    $unitPrice = $item['price'];
                    ?>
                <li>
                            <div>
                        <div class="cd-qty">
                            <div class="number-input">
                            <button onclick=" removeFromCart(<?= $item['itemID']?>, 0); this.parentNode.querySelector('input[type=number]').stepDown();" class="cd_quantity_btn minus"><ion-icon name="chevron-down-circle-outline"></ion-icon></button>
                            <input id="cd_quantity" class="quantity" min="1" name="quantity" value="<?= $item['qty'] ?>" type="number">
                            <button onclick="addToCart(<?= $item['itemID']?>, 0); this.parentNode.querySelector('input[type=number]').stepUp(); " class="cd_quantity_btn plus"><ion-icon name="chevron-up-circle-outline"></ion-icon></button>
                            </div> 
                        </div>
                        <?= $item['extra']['name'] ?>
                        <p class="cd-price">&#8358;<?= $unitPrice ?></p>
                    </div>
                            <a onclick="removeFromCart(<?= $item['itemID'] ?>, 1, <?= $item['qty'] ?>)" class="cd-item-remove cd-img-replace">Remove</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul> <!-- cartSumm-items -->

                    <div class="cartSumm-total">
                        <p>Total <span class="cartTotal">&#8358; <?= $cartObj['total'] ?></span></p>
                    </div> <!-- cartSumm-total -->

                    <a href="index.php?page=checkout" class="checkout-btn">Pay</a>
                    
                </div>
            </div>
        </div>           
            
        </div>
        </div>
    </div>
</div>

<style>
     @media only screen and (max-width:425px){
        .profile_details{
            max-width:192.5px;
        }
    }
    .profile_rows{
        margin-bottom:.6rem;
        width:inherit;
    }

    .profile_details{
        height: 20px;
        width: 20rem;
        /* max-width: 200px; */
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

    #cartSumm{
    }
    .cart_header{
        font-size: 14px;
        font-size: 0.875rem;
        font-weight: bold;
        text-transform: uppercase;
        margin: 1em 0;
        display: flex;
        justify-content: center;
    }

    #cartSumm > * {
        padding: 0 1em;
    }

  #cartSumm .cart_header{
    font-size: 14px;
    font-size: 0.875rem;
    font-weight: bold;
    text-transform: uppercase;
    margin: 1em 0;
    display: flex;
    justify-content: center;
  }

    #cartSumm .cartSumm-items {
        padding: 0;
    }
    #cartBody {
        height: 20rem;
        overflow-y: overlay;
    }
  #cartSumm .cartSumm-items li {
    position: relative;
    padding: 1em;
    border-top: 1px solid #e0e6ef;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  #cartSumm .cartSumm-items li:last-child {
    border-bottom: 1px solid #e0e6ef;
  }
  #cartSumm .cd-qty, #cartSumm .cd-price {
    color: #a5aebc;
  }

   /* .cd-qty input{
	  background-color: transparent;
    border: 0;
    border-bottom: 2px solid #e4a804;
    outline-style: none;
    color: #e4a804;
  } */

  input[type="number"] {
  -webkit-appearance: textfield;
  -moz-appearance: textfield;
  appearance: textfield;
  background-color: transparent;

  }

  input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
  }

  .number-input {
    display: inline-flex;
  }

  .number-input,
  .number-input * {
    box-sizing: border-box;
  }

  .number-input button {
    outline: none;
    background-color: transparent;
    align-items: center;
    justify-content: center;
    margin: 0;
    position: relative;
    font-size:115%;
    padding: 0.1rem 0.2rem;

  }

  .number-input button:after {
    display: inline-block;
    position: absolute;
  }
  .number-input button.plus:after {
    transform: translate(-50%, -50%) rotate(0deg);
  }

  .number-input input[type=number] {
    max-width: 1.5rem;
    /* border: solid #ddd; */
    /* border-width: 0 2px; */
    text-align: center;
    color: #e4a804;
    border:none;
    padding-bottom: 0.4rem;
  }

  #cartSumm .cd-price {
    margin-top: .4em;
  }
  #cartSumm .cd-item-remove {
    position: absolute;
    right: 1em;
    bottom: auto;
    height: 32px;
    border-radius: 50%;
    /* background: url("../img/cd-remove-item.svg") no-repeat center center; */
  }
  .no-touch #cartSumm .cd-item-remove:hover {
    background-color: #e0e6ef;
  }
  #cartSumm .cartSumm-total {
    padding-top: 1em;
    padding-bottom: 1em;
  }
  #cartSumm .cartSumm-total span {
    float: right;
  }
  #cartSumm .cartSumm-total::after {
    /* clearfix */
    content: '';
    display: table;
    clear: both;
  }
  #cartSumm .checkout-btn {
    display: block;
    /* width: 100%; */
    height: 60px;
    line-height: 60px;
	border-bottom: 2px solid #e4a804;
    background: #e4a804;
    color: #FFF;
    text-align: center;
  }
  .no-touch #cartSumm .checkout-btn:hover {
    background: #a2dda8;
  }
  #cartSumm .cd-go-to-cart {
    text-align: center;
    margin: 1em 0;
  }

    @media only screen and (min-width: 1200px) {
    #cartSumm > * {
      padding: 0 2em;
    }
    #cartSumm .cartSumm-items li {
      padding: 1em 2em;
    }
    #cartSumm .cd-item-remove {
      right: 2em;
    }
  }
</style>