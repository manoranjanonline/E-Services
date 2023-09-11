<?php include './include/config.php'; ?>
<?php
if(isset($_SESSION['admin'])){
    header('Location:./');
    exit;
}
$msg=" ";

if(isset($_POST['login'])){
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    if ($id=='admin' && $pw=='tbs') {
        $_SESSION['admin']=true;
        header('Location:./');
        exit;
    }
    else{
        $msg = "<H6 class='text-danger'>Invalid Id or Password</H6>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './include/head.php'; ?>
</head>

<body style="background: url('./img/tbs.png');background-position1: center;background-repeat: yes;background-size1: cover;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-4 col-md-4" ><br><br>
                
                <!-- <H1 class="d-none d-sm-inline-block text-center">TBS Admin Portal</H1>
                <H4 class="d-inline-block d-sm-none text-center">Admin Portal</H4> -->

                <div class="card o-hidden border-0 shadow-lg my-5 bg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 my-5">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h1 text-gray-900 mb-4">Login!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="id" aria-describedby="emailHelp"
                                            placeholder="Enter User Id or Email ID or Phone No">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="pw" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control">
                                                <label class="custom-control text-center" for="customCheck"><?php echo $msg; ?></label>
                                            </div>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="h6 col-sm-6 text-left" href="../">Back to Home Page!</a>
                                        <a class="h6 col-sm-6 text-right" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>