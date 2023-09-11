<?php 
    include 'include/config.php'; 

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $query = $_POST['query'];
        $msg = $_POST['msg'];
        $sql = "INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `query`, `message`, `datetime`) VALUES (NULL, '$name', '$email', '$phone', '$query', '$msg', CURRENT_TIMESTAMP)";
        $res = mysqli_query($conn,$sql);
        if($res != null)
        {
            $msg = "<H5 class='text-center text-success'>Message Sent Sucessfully</H5>";
        }
        else
        {
            $errmsg = "<H5 class='text-center text-danger'>Something Went Wrong. Plz Try Again Latter</H5>";
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

        <title>Contact Us</title>
    </head>

    <body class="contact1">
    <!--Nav bar-->
    <?php include 'include/nav-bar.php'; ?>
    <!--NAV END-->

        <!-- service section start  -->
        <div class="container my-4 col-4 p-5 contact2">
            <h2 class="text-center">Contact Us</h2>
            <form method="post">
                <div class="form-group">
                    <label for="name">Full Name :</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="phone">Contact No :</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Contact No">
                </div>
                <div class="form-group">
                    <label for="query">Select Your Query :</label>
                    <select class="form-control" name="query" id="query">
                        <option>About services</option>
                        <option>About TBS Web</option>
                        <option>About TBS App</option>
                        <option>About TBS Team</option>
                        <option>Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="msg">Additional Details :</label>
                    <textarea class="form-control" name="msg" id="msg" rows="3"></textarea>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-warning" name="submit" ><b>Submit</b></button>
                </div>
                <div class="form-group text-center">
                    <?php
                        if(isset($msg)){
                            echo "$msg";
                        }
                    ?>
                </div>
            </form>
        </div>
    <?php include 'include/footer.php';?>
    </body>

</html>