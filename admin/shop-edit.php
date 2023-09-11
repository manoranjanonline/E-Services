<?php include './include/config.php'; ?>

<?php
$msg="";
$desc="";
$start_date=date("Y-m-d");
$end_date=date("Y-m-d");

$sql = "SELECT * FROM coe_notice where id = " . $_GET['id'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $desc = $row['description'];
    $start_date = $row['start_date'];
    $end_date = $row['end_date'];
    $url = $row['url'];
} 
else {
    echo "0 results";
}

if(isset($_POST['edit_notice'])){

    $id = $_POST['id'];
    $desc = $_POST['desc'];
    $start_date = $_POST['start_date'];
    $end_date = date("Y-m-d");
    $url=$target_file;

    if($_FILES['file']['error'] === UPLOAD_ERR_NO_FILE){
        $sql = "update `coe_notice` SET `description`='$desc', `start_date`='$start_date' , `end_date`='$end_date' where id=$id;";
        $result = $conn->query($sql);
        if($result){
            $msg="Notice UPDATED Successfully";
        }
        else{
            $msg="Something went wrong. Please try again after some time";
        }
    }
    else{
        $target_dir = "../notices/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $target_file = $target_dir . time() . '.' . $fileType;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $sql = "update `coe_notice` SET `description`='$desc', `end_date`='$end_date', `url`='$target_file' where id=$id;";
            $result = $conn->query($sql);
            if($result){
                $msg="Notice UPDATED Successfully";
            }
            else{
                $msg="Something went wrong. Please try again after some time";
            }
        }
        else {
            $msg="Something went wrong. Please try again after some time";
        }

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
                <div class="container mt-5">
                    <center><h1 class="h3 mt-5 text-gray-800 btn btn-lg btn-warning">Edit Examination Notices</h1></center>

                    <!-- DataTales Example -->
                    <div class="card shadow mt-5 mb-4">
                        <div class="card-header py-3">
                            <H1 class="text-center"><?php echo $msg; ?></H1>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                <div class="row">                        
                                    <div class="form-group col-sm-12">
                                        <label class="control-label col-sm" for="email">Description:</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" id="desc" placeholder="Enter Notice Description" name="desc" value="<?php echo $desc; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="control-label col-sm">Notice Date:</label>
                                        <div class="col-sm">       
                                            <input type="date" class="form-control" id="end_date" placeholder="Choose a Date" name="start_date"  value="<?php echo $start_date; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="control-label col-sm">Upload File:</label>
                                        <div class="col-sm">          
                                            <input type="file" class="form-control" id="file" placeholder="Choose a File" name="file" accept=".pdf">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="control-label col-sm">&nbsp;</label>
                                        <div class="col-sm">          
                                            <button type="submit" name="edit_notice" class="btn btn-primary btn-block">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

</body>

</html>