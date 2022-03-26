<?php 
session_start();
$username = $_SESSION["username"];
$conn = new mysqli("localhost", "root", "", "myfood");
        if ($conn->connect_error) {
            die('Cannot Connection!');
        }


        if (isset($_POST['submit'])) { // kiểm tra nếu người dùng đã submit thì đưa thông tin order lên db để admin quản lý

            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $city = $_POST["city"];

            $s = "insert into infor_user_ord(username, user, address, city, email) values ('$username', '$fullname', '$address', '$city' ,'$email')";
            
            $result = mysqli_query($conn, $s);
        
        $product = (isset($_SESSION['add_cart']))? $_SESSION['add_cart'] : [];
        foreach($product as $key => $value):
            
            $food_id = $value['food_id'];
            $food_name = $value['food_name'];
            $food_price = $value['food_price'];
            $item_quantity = $value['item_quantity'];
        
        $p = "insert into order_prod(username, food_id, food_name, food_price, item_quantity, time_ord) values ('$username', '$food_id', '$food_name', '$food_price', '$item_quantity', current_timestamp())";
        $result = mysqli_query($conn, $p);        
        
        endforeach;

        echo "<script>alert('Your order is successful. Thanks for your purchase with us! ');location.href='home.php'</script>";
        unset($_SESSION['add_cart']);
    }
    ?>