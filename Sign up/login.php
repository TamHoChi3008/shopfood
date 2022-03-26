
<?php
session_start();
require_once "config.php";

if (isset($_POST['login'])) {

  $username = $_POST["username"];
  $passwd = $_POST["password"];
  $user_check = "select * from users where username = '$username' && password = '$passwd' && type = 'user'";
  $admin_check = "select * from users where username = '$username' && password = '$passwd' && type = 'admin'";

  $result = mysqli_query($conn, $user_check);
  $res = mysqli_query($conn, $admin_check);

  $num = mysqli_num_rows($result);

  switch($num){
    case "1":
    $_SESSION["username"] = $username;
    header("Location: ../index.php");
    break;
    case "0":
    $num1 = mysqli_num_rows($res);
    if($num1 == 1){
      $_SESSION["username"] = 'admin';
      header("Location: ../admin.php");
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

<!-- registration form -->

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

    $result = mysqli_query($con, $regis);

    $num = mysqli_num_rows($result);

    if ($num == 1) {

      $message = "This account or phone number already exist, Please check it again!";
      echo "<script type='text/javascript'>alert('$message');</script>";

    } else {
      $reg = "insert into users(username, password, phone_number, type) values ('$username' , '$passwd' , '$phone', 'user')";
      mysqli_query($con, $reg);

      $ms = "Registration Successful";
      echo "<script>alert('$ms');</script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script
  src="https://kit.fontawesome.com/64d58efce2.js"
  crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="style.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="" class="sign-in-form" id="loginForm" >
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required/>
          </div>
          <input type="submit" value="Login" class="btn solid" name="login"/>
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>

        <form action="" class="sign-up-form" id="registerForm">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="text" name="phone_number" placeholder="Phone Number" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Repassword" />
          </div>
          <input type="submit" class="btn" value="Sign up" name="registration" required/>
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>

      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>
</html>
