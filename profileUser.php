<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logonew.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/profile.css">
    <title>Your Profile</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Your information</h1>
        <div class="container">
            <div class="row profile">
                <div class="col-md-3">
                    <div class="profile-sidebar">

                        <div class="profile-userpic"> <img
                            src="https://hocwebgiare.com/thiet_ke_web_chuan_demo/bootstrap_user_profile/images/profile_user.jpg"
                            class="img-responsive" alt="Thông tin cá nhân">
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> 
                                <?php session_start(); 
                                if(isset($_SESSION['username'])){
                                    echo $_SESSION['username'];
                                }
                                else {
                                    header("location: home.php");
                                }
                                ?> </div>
                                <div class="profile-usertitle-job"> Member </div>
                            </div>
                            <div class="profile-userbuttons">
                                <a href="home.php" class="btn btn-success btn-sm">Home</a>
                                <a href="index.php" class="btn btn-danger btn-sm">Logout</a>
                            </div>
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <div class="menu-icon"></div>
                                    <li class="active"> <a href=""> <i class="glyphicon glyphicon-info-sign"></i>
                                    Update your information </a>
                                </li>
                                <li> <a href="view_cart.php"> <i class="glyphicon glyphicon-heart"></i> Your product
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">

                    <table class="table table-striped table-bordered table-list">
                        <h4><u> Your personal information : </u></h4>
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>Phone number</th>
                            </tr>
                        </thead>
                        <?php 
                        if(isset($_SESSION['username'])){
                            $name = $_SESSION['username'];
                            $info = "select * from infor_user_ord inner join users on infor_user_ord.username = users.username where infor_user_ord.username = '$name'";
                            require_once "connect.php";
                            $rs = $conn->query($info);

                            if ($rs -> num_rows > 0) {
                                while($row = $rs->fetch_assoc()) {
                                    echo '
                                    <tbody>
                                    <tr>
                                    <td>'.$row['user'].'</td>
                                    <td>'.$row['address'].'</td>
                                    <td>'.$row['city'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['phone_number'].'</td>
                                    </tr>
                                    </tbody>
                                    ';
                                }
                            }
                        }
                        else {
                            header("location: Sign up/Sign_in.php");
                        }
                        ?>

                        <?php 
                        if(isset($_SESSION['username'])){
                            $name = $_SESSION['username'];
                            $info = "select * from order_prod inner join infor_user_ord on order_prod.username = infor_user_ord.username where infor_user_ord.username = '$name'";
                            require_once "connect.php"; ?>

                            <table class="table table-striped table-bordered table-list">
                                <thead>
                                    <tr>
                                        <th class="hidden-xs">Your code order</th>
                                        <th>Item order</th>
                                        <th>Price</th>
                                        <th>Quantity order</th>
                                        <th>Time order</th>
                                    </tr>
                                </thead>
                                <?php
                                $rs = $conn->query($info);
                                if ($rs -> num_rows > 0) {
                                    while($row = $rs->fetch_assoc()) {
                                        echo '
                                        <tbody>
                                        <tr>

                                        <td class="hidden-xs">'.$row['id_ord'].'</td>
                                        <td>'.$row['food_name'].'</td>
                                        <td>'.$row['food_price'].'</td>
                                        <td>'.$row['item_quantity'].'</td>
                                        <td>'.$row['time_ord'].'</td>                                    
                                        </tr>
                                        </tbody>
                                        ';
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>