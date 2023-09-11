<?php
include 'include/config.php';
include 'include/login-check.php'; 
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
        <div class="container mt-5">
            <table class="table table-condensed table-hover">
                <thead>
                  <tr>
                    <th>SL No</th>
                    <th>Date </th>
                    <th>Slot</th>
                    <th>Booking ID</th>
                    <th>Shop Name</th>
                    <th>Status</th>
                    <!-- <th>Rating</th> -->
                  </tr>
                </thead>
                <tbody>
                <?php
                    $phone = $_SESSION["user"]["phone"];
                    $sql = "Select * from booking b,shops s where b.shop=s.shop_id and b.phone='$phone' order by id desc limit 10";
                    // echo $sql;
                    $res = $conn->query($sql);
                    $i=0;
                    while($book = $res->fetch_assoc()){
                        $i++;
                ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $book['date']; ?></td>
                    <td><?php echo $book['slot']; ?></td>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['shop_name']; ?></td>
                    <td><?php 
                        if($book['date']<date("Y-m-d")){
                            echo '<H6 class="text-info"><b>Completed</H6>';
                        }
                        else{
                            echo '<H6 class="text-warning">Booked</H6>';
                        }
                    ?></td>

                    <!-- <td><?php 
                        // if($book['status'] && $book['rating']){
                        //     $r = $book['rating']; 
                        //     $i=0;
                        //     while($i<5){
                        //         if($i<$r)
                        //             echo '<i class="fa fa-star text-warning" aria-hidden="true"></i>';
                        //         else
                        //             echo '<i class="fa fa-star text-white" aria-hidden="true"></i>';
                        //         $i++;
                        //     }
                        // }
                        // else if($book['status']){
                        //     echo "<A class='btn btn-sm btn-info' href='./feedback.php'>Give Your Feedback</A>";
                        // }
                        // else{                             
                        //     $i=0;
                        //     while($i<5){
                        //         echo '<i class="fa fa-star text-white" aria-hidden="true"></i>';
                        //         $i++;
                        //     }
                        // }                   
                    ?></td> -->
                  </tr>
                <?php
                }
                ?>
              </tbody>
          </table>
        </div> 
    <?php include 'include/footer.php';?>
    </body>
</html>