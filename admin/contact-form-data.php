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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Contact Form Data</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sl No</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Contact No</th>
                                            <th class="text-center">Query</th>
                                            <th class="text-center">Message</th>
                                            <th class="text-center">Date and Time</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `contacts` order by datetime desc";
                                        
                                        $result = $conn->query($sql);
                                        $i=0;
                                        while($row = $result->fetch_assoc()) {
                                            $i++;                   
                                            ?>
                                            <tr>
                                                <td class='text-center'><?php echo $i; ?></td>
                                                <td class='text-left'><?php echo $row['name']; ?></td>
                                                <td class='text-left'><?php echo $row['email']; ?></td>
                                                <td class='text-left'><?php echo $row['contact']; ?></td>
                                                <td class='text-left'><?php echo $row['query']; ?></td>
                                                <td class='text-left'><?php echo $row['message']; ?></td>
                                                <td class='text-left'><?php echo $row['datetime']; ?></td>
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