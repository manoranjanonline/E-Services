<?php
    include('include/config.php');
    include 'include/login-check.php'; 
    $email=$_SESSION['user']['email'];
    $phone=$_SESSION['user']['phone'];

    $sql = "Select name from userdetails where email='$email' OR phone='$phone'";
    $res = $conn->query($sql);
    $user = $res->fetch_assoc();
    $name = $user['name'];
    $address = $user['address'];

    if(isset($_POST['update']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $address = $_POST['address'];
        $sql="update userdetails set name='$name', email='$email', address='$address' where phone='$phone'";
        if(mysqli_query($conn,$sql)){ 
            $msg = "Profile Updated Successfully.";
        }
        else{            
            $errmsg = "Something Went Wrong, Plz try again latter.";
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
                            <label for="phone" class="form-label ">Phone :</label>
                            <input type="text" class="form-control" name="phone" id="phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $phone; ?>" required readonly>
                           </div>
                           <div class="mb-3 col-md-12">
                            <label for="email" class="form-label ">Email ID :</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" required>
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="name" class="form-label ">Name :</label>
                            <input type="text" class="form-control"  name="name" id="name" value="<?php echo $name; ?>" required>
                            </div>
                          <div class="mb-3 col-md-12">
                            <label for="address" class="form-label ">Address :</label>
                            <input type="text" class="form-control"  name="address" id="address" required placeholder="State City" value="<?php echo $address; ?>">
                          </div>
                          <div class="mb-2 col-md-12">
                            <button type="submit" name="update" id="update" class="btn btn-warning btn-block "><b>Update Profile</b></button>
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