<?php 
include './include/config.php';
$msg="";
if(isset($_POST['reset'])){
    $sql = "SELECT * FROM users where email='$_POST[email]'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {            
        $pw_new = md5($_POST['pw_new']);
        $sql = "UPDATE users set password='$pw_new', hash=null where email='$_POST[email]'";
        if($result = $conn->query($sql)){
            $msg = "<H3 class='text-success'>Password Changed </H3><H4><A href='./login.php'> Click Hear to Login</A></H4>";
        }
        else{
            $msg = "<span class='text-danger'>Something Went Wrong.<br>Plz Try Again After Some Time.</span>";
        }
    }
    else{
        $msg = "<span class='text-danger'>Invalid Email ID.<br>Plz Try Again After Some Time.</span>";
    }
}
else if(isset($_GET['email']) && isset($_GET['hash'])){
    $sql = "SELECT * FROM users where email='$_GET[email]' and hash='$_GET[hash]'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {    
        $msg = "<span class='text-danger'>Invalid or Expaired Link.</span>";
    }
    else{
        $email = $_GET['email'];
        $hash  = $_GET['hash'];
    }
}
else{    
    $msg = "<span class='text-danger'>Invalid Request.</span>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <?php include './include/head.php'; ?>
    </head>

    <body style="background: url('./img/tbs.png');background-position: center;background-repeat: no-repeat;background-size: cover;">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-5 col-lg-4 col-md-4" >

                <div class="card o-hidden border-0 shadow-lg my-5 bg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 my-5">
                            <?php if(isset($email) && isset($hash)){ ?>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Reset Your Password</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                                            <input type="hidden" name="hash" value="<?php echo $hash; ?>">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="pw_new" aria-describedby="emailHelp" placeholder="Enter New Password...">
                                        </div>

                                        <button type="submit" name="reset" class="btn btn-primary btn-user btn-block"> Reset Password </button>
                                        <div class="form-group text-center mt-3">
                                            <H6><?php echo $msg; ?></H6>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="./login.php">Already have the Password? Login!</a>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2"><?php echo $msg; ?></h1>
                                    </div>
                                </div>
                            <?php } ?>
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