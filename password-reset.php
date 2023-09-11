<?php
    include('include/config.php');

    $email='';
    $phone='';

    if(isset($_POST['reset']))
    {
        $email=$_POST['email'];
        $phone=$_POST['phone'];

        $sql="select * from userdetails where email='$email' AND phone='$phone'";
        $res=mysqli_query($conn,$sql);

        if(mysqli_num_rows($res)==1)
        {
            $pass = rand(11111111,99999999);
            $sql="update userdetails set Password=md5('$pass') where email='$email' AND phone='$phone'";
            if(mysqli_query($conn,$sql)){ 
                mail($email,"TBS New Passwrd","$pass is your new passwrd to login to TBS");
                $msg = "Your New Password is generated and same has been sent in your registered Email ID";
            }
            else{            
                $errmsg = "Something Went Wrong, Plz try again latter.";
            }
        }
        else
        {
            $errmsg = "Email ID and Phone No are not Matching with any User Account";
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
                            <label for="phone" class="form-label ">Mobile No:</label>
                            <input type="text" class="form-control" name="phone" id="phone" required value="<?php echo $phone; ?>">
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="email" class="form-label">Email ID: </label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                          </div>
                          <div class="mb-2 col-md-12">
                            <button type="submit" name="reset" id="reset" class="btn btn-warning btn-block "><b>Reset Password</b></button>
                          </div>
                          <div class="mb-2 col-md-6">
                            <p class="text-center mt-3 text-secondary">Alredy Have the Password?<br><a href="login.php">Login Here</a></p>
                          </div>
                          <div class="mb-2 col-md-6">
                            <p class="text-center mt-3 text-secondary">Dont have an account?<br><a href="signup.php">Register Now</a></p>
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