
<?php 

session_start();
// session_destroy();
// die;

$conn = new mysqli("localhost", "root", "", "myfood");
if ($conn->connect_error) {
    die('Cannot Connection!');
}

$item_quantity=(isset($_GET['quantity'])) ? $_GET['quantity'] : 1;
$action =(isset($_GET['action']));

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM food WHERE food_id = $id";
    
    $rs = $conn->query($query);
    if ($rs -> num_rows > 0) {
        while($row = $rs->fetch_assoc()) {
            $item = [
                'food_id'=>$row['food_id'],
                'food_name'=>$row['food_name'],
                'food_img'=>$row['food_img'],
                'food_price'=>$row['food_price'],
                'food_des'=>$row['food_des'],
                'item_quantity'=>$item_quantity

            ];
            if(isset($_SESSION['add_cart'][$id])){
              $_SESSION['add_cart'][$id]['item_quantity']+=$item_quantity;
          }
          else{
             $_SESSION['add_cart'][$id] = $item;
        
         }

  }   
}

echo "<script>alert(' This product added success! ');location.href='details.php?id=$id'</script>";
}


?>