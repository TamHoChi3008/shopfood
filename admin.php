<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/manager.css" rel="stylesheet" type="text/css"/>

    <body>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Product</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal"  class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
                           <!--  <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a> -->                       
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php include("manager_product.php"); ?>
                        <!-- <c:forEach begin="1" end="5" var="o"> -->
                            
                        <!-- </c:forEach> -->
                    </tbody>
                </table>
                <div class="clearfix">
                    <!-- <div class="hint-text">Showing <b>6</b> out of <b>25</b> entries</div> -->
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <!-- <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li> -->
                        <?php include("pagination_admin.php"); ?>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
            <a href="#"><button type="button" class="btn btn-primary">Back to home</button>

        </div>
        <!-- add Modal HTML -->
        <?php include("add_ad.php"); ?>
        <!-- Edit Modal HTML -->
        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="update_ad.php" method="post" enctype="multipart/form-data">
                        <div class="modal-header">                      
                            <h4 class="modal-title">Edit Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">                    
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" name="food_id" id="food_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="food_name" id="food_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input name="food_img" id="food_img" type="file" class="form-control" onchange="uploadimg()" required>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="food_price" id="food_price" class="form-control" required>
                            </div>  
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="food_des" id="food_des" class="form-control" required>
                            </div>                  
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" name="updatedata" class="btn btn-info" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="delete_ad.php" method="post">
                        <div class="modal-header">                      
                            <h4 class="modal-title">Delete Product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">                
                            <input type="hidden" name="delete_id" id="delete_id">
                            <p>Are you sure you want to delete these Records?</p>
                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" name="deletedata" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>

<script src="js/manager.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.deletebtn').on('click',function(){
            $('#deleteEmployeeModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_id').val(data[1]);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.editbtn').on('click',function(){
            $('#editEmployeeModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#food_id').val(data[1]);
            $('#food_name').val(data[2]);
            // $('#food_img').val(data[3]);
            $('#food_price').val(data[4]);
            $('#food_des').val(data[5]);
        });
    });
</script>
</body>
</html>