<?php include './include/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './include/head.php'; ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include './include/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include './include/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">                

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 text-center">Booking Details</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sl No</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Slot</th>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Contact No</th>
                                            <th class="text-center">Shop</th>
                                            <th class="text-center">Problem</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $sql = "SELECT b.id, b.phone, b.date, b.slot, b.problem, sp.shop_name FROM services sv,shops sp,booking b where sv.service_id=sp.shop_type and sp.shop_id=b.shop";

                                        $result = $conn->query($sql);
                                        $i=0;
                                        while($row = $result->fetch_assoc()) {
                                            $i++;                   
                                            ?>
                                            <tr>
                                                <td class='text-center'><?php echo $i; ?></td>
                                                <td class='text-left'><?php echo $row['date']; ?></td>
                                                <td class='text-left'><?php echo $row['slot']; ?></td>
                                                <td class='text-left'><?php echo $row['id']; ?></td>
                                                <td class='text-left'><?php echo $row['phone']; ?></td>
                                                <td class='text-left'><?php echo $row['shop_name']; ?></td>
                                                <td class='text-left'><?php echo $row['problem']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php include './include/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include './include/buttom.php'; ?>
</body>

</html>