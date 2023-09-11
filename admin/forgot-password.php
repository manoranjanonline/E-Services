<?php 
include './include/config.php';
$msg="";
if(isset($_POST['email'])){
    $sql = "SELECT * FROM users where email='$_POST[email]'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { 
        $hash = md5(time());
        $sql = "UPDATE users set hash='$hash' where email='$_POST[email]'";
        if($result = $conn->query($sql)){
            $from    = "coe@kiit.ac.in";
            $to      = $_POST['email'];
            $subject = "Password Reset Link ";
            $text     = "Use the Bellow Link to Reset Your Password  \r\n\r\n" . $SiteUrl . "Admin/password-reset.php?email=$_POST[email]&hash=$hash";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: <$from>" . "\r\n";

            if(mail($to,$subject,$text,$headers)){
                $msg = "<span class='text-success'>Please check you Mail ID $to for password reset Link</span>";
            }
            else{
                $msg = "<span class='text-danger'>Something Went Wrong.<br>Plz Try Again After Some Time.</span>";
            }
        }
        else{
            $msg = "<span class='text-danger'>Something Went Wrong.<br>Plz Try Again After Some Time.</span>";
        }
    }
    else{
        $msg = "<span class='text-danger'>Invalid Email ID.<br>Plz Try Again After Some Time.</span>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <?php include './include/head.php'; ?>
    </head>

    <body style="background: url('./img/tbs.png');background-position: top;background-repeat: yes;background-size1: cover;">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-5 col-lg-4 col-md-4" ><br><br>
                <!-- 
                <H1 class="d-none d-sm-inline-block">Examination Department Admin Portal</H1>
                <H4 class="d-inline-block d-sm-none">Admin Portal</H4> -->

                <div class="card o-hidden border-0 shadow-lg my-5 bg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 my-5">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">Just enter your registered email address below
                                        and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                            name="email" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                        </div>
                                        <button tupe="submit" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                        <div class="form-group text-center mt-3">
                                            <H6><?php echo $msg; ?></H6>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have the Password? Login!</a>
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