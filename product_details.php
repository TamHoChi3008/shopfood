<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myfood";

// tạo connection
$conn = new mysqli($servername, $username, $password, $dbname);
// kiểm connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
if(isset($_GET['id'])){
    $id = $_GET['id'];
$sql = "select *from food where food_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
  echo '
  <form action="add_cart.php" mothod="GET">
        <div class = "card">
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "'.$row["food_img"].'" alt = "shoe image">
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title">'.$row["food_name"].'</h2>
          <div class = "product-price">
            <p class = "new-price">Price: <span>$'.$row["food_price"].'</span></p>
          </div>

          <div class = "product-detail">
            <h2>about this item: </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p>
            <ul>
              <li>Category: <span>'.$row["food_des"].'</span></li>
              <li>Available: <span>in stock</span></li>
              <li>Shipping Area: <span>In Can Tho City</span></li>
            </ul>
          </div>

          <div class = "purchase-info">
            <input type = "number" min = "1" value = "1" name="quantity">
            <input type="hidden" name="id" value="'.$row["food_id"].'" >
        
            <button type="submit" class = "btn"><i class = "fas fa-shopping-cart"></i> Add to cart</button>
          </div>
        </div>
      </div>
    </form>
        ';	
}
} else {
 echo "0 results";
}
}
$conn->close();
?>
