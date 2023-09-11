<?php
include 'include/config.php';
include 'include/login-check.php'; 
$phone=$_SESSION['user']['phone'];
$email=$_SESSION['user']['email'];
$sql = "Select * from userdetails where email='$email' OR phone='$phone'";
$res = $conn->query($sql);
$user = $res->fetch_assoc();
if(isset($_POST['book'])){
    $phone = $_POST['phone'];
    // $shop = $_POST['shop'];
    $shop = $_GET['y'];
    $date = $_POST['date'];
    $slot = $_POST['slot'];
    $problem = $_POST['problem'];
    $bookingid = microtime(true) * 10000;
    $sql = "INSERT INTO `booking` (`id`, `phone`, `shop`, `date`, `slot`, `problem`, `status`, `feedback`, `rating`) VALUES ('$bookingid', '$phone', '$shop', '$date', '$slot', '$problem', '0', NULL, NULL)";
    $result = $conn->query($sql);
    if($result){
        $msg="Your Booking Successfully Done with Booking ID <b>$bookingid</b>";
        mail($email,"Booking Conform",$msg);    // It will not work on Local Host.
    }
    else{
        $msg="Something went wrong. Please try again after some time";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
        <title>Booking</title>
    </head>
    <body>
        <!--Nav bar-->
        <?php include 'include/nav-bar.php'; ?>
        <!--NAV END-->
        <div class="container-fluid">
            <div class="row">            
                <?php
                    if(isset($msg)){
                        echo '
                            <div class="col-md-6 offset-md-3 mt-5 mb-0">
                                <div class="alert alert-info text-center">
                                  <strong>' . $msg . '</strong>
                                </div>
                            </div>
                        ';
                    }
                ?>
                <div class="col-md-4 offset-md-4">
                    <form class="booking mt-5 border p-4 shadow" method="post" action="">
                        <div class="row">
                          <div class="mb-3 col-md-12">
                            <label class="form-label">Name :</label>
                            <input type="text" class="form-control" value="<?php echo $user['name']; ?>" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Phone :</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $user['phone']; ?>"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email :</label>
                            <input type="email" class="form-control" placeholder="Email ID" value="<?php echo $user['email']; ?>" required>
                        </div>
                        <!-- <div class="mb-3 col-md-12">
                            <label class="form-label">Shop :</label>
                            <select class="form-control" id="shop" name="shop" required>
                                <option value="" >Select the Shop</option>
                                <?php
                                    // $sql = "SELECT * FROM shops where shop_status=1 order by shop_name";
                                    // $result = $conn->query($sql);
                                    // while($row = $result->fetch_assoc()) {
                                    //     echo "<option value='$row[shop_id]'>$row[shop_name]</option>";
                                    // }
                                ?>
                            </select>
                        </div> -->
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Date :</label>
                            <input type="date" class="form-control" name ="date" min="<?php echo date('Y-m-d', strtotime(' +1 day')); ?>"  value="<?php echo date('Y-m-d', strtotime(' +1 day')) ?>" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="cars">Time slot:</label><br>
                            <select class="form-control" id="slot" name="slot" required>
                                <option value="" >Select a Time Slot</option>
                                <option disabled>Morning :</option>
                                <option>09.00-09.30 AM</option>
                                <option>09.30-10.00 AM</option>
                                <option>10.00-10.30 AM</option>
                                <option>10.30-11.00 AM</option>
                                <option>11.00-11.30 AM</option>
                                <option>11.30-12.00 AM</option>
                                <option>12.00-12.30 PM</option>
                                <option>12.30-01.00 PM</option>
                                <option disabled>Evening :</option>
                                <option>06.00-06.30 PM</option>
                                <option>06.30-07.00 PM</option>
                                <option>07.00-07.30 PM</option>
                                <option>07.30-08.00 PM</option>
                                <option>08.00-08.30 PM</option>
                                <option>08.30-09.00 PM</option>
                                <option disabled></option>
                            </select>  
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Describe Your Problem :</label>
                            <textarea class="form-control" rows="6" name="problem"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-block" name="book"><b>Book</b></button>
                    </form>
                </div> 
            </div>
        </div> 
    <?php include 'include/footer.php';?>
    </body>
</html>