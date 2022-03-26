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
        echo '<tr>
                <td>'.$row["food_id"].'</td>
                <td>'.$row["food_name"].'</td>
                <td>
                  <img src="'.$row["food_img"].'" style="width:170px;height:150px;">
                </td>
                <td>'.$row["food_price"].'$</td>
                <td>'.$row["food_des"].'</td>
                <td>
                    
                    <button type="button" class="edit editbtn"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                    <button type="button" class="delete deletebtn"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                </td>
              </tr>';  
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>

 