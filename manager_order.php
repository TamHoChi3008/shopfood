<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logonew.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link href="css/manager.css" rel="stylesheet" type="text/css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <title>Order management</title>
</head>
<body>
<div class="container">
        <div class="row">
            <h1 class="text-center">ORDER MANAGEMENT</h1>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default panel-table">
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>
                                    <!-- <th><em class="fa fa-cog"></em></th> -->
                                    <th class="hidden-xs">ID order</th>
                                    <th>User account</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Email</th>
                                    <th>ID product order</th>
                                    <th>Item order</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Time order</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php require "connect.php";
                                $user_ord = "select * from order_prod inner join infor_user_ord on order_prod.username = infor_user_ord.username order by id_ord DESC";
                                $rs = $conn->query($user_ord);
                                    if ($rs ->num_rows > 0) {
                                        while($row = $rs->fetch_assoc()) {
                                            echo '
                                <tr>
                                    <td class="hidden-xs">'.$row['id_ord'].'</td>
                                    <td>'.$row['username'].'</td>
                                    <td>'.$row['user'].'</td>
                                    <td>'.$row['address'].'</td>
                                    <td>'.$row['city'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['food_id'].'</td>
                                    <td>'.$row['food_name'].'</td>
                                    <td>'.$row['food_price'].'</td>
                                    <td>'.$row['item_quantity'].'</td>
                                    <td>'.$row['time_ord'].'</td>                                    
                                </tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="admin_home.php"><button type="button" class="btn btn-primary">Back to home</button>
            </div>

        </div>

    </div>
    
</body>
</html>