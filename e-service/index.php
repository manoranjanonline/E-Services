
<?php include 'include/config.php'; ?>
<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            body{
               background-color: ghostwhite;
           }
       </style>

       <title>The booking station</title>
   </head>

   <body>
    <!--Nav bar-->
    <?php include 'include/nav-bar.php'; ?>
    <!--NAV END-->
    <!-- slider start  -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slider1.jpg" class="d-block w-100 " alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>TBS</h1>
                    <h2>Welcome to The Booking Station.</h2>
                    <p>We are always at your service.</p>
                    <button class="btn btn-primary">Register</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/1234.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>TBS</h1>
                    <h2>Welcome to The Booking Station.</h2>
                    <p>Time is more valuable than money. You can get more money, but you cannot get more time.</p>
                    <button class="btn btn-primary">About</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/1234.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>TBS</h1>
                    <h2>Welcome to The Booking Station.</h2>
                    <p>We must govern the clock, not be governed by it.</p>
                    <button class="btn btn-primary">Contact</button>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- card start  -->

    <div class="container my-4 ">
        <h1 class="text-center mb-4">Services</h1>
        <div class="row mb-2">
            <?php
            $sql = "Select * from services where service_status=1";
            $result = $conn->query($sql);
            $i=0;
            while($row = $result->fetch_assoc()) {
                $i++;      
                ?>
                <div class="col-md-6">                        
                    <div
                    class=" hover row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2"><h4><b>
                                <?php echo $row['service_name']; ?> 
                                <!-- <i class='fas fa-motorcycle'></i> -->
                            </b></h4></strong>
                        <!-- <h6 class="mb-3">Repairing</h6> -->
                        <p class="card-text mb-auto"><?php echo $row['service_desc']; ?></p><br>
                        <a href="service.php?service=<?php echo $row['service_id']; ?>"><button type="button" class="btn btn-warning">BOOK NOW!</button></a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="250" height="250" src="<?php echo $row['service_image']; ?>" alt="" />
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<div class="container my-4">
    <h1 class="text-center mb-4">Upcoming Services</h1>
    <div class="row mb-2">
        <div class="col-md-6">
            <div
            class="hover row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-info"><h4>Mobile Phone</h4></strong>
                <h6 class="mb-3">Repairing</h6>
                <p class="card-text mb-auto">This option will be available very soon.</p>
                <button type="button" class="btn btn-info" disabled>BOOK NOW!</button>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img class="bd-placeholder-img " width="250" height="250" src="img/upcoming-card5.jpg" alt="" />
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div
        class="hover row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-info"><h4>Air Conditioner</h4></strong>
            <h6 class="mb-3">Repairing</h6>
            <p class="card-text mb-auto">This option will be available very soon.</p>
            <button type="button" class="btn btn-info" disabled>BOOK NOW!</button>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="250" height="250" src="img/upcoming-card6.jpg" alt="" />
        </div>
    </div>
</div>
</div>
</div>

<!-- section Gallary -->


<h1 class="text-center my-3">TBS</h1>
<hr>
<div class="container mb-5">   
  <div class="card-deck">
      <div class="card vertical">
        <img src="img/vertical-card1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">TBS Form</h5>
          <p class="card-text mb-5">Feel free to contact us.</p>
          <button class="btn btn-info btn-sm">Contact</button>
      </div>
  </div>
  <div class="card vertical">
    <img src="img/vertical-card2.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">TBS Team</h5>
      <p class="card-text mb-4">TBS team is working hard to manage your precious time.
      You can also be a member of tbs team.</p>
      <button class="btn btn-info btn-sm">Explore now</button>
  </div>
</div>
<div class="card vertical">
    <img src="img/vertical-card3.jpg" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">TBS APP <i class="fab fa-android"></i></h5>
      <p class="card-text mb-5">We are working on it.This option will be available very soon.</p>
      <button class="btn btn-info btn-sm" disabled>Download</button>
  </div>
</div>
</div>
</div>


<!--Capsule-->       
<h1 class="text-center my-3">About us</h1>
<section class="section counter bg-gray">
    <div class="container capsuletotal">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="counter-item capsule">          
                    <h3><span class="count" data-count="29">
                        <?php 
                            $sql = "select count(*) as k from userdetails";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo $row['k']+200;
                        ?>
                    </span><sup></sup></h3>        
                    <p><b>Registered users</b></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="counter-item capsule">               
                    <h3><span class="count" data-count="200">

                        <?php 
                            $sql = "select count(*) as k from booking";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo $row['k']+500;
                        ?>
                            
                        </span></h3>                
                    <p><b>Bookings</b></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="counter-item capsule">             
                    <h3><span class="count" data-count="60">100</span><sup>+</sup></h3>
                    <p><b>Happy Users</b></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="counter-item capsule">
                    <h3 align="text-center"><span class="count" data-count="300">
                        <?php 
                            $sql = "select count(*) as k from shops";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo $row['k']+100;
                        ?>
                    </span><sup></sup></h3>
                    <p><b>Registered shops</b></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--capsule end-->

<!--footer-->

<?php include 'include/footer.php'; ?>

<!--footer end-->
</body>

</html>