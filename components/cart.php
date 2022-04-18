<?php
$cartObj = new CartStore_Session();
$cartObj = $cartObj->getCart();
?>

<div id="cd-shadow-layer"></div>

<div id="cd-cart">
	<h2>Cart</h2>
	<ul class="cd-cart-items" id="cartBody">
    <?php
    foreach($cartObj['items'] as $item){
      $unitPrice = $item['price'] / $item['qty'];
      ?>
 <li>
			<div>
        <p class="cd-qty"><?= $item['qty'] ?>x</p> 
        <?= $item['extra']['name'] ?>
        <p class="cd-price"><span>&#8358;</span><?= $unitPrice ?></p>
      </div>
			<a onclick="removeFromCart(<?= $item['itemID'] ?>, <?= $item['qty'] ?>)" class="cd-item-remove cd-img-replace">Remove</a>
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
    height: calc(90vh - 73px);
    width: 260px;
    /* header height */
    padding-top: 75px;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    z-index: 2;
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

  #cd-cart {
    right: -100%;
    background: black;
    -webkit-transition: right 0.3s;
    -moz-transition: right 0.3s;
    transition: right 0.3s;
  }
  #cd-cart.speed-in {
    right: 0;
  }
  #cd-cart > * {
    padding: 0 1em;
  }
  #cd-cart h2 {
    font-size: 14px;
    font-size: 0.875rem;
    font-weight: bold;
    text-transform: uppercase;
    margin: 1em 0;
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
    background: #7dcf85;
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
    top: 80;
    left: 0;
    background: rgba(0,0,0, 0.6);
    cursor: pointer;
    z-index: 2;
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
      let unitPrice = item.price / item.qty;
      cartBody += `
      <li>
			<div>
        <p class="cd-qty">${item.qty}x</p> 
        ${item.extra.name}
        <p class="cd-price"><span>&#8358;</span>${unitPrice}</p>
      </div>
			<a onclick="removeFromCart(${item.itemID}, ${item.qty})" class="cd-item-remove cd-img-replace">Remove</a>
		</li>
      `
    }
$("#cartBody").html(cartBody)
$("#cartTotal").html("<span>&#8358;</span>"+data.total)
  }

  addToCart = async function(itemId, qty = 1){
    let res = await $.post("/api/cart.php", {
      action: "add",
      item_id: itemId,
      qty: qty
    })
    if (res.flag){
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

        
        
      }else{
        
        
      }
      updateCart(res.data)
  }
  removeFromCart = async function(itemId, qty=1){
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
