<?php
     $userId = $_SESSION["userid"] ?? 0;

    
    $SQL= "SELECT c.id idCustomer, c.customer_name customerName, c.customer_address customerAddress, c.customer_email customerEmail , c.customer_phone_number customerPhone FROM customer c WHERE  c.id = $userId";

    $statement = $pdo->prepare($SQL);
    $statement->execute();
    $customer=$statement->fetchAll(PDO::FETCH_ASSOC);
    if (!$userId) {
      $customer=[];
    }else {
      $customer=$customer[0];
    }
?>
<script src="https://checkout.flutterwave.com/v3.js"></script>

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
                    <input id="addressToDeliver" type="text" value="<?= $customer['customerAddress']?? ''?>" class="profile_details" readonly >

                </div>
                <div class="profile_rows">

                    <div class="profile_detail_tag">Name to deliver to</div>
                    <input id="nameToDeliver" type="text" value="<?= $customer['customerName']?? ''?>" class="profile_details" readonly >
                    

                </div>
                <div class="profile_rows">

                    <div class="profile_detail_tag">Phone Number</div>
                    <input id="numberToDeliver" type="text" value="<?= $customer['customerPhone']?? ''?>" class="profile_details" readonly >
                    

                </div>
                

                <button id="update-btn" style="width: fit-content; border-radius: 0.825rem; margin-bottom: 1rem;">Change</button>
                <!-- </form> -->
                    
            </div>
            <div class="col span-1-of-3">
              <div id="cartSumm">
                <div class="cart_header">
                    <span><h2 style="display: inline-block; margin-top:.5rem;">Cart Summary</h2></span>
                </div>

                    <ul class="cartSumm-items cartBody">
                    <?php
                    foreach(CART_COMP['items'] as $item){
                    $unitPrice = $item['price'];
                    ?>
                      <li>
                              <div>
                                <div class="cd-qty">
                                    <div class="number-input">

                                      <button onclick=" removeFromCart(<?= $item['itemID']?>, 0); this.parentNode.querySelector('input[type=number]').stepDown();" class="cd_quantity_btn minus">
                                        <ion-icon name="chevron-down-circle-outline"></ion-icon>
                                      </button>

                                      <input id="cd_quantity" class="quantity" min="1" name="quantity" value="<?= $item['qty'] ?>" type="number">

                                      <button onclick="addToCart(<?= $item['itemID']?>, 0); this.parentNode.querySelector('input[type=number]').stepUp(); " class="cd_quantity_btn plus">
                                        <ion-icon name="chevron-up-circle-outline"></ion-icon>
                                      </button>
                                    </div> 
                                </div>

                                <p><?= $item['extra']['name'] ?></p>
                                <p class="cd-price">&#8358;<?= $unitPrice ?></p>

                              </div>
                              <div style="margin: 25px;">
                                <a onclick="removeFromCart(<?= $item['itemID'] ?>, 1, <?= $item['qty'] ?>)" class="cd-item-remove cd-img-replace">Remove</a>
                              </div>
                      </li>
                    <?php
                    }
                    ?>
                </ul> <!-- cartSumm-items -->

                    <div class="cartSumm-total">
                        <p>Total <span class="cartTotal">&#8358; <?= CART_COMP['total'] ?></span></p>
                    </div> <!-- cartSumm-total -->

                    <input id="orderRef" type="hidden" value="<?=uniqid("netfood-tx-ref-")?>?>">
                    <button id="payBtn" class="checkout-btn" style="border-radius: .825rem;">Pay Now</button> 

                    
              </div>
            </div>
        </div>           
            
        </div>
        </div>
    </div>
</div>
<script>
   $('input[type=text]').click(function () {
        $('input[type=text]').removeAttr('readonly');
    })
  function getResultFromFlutter(result){
      console.log(result)
  }
  $('#payBtn').on('click', function(e){

    ref = $("#orderRef").val();
    address = $('#addressToDeliver').val();
    name = $('#nameToDeliver').val();
    number = $('#numberToDeliver').val();

    console.log(ref);
    const res = FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-cca74c56a0643b56b06e755f39b2a7b4-X",
      tx_ref: ref,
      amount: <?= CART_COMP['total'] ?>,
      currency: "NGN",
      redirect_url: "netfood.local/index.php?page=checkout",
      customer: {
        email: "<?= $customer['customerEmail']?>",
        phone_number: "<?= $customer['customerPhone']?>",
        name: "<?= $customer['customerName']?>",
      },
      customizations: {
        title: "NETFood",
        description: "Bringing your favorites to your doorstep!",
        logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
      },
      callback: function(payment) {
        // Send AJAX verification request to backend
         verifyTransactionOnBackend(payment.id);
        
      },
      onclose: async function(incomplete) {
        if (incomplete || window.verified === false) {
          alert("Payment Failed");
        } else {
          if (window.verified == true) {
            alert("Payment Success");
            
            res = await $.post(
              '/api/placeOrder.php', 
              { 
                idCustomer: <?= $customer['idCustomer']?>,
                address: address,
                name: name,
                phoneNumber: number,
                orderedItem: '<?= json_encode(CART_COMP['items']) ?>',
                totalAmount: <?= CART_COMP['total'] ?>
              }
            )

          } else {
            alert("Payment Pending");
          }
        }
      }
    })
  })

  function verifyTransactionOnBackend(transactionId) {
    // Let's just pretend the request was successful
    setTimeout(function() {
      window.verified = true;
    }, 500);
  }

//   function makePayment() {
//   FlutterwaveCheckout({
//     public_key: "FLWPUBK_TEST-SANDBOXDEMOKEY-X",
//     tx_ref: "titanic-48981487343MDI0NzMx",
//     amount: <?= CART_COMP['total'] ?>,
//     currency: "NGN",
//     redirect_url: "netfood.local/index.php?page=checkout",
//     customer: {
//       email: "<?= $customer['customerEmail']?>",
//       phone_number: "<?= $customer['customerPhone']?>",
//       name: "<?= $customer['customerName']?>",
//     },
//     customizations: {
//       title: "NETFood",
//       description: "Bringing your favorites to your doorstep!",
//       logo: "/assets/res/img/logo.jpg",
//     },
//   });
// }

</script>

<style>
     @media only screen and (max-width:425px){
        .profile_details{
            max-width:185px;
        }
    }
    .profile_rows{
        margin-bottom:.6rem;
        width:inherit;
    }

    .profile_details{
        height: 20px;
        width: 100%;
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

    div#cartSumm {
        padding: 1rem;
        border-radius: 0.825rem;
        border: 2px solid #e4a804;
    }

    .cartBody{
        min-height:8rem;
        max-height:15rem;
        overflow-y: overlay;
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