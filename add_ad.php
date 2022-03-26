<?php  
    $conn = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,'myfood');
    if (isset($_POST['sub'])) {
        $food_id = $_POST['food_id'];
        $food_name = $_POST['food_name'];
        $source= $_FILES['food_img']['tmp_name'];
        $dest = "assets/img/".$_FILES['food_img']['name'];
        move_uploaded_file($source, $dest);
        $food_img="assets/img/".$_FILES['food_img']['name'];
        $food_price = $_POST['food_price'];
        $food_des = $_POST['food_des'];

        $sql = "INSERT INTO food (food_id,food_name,food_img,food_price,food_des) VALUES ('$food_id','$food_name','$food_img','$food_price','$food_des')";
        $query = mysqli_query($conn,$sql); 
        if($query){
            echo "<script> alert('Data Added!');</script>";
            header('Location: admin.php');
        }
        else{
            echo "<script> alert('Data not Added!');</script>";   
        }
        
    }
?>

<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" method="post">
                <div class="modal-header">                      
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input name="food_id" type="text" class="form-control" required>
                    </div>                  
                    <div class="form-group">
                        <label>Name</label>
                        <input name="food_name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input name="food_img" type="file" class="form-control" onchange="uploadimg()" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input name="food_price" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="food_des" class="form-control" required></textarea>
                    </div> 

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input name="sub" type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>