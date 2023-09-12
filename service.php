 
<?php include 'include/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">


 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
 integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

 <link rel="stylesheet" href="css/style.css">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <style >
  body
  {
   background-color: ghostwhite;
  }
 </style>
 <title>service</title>
</head>
<body>
    <!--Nav bar-->
    <?php include 'include/nav-bar.php'; ?>
    <!--NAV END-->

  <img src="img/services-banner.jpg" class="d-block w-100 ">

  <?php
      $serviceid = $_GET['service'];
      $sql = "Select * from shops where shop_status=1 and shop_type=$serviceid";
      $result = $conn->query($sql);
      if(mysqli_num_rows($result)>0){
        echo '<h1 class="text-center my-3">Service Stations</h1>';
      }
  ?>
  <div class="container mb-5 ">   
    <div class="card-deck row">
      <?php
      $i=0;
      while($row = $result->fetch_assoc()) {
        $x=$row['shop_type'];
        $y=$row['shop_id'];
        $i++;      
        ?>
        <div class="col-sm-4">
          <div class="card servicein" align="center">
            <img src="<?php echo $row['shop_photo']; ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['shop_name']; ?></h5>
              <p class="card-text mb-2"><i class='fas fa-star mr-2'></i><i class='fas fa-star mr-2'></i><i class='fas fa-star mr-2'></i><i class='far fa-star mr-2'></i><i class='far fa-star mr-2'></i></p>
              <p class="card-text mb-2"><i class='fas fa-map-marker-alt mr-2'></i><?php echo $row['shop_address']; ?></p>
              <p class="card-text mb-3"><i class='fa fa-phone mr-2'></i><?php echo $row['shop_phone']; ?></p>
              <A class="btn btn-warning btn-sm" href="booking.php?<?php echo "x=$x&y=$y";?>">Book Now!</A>
            </div>
          </div>
        </div>
        <?php
        }
        if($i==0){
        ?>
          <div class="col-sm-12"><center><img src="img/sorry.jpg"></center></div>
          <div class="col-sm-12 text-center text-danger"><H1>No Service Station Found</H1></div>
          <div class="col-sm-12 text-center text-success"><H1>We Will Provide Service Center Soon</H1></div>
        <?php
        }
        ?>
      </div>
    </div>
    <?php include 'include/footer.php';?>
  </body>
</html>