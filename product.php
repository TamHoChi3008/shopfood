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
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:6;
    $current_page = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($current_page - 1) * $item_per_page;    
    $sql = "SELECT * FROM food order by food_id ASC LIMIT ".$item_per_page." offset ".$offset."";
    $result = $conn->query($sql);
    $totalRecords = mysqli_query($conn,"select *from food");
    $totalRecords = $totalRecords -> num_rows;
    $totalPages = ceil($totalRecords/$item_per_page);
    

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo '<div class="menu__content">
                  <img src="'.$row["food_img"].'" alt="" class="menu__img" style="height:100px;width:100px;">
                  <h3 class="menu__name">'.$row["food_name"].'</h3>
                  <span class="menu__detail">'.$row["food_des"].'</span>
                  <span class="menu__preci">$'.$row["food_price"].'</span>
                 <a href="details.php?&id='.$row["food_id"].'" class="button menu__button"><i class="bx bxs-show"></i></a>
              </div>';  
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>

