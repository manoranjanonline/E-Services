<?php include './include/config.php'; ?>

<?php
$msg="";
if(isset($_POST['add_shop'])){
    $target_dir = "img/shop/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $target_file = $target_dir . time() . '.' . $fileType;
    if (move_uploaded_file($_FILES["file"]["tmp_name"],'../'. $target_file)) {
        $type = $_POST['shop_service'];
        $name = $_POST['shop_name'];
        $phone = $_POST['shop_phone'];
        $email = $_POST['shop_email'];
        $add = $_POST['shop_add'];
        $url=$target_file;
        $sql = "INSERT INTO `shops` (`shop_id`, `shop_type`, `shop_name`, `shop_phone`, `shop_email`, `shop_address`, `shop_photo`, `shop_status`) 
            VALUES (NULL, '$type', '$name', '$phone', '$email', '$add', '$url', '1')";

        $result = $conn->query($sql);
        if($result){
            $msg="Shop Added Successfully";
        }
        else{
            $msg="Something went wrong. Please try again after some time";
        }
    }
    else {
        $msg="Something went wrong. Please try again after some time,Image";
    }
    
}
else if(isset($_POST['btnChange'])){
    $id = $_POST['id'];
    $sql = "Update `shops` set shop_status=shop_status*-1 where shop_id=$id";
        
    if($conn->query($sql)){
        header("Location:./shop.php");
    }
    else{

    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './include/head.php'; ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include './include/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include './include/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">                

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 text-center">Shope Details</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <BUTTON class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Shop</BUTTON>
                            <span align='center'><?php echo $msg; ?></span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sl No</th>
                                            <th class="text-center">Shop No</th>
                                            <th class="text-center">Shop Name</th>
                                            <th class="text-center">Contact No</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Address</th>
                                            <th class="text-center">Photo</th>
                                            <th class="text-center">Shop Type</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM shops sh, services sv where sh.shop_type=sv.service_id order by shop_id";
                                        $result = $conn->query($sql);
                                        $i=0;
                                        while($row = $result->fetch_assoc()) {
                                            $i++;      
                                            $status='';                 
                                            if($row['shop_status']==1){
                                                $status = '<span class="text-success">Active</span>';
                                                $a = '<span class="text-danger">Disable</span>';
                                            }
                                            else{                                                
                                                $status = '<span class="text-danger">Inactive</span>';
                                                $a = '<span class="text-success">Enable</span>';
                                            }                    
                                            ?>
                                            <tr>
                                                <td class='text-center'><?php echo $i; ?></td>
                                                <td class='text-left'><?php echo $row['shop_id']; ?></td>
                                                <td class='text-left'><?php echo $row['shop_name']; ?></td>
                                                <td class='text-left'><?php echo $row['shop_phone']; ?></td>
                                                <td class='text-left'><?php echo $row['shop_email']; ?></td>
                                                <td class='text-left'><?php echo $row['shop_address']; ?></td>
                                                <td class='text-left'><img src='../<?php echo $row['shop_photo']; ?>' height='30'></td>
                                                <td class='text-left'><?php echo $row['service_name']; ?></td>
                                                <td class='text-left'><?php echo $status; ?></td>
                                                <td class='text-left'>
                                                    <form method="post">
                                                        <input type="hidden" name="id" value="<?php echo $row['shop_id']; ?>">
                                                        <button type='submit' name='btnChange'><?php echo $a; ?></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php include './include/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include './include/buttom.php'; ?>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Add a New Shop</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body card p-1 m-1 panel panel-primary">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body p-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-sm" for="shop_service">Service Type:</label>
                                            <div class="col-sm">
                                                <select class="form-control" id="shop_service" placeholder="" name="shop_service">
                                                    <option value=''>Enter Service Type</option>
                                                    <?php
                                                        $sql = "SELECT * FROM services where service_status=1 order by service_name";
                                                        $result = $conn->query($sql);
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "<option value='$row[service_id]'>$row[service_name]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm" for="shop_name">Shop Name:</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control" id="shop_name" placeholder="Enter Shop Name" name="shop_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm" for="shop_phone">Shop Contact No:</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control" id="shop_phone" placeholder="Enter Shop Contact No" name="shop_phone">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm" for="shop_email">Shop Email:</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control" id="shop_email" placeholder="Enter Shop Email" name="shop_email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-sm" for="shop_add">Shop Address:</label>
                                            <div class="col-sm">
                                                <textarea class="form-control" style="height:124px;" id="shop_add" placeholder="Enter Shop Address" name="shop_add"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm" for="pwd">Upload File:<CODE> (Only .png, .jpg, .jpeg Format)</CODE></label>
                                            <div class="col-sm">          
                                                <input type="file" class="form-control" id="file" placeholder="Choose a File" name="file" accept=".jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" name="add_shop" class="btn btn-primary">Submit</button>
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>