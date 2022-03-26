<!DOCTYPE html>
<html>
<head>
    <title>Checkout Card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- library validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/checkout.css">
</head>
<body>

    <h2>Checkout Form</h2>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form id="validate" action="finish.php" method="POST">
                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="fullname" placeholder="Lê Công Minh" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="minh@gmail.com" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="116 Ninh kiều" required>
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Cần Thơ" required>
                        </div>
                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <input name="submit" type="submit" value="SUBMIT" class="btn">
                </form>
            </div>
        </div>
        <?php $total_price=0; ?>
        <div class="col-25">
            <div class="container">
                <?php session_start(); $ord = (isset($_SESSION['add_cart']))? $_SESSION['add_cart'] : []; ?>
                <a href="view_cart.php"><span><i class="fa fa-shopping-cart"></i> <b><?php echo count($ord) ?></b></span>
                    <?php
                    if (isset($_SESSION["add_cart"])) {
                        foreach($ord as $key => $value){
                            $tong = 0;
                            $tong = $value['food_price']*$value['item_quantity'];

                            $total_price+=($value['food_price']*$value['item_quantity']);

                            ?>
                            <p><a href="details.php?&id=<?php echo $value['food_id'] ?>"><?php echo $value['food_name'] ?></a> <span class="price"><?php echo $value['food_price'].'$'.' '.'x'.' '.$value['item_quantity'] ?></span></p>
                            <?php
                        }
                    }
                    ?>
                    <hr>
                </b></span></p>

                <p>Shipping <span class="price" style="color:black"><b>5%</b></span></p>
                <p>Total <span class="price" style="color:black"><b>

                    <?php echo $_SESSION['total_price']=$total_price+$total_price*0.05 ?>
                $</b></span></p>

            </div>
        </div>
    </div>
    <!-- script validate js -->
    <script>
        $('#validate').validate({
            roles: {
                fullname: {
                    required: true,
                },
                email: {
                    required: true,
                },
                address: {
                    required: true,
                },
                city: {
                    required: true,
                },
                state: {
                    required: true,
                },
                zip: {
                    required: true,
                },
                cardname: {
                    required: true,
                },
                cardnumber: {
                    required: true,
                },
                expmonth: {
                    required: true,
                },
                expyear: {
                    required: true,
                },
                cvv: {
                    required: true,
                },

            },
            messages: {
                fullname:"Please input full name*",
                email:"Please input email*",
                city:"Please input city*",
                address:"Please input address*",
                state:"Please input state*",
                zip:"Please input address*",
                cardname:"Please input card name*",
                cardnumber:"Please input card number*",
                expmonth:"Please input exp month*",
                expyear:"Please input exp year*",
                cvv:"Please input cvv*",
            },
        });
    </script>
</body>
</html>