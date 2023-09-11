<?php include './include/config.php'; ?>

<?php
$msg="";
if(isset($_POST['add_service'])){
    $target_dir = "img/service/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $target_file = $target_dir . time() . '.' . $fileType;
    if (move_uploaded_file($_FILES["file"]["tmp_name"], '../'.$target_file)) {
        $name = $_POST['service_name'];
        $desc = $_POST['service_desc'];
        $url=$target_file;

        $sql = "INSERT INTO `services` (`service_id`, `service_name`, `service_desc`, `service_image`, `service_status`) VALUES (NULL, '$name', '$desc', '$url', '1')";
        $result = $conn->query($sql);
        if($result){
            $msg="Service Added Successfully";
        }
        else{
            $msg="Something went wrong. Please try again after some time";
        }
    }
    else {
        $msg="Something went wrong. Please try again after some time";
    }
    
}
else if(isset($_POST['btnChange'])){
    $id = $_POST['id'];
    $sql = "Update `services` set service_status=service_status*-1 where service_id=$id";
        
    if($conn->query($sql)){
        header("Location:./service.php");
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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Service Details</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <BUTTON class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Service</BUTTON>
                            <span align='center'><?php echo $msg; ?></span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sl No</th>
                                            <th class="text-center">Service ID</th>
                                            <th class="text-center">Service Name</th>
                                            <th class="text-center">Service Description</th>
                                            <th class="text-center">Photo</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM services order by service_id";
                                        $result = $conn->query($sql);
                                        $i=0;
                                        while($row = $result->fetch_assoc()) {
                                            $i++;      
                                            $status='';                 
                                            if($row['service_status']==1){
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
                                                <td class='text-left'><?php echo $row['service_id']; ?></td>
                                                <td class='text-left'><?php echo $row['service_name']; ?></td>
                                                <td class='text-left'><?php echo $row['service_desc']; ?></td>
                                                <td class='text-left'><img src='../<?php echo $row['service_image']; ?>' height='30'></td>
                                                <td class='text-left'><?php echo $status; ?></td>
                                                <td class='text-left'>
                                                    <form method="post">
                                                        <input type="hidden" name="id" value="<?php echo $row['service_id']; ?>">
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
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Add a New Service</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body card p-1 m-1 panel panel-primary">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body p-2">
                                <div class="form-group">
                                    <label class="control-label col-sm" for="shop_service">Service Name:</label>
                                    <div class="col-sm">
                                        <input class="form-control" id="service_name" placeholder="" name="service_name">
                                            <option value=''>Enter Service Name</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm" for="shop_service">Service Description:</label>
                                    <div class="col-sm">
                                        <input class="form-control" id="service_desc" placeholder="" name="service_desc">
                                            <option value=''>Enter Service Description</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm" for="pwd">Upload File:<br><CODE>(Only .png, .jpg, .jpeg Format)</CODE></label>
                                    <div class="col-sm">          
                                        <input type="file" class="form-control" id="file" placeholder="Choose a File" name="file" accept=".png,.jpg,.jpeg">
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" name="add_service" class="btn btn-primary">Submit</button>
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