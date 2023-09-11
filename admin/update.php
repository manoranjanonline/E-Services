<?php 
include './include/config.php';
$msg="";
if(isset($_POST['update'])){
    $sql = $_POST['sql'];
    if($conn->query($sql)){
        $msg = "<span class='text-success'>Successfully</span>";
    }
    else{
        $msg = "<span class='text-danger'>Something Went Wrong.<br>Plz Try Again After Some Time.</span>";
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
                
                <div class="container">

                    <!-- Outer Row -->
                    <div class="row justify-content-center">

                        <div class="col-xl-10 col-lg-9 col-md-9" >
                            <div class="card o-hidden border-0 shadow-lg my-5 bg">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-12 my-5">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-2">Update the Value</h1>
                                                    <p class="mb-4"></p>
                                                </div>
                                                <form class="user" method="post">
                                                    <div class="form-group">
                                                        <textarea class="form-control form-control-user" name="sql" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button tupe="submit" name="update" class="btn btn-primary btn-user btn-block">Update Value</button>
                                                    </div>
                                                    <div class="form-group text-center mt-3">
                                                        <H6><?php echo $msg; ?></H6>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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

    </body>

    </html>