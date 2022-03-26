<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--========== BOX ICONS ==========-->
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"/>
	<!--========== CSS ==========-->
	<link rel="stylesheet" href="assets/css/styles.css">

	<title>FOOD</title>
	<link rel="stylesheet" href="assets/css/cart.css">
</head>

<body>
	<?php 
	session_start();
	require "header_login.php";
	$cart=(isset($_SESSION['add_cart']))? $_SESSION['add_cart'] : [];
	?>

	<h1 class="h1">Shopping Cart</h1>

	<!-- <form action="view_cart.php" method="POST"> -->
		<div class="shopping-cart">

			<div class="column-labels">
				<label class="product-image">Image</label>
				<label class="product-details">Product</label>
				<label class="product-price">Price</label>
				<label class="product-quantity">Quantity</label>
				<label class="product-removal">Remove</label>
				<label class="product-line-price">Subtotal</label>
			</div>

			<?php $total_price=0; ?>
			<?php
			if (isset($_SESSION["add_cart"])) {
				foreach ($_SESSION["add_cart"] as $key => $value) {
					$tong = 0;
					$tong = $value['food_price']*$value['item_quantity'];

					$total_price+=($value['food_price']*$value['item_quantity']);

					?>
					<div class="product">
						<div class="product-image">
							<img src="<?php echo $value['food_img'] ?>">
						</div>
						<div class="product-details">
							<div class="product-title"><?php echo $value['food_name'] ?></div>
							<p class="product-description"><?php echo $value['food_des'] ?></p>
						</div>
						<div class="product-price"><?php echo $value['food_price'] ?></div>
						<div class="product-quantity">
							
							<input type="number" value="<?php echo $value['item_quantity'] ?>" min="1" max="20" name="item_quantity">
						
						</div>
						<div class="product-removal">
							
							<a href="delete_food.php?id=<?php echo $value['food_id'] ?>" class="remove-product" id="remove">Remove</a>
						</div>
						<div class="product-line-price"><?php echo $tong ?></div>
					</div>


					<?php
				}
			}
			?>

			<div class="totals">
				<div class="totals-item">
					<label>Subtotal</label>
					<div class="totals-value" id="cart-subtotal">
						<?php echo $total_price ?>
					</div>
				</div>

			</div>

			<a href="checkout.php"><button type="submit" class="checkout">Check out</button></a>

		</div>
		<!-- </form> -->

		<script>
			/* Set rates + misc */
			var taxRate = 0.05;
			var shippingRate = 10;
			var fadeTime = 300;


			/* Assign actions */
			$('.product-quantity input').change(function() {
				updateQuantity(this);
			});

			$('.product-removal button').click(function() {
				removeItem(this);
			});


			/* Recalculate cart */
			function recalculateCart() {
				var subtotal = 0;

				/* Sum up row totals */
				$('.product').each(function() {
					subtotal += parseFloat($(this).children('.product-line-price').text());
				});

				/* Calculate totals */
				var tax = subtotal * taxRate;
				var shipping = (subtotal > 0 ? shippingRate : 0);
				var total = subtotal + tax + shipping;

				/* Update totals display */
				$('.totals-value').fadeOut(fadeTime, function() {
					$('#cart-subtotal').html(subtotal.toFixed(2));
					$('#cart-tax').html(tax.toFixed(2));
					$('#cart-shipping').html(shipping.toFixed(2));
					$('#cart-total').html(total.toFixed(2));
					if (total == 0) {
						$('.checkout').fadeOut(fadeTime);
					} else {
						$('.checkout').fadeIn(fadeTime);
					}
					$('.totals-value').fadeIn(fadeTime);
				});
			}


			/* Update quantity */
			function updateQuantity(quantityInput) {
				/* Calculate line price */
				var productRow = $(quantityInput).parent().parent();
				var price = parseFloat(productRow.children('.product-price').text());
				var quantity = $(quantityInput).val();
				var linePrice = price * quantity;

				/* Update line price display and recalc cart totals */
				productRow.children('.product-line-price').each(function() {
					$(this).fadeOut(fadeTime, function() {
						$(this).text(linePrice.toFixed(2));
						recalculateCart();
						$(this).fadeIn(fadeTime);
					});
				});
			}


			/* Remove item from cart */
			function removeItem(removeButton) {
				/* Remove row from DOM and recalc cart total */
				var productRow = $(removeButton).parent().parent();
				productRow.slideUp(fadeTime, function() {
					productRow.remove();
					recalculateCart();
				});
			}
		</script>

		<!--========== MAIN JS ==========-->
		<script src="assets/js/main.js"></script>
	</body>
	</html>