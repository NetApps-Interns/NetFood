<?php
$cartObj = new CartStore_Session();
$cartObj = $cartObj->getCart();
?>

<div id="cd-shadow-layer" class="cart-close-trigger"></div>

<div id="cd-cart">
  <div class="cart_header">
    <span><h2 style="display: inline-block;">Cart</h2></span>
    <span class="cart-close-trigger" style="font-size: 200%;"><ion-icon name="close-circle-outline"></ion-icon></span>
  </div>
	<ul class="cd-cart-items" id="cartBody">
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
  </ul> <!-- cd-cart-items -->

	<div class="cd-cart-total">
		<p>Total <span id="cartTotal">&#8358; <?= $cartObj['total'] ?></span></p>
	</div> <!-- cd-cart-total -->

	<a class="checkout-btn">Checkout</a>
	
</div> <!-- cd-cart -->

<style>
  /* -------------------------------- 

  Modules - reusable parts of our design

  -------------------------------- */

  /* -------------------------------- 

  xheader 

  -------------------------------- */

  #cd-cart {
    position: fixed;
    /* max-height: 90vh; */
    width: 260px;
    padding-top: 10px;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    z-index: 5;
    background: #2a2a2a;
    display: none;
    
  }

  #cd-cart {
    right: -100%;
    -webkit-transition: right 0.3s;
    -moz-transition: right 0.3s;
    transition: right 2s, display .5s;
  }

  #cd-cart.speed-in.sticky {
    padding-top: 90px;
    left: auto;
    right: 0;
    top: auto;
  }
  @media only screen and (min-width: 768px) {
    #cd-cart {
      width: 350px;
    }
  }
  @media only screen and (min-width: 1200px) {
  #cd-cart {
      width: 30%;
    }
  }

 
  #cd-cart.speed-in {
    right: 0;
    display: block;

  }
  #cd-cart > * {
    padding: 0 1em;
  }
  #cd-cart .cart_header{
    font-size: 14px;
    font-size: 0.875rem;
    font-weight: bold;
    text-transform: uppercase;
    margin: 1em 0;
    display: flex;
    justify-content: space-between;
  }

  #cd-cart .cd-cart-items {
    padding: 0;
  }
  #cd-cart .cd-cart-items li {
    position: relative;
    padding: 1em;
    border-top: 1px solid #e0e6ef;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  #cd-cart .cd-cart-items li:last-child {
    border-bottom: 1px solid #e0e6ef;
  }
  #cd-cart .cd-qty, #cd-cart .cd-price {
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
    /* transform: translate(-50%, -50%) rotate(0deg); */
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

  #cd-cart .cd-price {
    margin-top: .4em;
  }
  #cd-cart .cd-item-remove {
    position: absolute;
    right: 1em;
    bottom: auto;
    height: 32px;
    border-radius: 50%;
    /* background: url("../img/cd-remove-item.svg") no-repeat center center; */
  }
  .no-touch #cd-cart .cd-item-remove:hover {
    background-color: #e0e6ef;
  }
  #cd-cart .cd-cart-total {
    padding-top: 1em;
    padding-bottom: 1em;
  }
  #cd-cart .cd-cart-total span {
    float: right;
  }
  #cd-cart .cd-cart-total::after {
    /* clearfix */
    content: '';
    display: table;
    clear: both;
  }
  #cd-cart .checkout-btn {
    display: block;
    /* width: 100%; */
    height: 60px;
    line-height: 60px;
	border-bottom: 2px solid #e4a804;
    background: #e4a804;
    color: #FFF;
    text-align: center;
  }
  .no-touch #cd-cart .checkout-btn:hover {
    background: #a2dda8;
  }
  #cd-cart .cd-go-to-cart {
    text-align: center;
    margin: 1em 0;
  }
  #cd-cart .cd-go-to-cart a {
    text-decoration: underline;
  }
  @media only screen and (min-width: 1200px) {
    #cd-cart > * {
      padding: 0 2em;
    }
    #cd-cart .cd-cart-items li {
      padding: 1em 2em;
    }
    #cd-cart .cd-item-remove {
      right: 2em;
    }
  }

  #cd-shadow-layer {
    position: fixed;
    min-height: 100%;
    width: 100%;
    left: 0;
    background: rgba(0,0,0, 0.6);
    cursor: pointer;
    z-index: 3;
    display: none;
  }
  #cd-shadow-layer.is-visible {
    display: block;
    -webkit-animation: cd-fade-in 0.3s;
    -moz-animation: cd-fade-in 0.3s;
    animation: cd-fade-in 0.3s;
  }

  /* -------------------------------- 

  xkeyframes 

  -------------------------------- */
  @-webkit-keyframes cd-fade-in {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }
  @-moz-keyframes cd-fade-in {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }
  @keyframes cd-fade-in {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }

    
</style>

<script>
  updateCart = async function(data){
    let cartBody = '';
    for (let [key, item] of Object.entries(data.items)) {
      let unitPrice = item.price;
      cartBody += `
      <li>
			<div>
        <div class="cd-qty">
            <div class="number-input">
              <button onclick="removeFromCart(${item.itemID}, 0); this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"><ion-icon name="chevron-down-circle-outline"></ion-icon></button>
              <input class="quantity" min="1" name="quantity" value="${item.qty}" type="number">
              <button onclick="addToCart(${item.itemID}, 0); this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"><ion-icon name="chevron-up-circle-outline"></ion-icon></button>
            </div>
          </div>
        ${item.extra.name}
        <p class="cd-price"><span>&#8358;</span>${unitPrice}</p>
      </div>
			<a onclick="removeFromCart(${item.itemID}, 1, ${item.qty})" class="cd-item-remove cd-img-replace">Remove</a>
	  	</li>
      `
    }

    $("#cartBody").html(cartBody)
    $("#cartTotal").html("&#8358;&nbsp;"+ data.total)
  }

  addToCart = async function(itemId, alat = 1, qty = 1){
    let res = await $.post("/api/cart.php", {
      action: "add",
      item_id: itemId,
      qty: qty
    })
    
    if (res.flag && alat){
      const Toast = Swal.mixin({
				toast: true,
				position: 'top-right',
				showConfirmButton: false,
				timer: 1000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
				})

				Toast.fire({
				icon: 'success',
				title: res.msg[0]
				})

        
        
      }
      updateCart(res.data)
  }

  removeFromCart = async function(itemId, alat = 1, qty=1){
    let res = await $.post("/api/cart.php", {
      action: "remove",
      item_id: itemId,
      qty: qty
    })
    
    if (res.flag){
      const Toast = Swal.mixin({
				toast: true,
				position: 'top-right',
				showConfirmButton: false,
				timer: 1500,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

      Toast.fire({
      icon: 'success',
      title: res.msg[0]
      })

    }
    updateCart(res.data)
  }

  clearCart = async function(itemId, qty){
    let res = await $.post("/api/cart.php", {action: "clear"})
    if (res.flag){
      $("#cartBody").html('');
      $("#cartTotal").html('#0')
    }
    
  }

</script>
