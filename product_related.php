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
            $id = $_GET["id"];
            $rel = substr($id,0,1); // chia ID sp theo mã sp trong db để gợi ý sản phẩm cùng loại
            if(isset($id)){

                $related = "SELECT * FROM food  WHERE food_id like '$rel%' LIMIT 6";
                
                $rs = $conn->query($related);

                if ($rs -> num_rows > 0) {
                    while($row = $rs->fetch_assoc()) { // hiển thị sp cùng loạis
                        echo '<div class="menu__content">
                        <img src="'.$row["food_img"].'" alt="" class="menu__img" style="height:100px;width:100px;">
                        <h3 class="menu__name">'.$row["food_name"].'</h3>
                        <span class="menu__detail">'.$row["food_des"].'</span>
                        <span class="menu__preci">$'.$row["food_price"].'</span>
                        <a href="details.php?&id='.$row["food_id"].'" class="button menu__button"><i class="bx bxs-show"></i></a>
                        </div>';
                    }
                }
            }
            ?>