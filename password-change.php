<?php
    include('include/config.php');
    include 'include/login-check.php'; 
    $email='';
    $phone='';

    if(isset($_POST['change']))
    {
        $email=$_SESSION['user']['email'];
        $phone=$_SESSION['user']['phone'];
        $pass=$_POST['pass'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        if($pass1!=$pass2)
        {
            $errmsg = "Password and Conform Password Mismatch";
        }
        else
        {
            $pass = md5($pass);
            $sql="select password from userdetails where email='$email' AND phone='$phone' and password='$pass'";
            // echo $sql;exit;
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)==1)
            {
                $sql="update userdetails set Password=md5('$pass1') where email='$email' AND phone='$phone'";
                if(mysqli_query($conn,$sql)){ 
                    mail($email,"TBS Passwrd Updated","$pass is your new passwrd to login to TBS");
                    $msg = "Password Updated Successfully.";
                }
                else{            
                    $errmsg = "Something Went Wrong, Plz try again latter.";
                }
            }
            else
            {
                $errmsg = "Invalid Current Password";
            }
        }
    }
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
         body{
             background-image: linear-gradient(180deg, #474747, #cbccd1);
             background-repeat: no-repeat;
             background-size: cover;
             height: 100vh;
            }

        .signin{
                border-radius: 20px;
                background-color: lightgray;
            }
        </style>

        <title>Login</title>
    </head>

    <body>
    <!--Nav bar-->
    <?php include 'include/nav-bar.php'; ?>
    <!--NAV END-->
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                 <div class="signup-form">
                    <form class="signin mt-5 border p-4 shadow" method="post" action="">
                        <div class="row">
                          <div class="mb-3 col-md-12">
                            <label for="pass" class="form-label">Old Password : </label>
                            <input type="password" class="form-control" id="pass" name="pass" required>
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="pass1" class="form-label">New Password : </label>
                            <input type="password" class="form-control" id="pass1" name="pass1" required>
                          </div>
                           <div class="mb-3 col-md-12">
                            <label for="pass2" class="form-label">Confirm Password :</label>
                            <input type="password" class="form-control" id="pass2" name="pass2" required>
                          </div>
                          <div class="mb-2 col-md-12">
                            <button type="submit" name="change" id="change" class="btn btn-warning btn-block "><b>Change Password</b></button>
                          </div>

                          <div class="mb-2 col-md-12">
                                <?php
                                    if(isset($msg)){
                                        echo '<div class="alert alert-success text-center"><strong>' . $msg . '</strong></div>';
                                    }
                                    if(isset($errmsg)){
                                        echo '<div class="alert alert-danger text-center"><strong>' . $errmsg . '</strong></div>';
                                    }
                                ?>
                          </div>
                      </div>
                    </form>
                   
                

                </div> 
            </div>
        </div>
    </div>
    <?php include 'include/footer.php';?>

    </body>
    </html>