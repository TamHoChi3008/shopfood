<?php

require_once "config.php";

if (isset($_POST['registration'])) {

	$username = $_POST["username"];
	$passwd = $_POST["password"];
	$phone = $_POST["phone_number"];

	if($username == 'admin'){
		echo "<script type='text/javascript'>alert('You are not administrator');</script>";
	}
	else {
		$regis = "select * from users where username = '$username' && phone_number = '$phone' && type = 'user'";

		$result = mysqli_query($conn, $regis);

		$num = mysqli_num_rows($result);

		if ($num == 1) {

			$message = "This account or phone number already exist, Please check it again!";
			echo "<script type='text/javascript'>alert('$message');</script>";

		} else {
			$reg = "insert into users(username, password, phone_number, type) values ('$username' , '$passwd' , '$phone', 'user')";
			mysqli_query($conn, $reg);

			$ms = "Registration Successful";
			echo "<script>alert('$ms');location.href='Sign_in.php'</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name ="viewport" content="width=device-width,initial-sc">
	<link rel="stylesheet" type="text/css" href="a.css">
	<title>Form Đăng ký</title>
</head>
<body>

	<div class = "container">
		<form action="" method="POST" role ="form" class="form-login">
			<h1>Đăng ký</h1>
			<div class="form-text">
				<label>Username</label>
				<input type="text" name="username">
			</div>
			<div class="form-text">
				<label>Telephone</label>
				<input type="text" name="phone_number">
			</div>
			<div class="form-text">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="form-text">
				<label>Confirm Password</label>
				<input type="password" name="password">
			</div>
			<button name="registration">Đăng ký</button>
			<span>Bạn có tài khoản? Đăng nhập <a href="Sign_in.php">Tại đây
			</span>
		</form>
	</div>

	<script type="text/javascript">
		const formLogin=document.querySelectorAll('.form-text input')
		const formLabel=document.querySelectorAll('.form-text label')
		for(let i=0;i<4;i++){
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