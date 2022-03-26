<?php
    $conn = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,'myfood');
    if(isset($_POST['updatedata'])){
        $food_id = $_POST['food_id'];
        $food_name = $_POST['food_name'];
        $source= $_FILES['food_img']['tmp_name'];
        $dest = "assets/img/".$_FILES['food_img']['name'];
        move_uploaded_file($source, $dest);
        $food_img="assets/img/".$_FILES['food_img']['name'];
        $food_price = $_POST['food_price'];
        $food_des = $_POST['food_des'];



        $sql = "UPDATE food SET food_name='$food_name', food_img='$food_img',food_price='$food_price',food_des='$food_des' where food_id='$food_id';";
        $query = mysqli_query($conn,$sql);

        if($query){
            echo "<script> alert('Data updated!');</script>";
            header('Location: admin.php');
        }
        else{
            echo "<script> alert('Data not updated!');</script>";   
        }
        
    }
?>
