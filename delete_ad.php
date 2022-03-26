<?php
    $conn = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,'myfood');
    if(isset($_POST['deletedata'])){
        $id = $_POST['delete_id'];
        $sql = "DELETE from food where food_id='$id'";
        $query = mysqli_query($conn,$sql);

        if($query){
            echo "<script> alert('Data deleted!');</script>";
            header('Location: admin.php');
        }
        else{
            echo "<script> alert('Data note deleted!');</script>";   
        }
        
    }
?>