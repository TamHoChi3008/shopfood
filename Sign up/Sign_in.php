<?php
session_start();
require_once "config.php";

if (isset($_POST['login'])) {

  $username = $_POST["username"];
  $passwd = $_POST["password"];
  $user_check = "SELECT * from users where username = '$username' && password = '$passwd' && type = 'user'";
  $admin_check = "SELECT * from users where username = '$username' && password = '$passwd' && type = 'admin'";

  $result = mysqli_query($conn, $user_check);
  $res = mysqli_query($conn, $admin_check);

  $num = mysqli_num_rows($result);

  switch($num){
    case "1":
    $_SESSION["username"] = $username;
    header("Location: ../home.php");
    break;
    case "0":
    $num1 = mysqli_num_rows($res);
    if($num1 == 1){
      $_SESSION["username"] = 'admin';
      header("Location: ../admin_home.php");
    }
    else {
      $message = "Username or password is wrong! Please check again!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
    break;
    default:
    $message = "Username or password is wrong! Please check again!";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name ="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="a.css">
	<title>Form-Login</title>
</head>
<body>
	<div class = "container">
			<form action="" method="POST" class="form-login">
				<h1>Đăng nhập</h1>
				<div class="form-text">
					<label>Username</label>
					<input type="text" name="username">
				</div>
				<div class="form-text">
					<label>Password</label>
					<input type="password" name="password">
				</div>
				<button name="login">Đăng nhập</button>
				<span>Bạn chưa có tài khoản? Đăng ký <a href="Sign_up.php">Tại đây
				</span>
			</form>
	</div>

	<script type="text/javascript">
		const formLogin=document.querySelectorAll('.form-text input')
		const formLabel=document.querySelectorAll('.form-text label')
		for(let i=0;i<2;i++){
			formLogin[i].addEventListener("mouseover",function(){
				formLabel[i].classList.add("focus")
			})
			formLogin[i].addEventListener("mouseout",function(){
				if(formLogin[i].value==""){
					formLabel[i].classList.remove("focus")
				}
			})
		}
		// console.log(formLabel)
	</script>
</body>
</html>
