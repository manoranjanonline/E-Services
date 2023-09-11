        <nav class="navbar navbar-expand-lg py-2 navbar-dark bg-dark px-5 sticky-top">
            <a class="navbar-brand text-warning font-weight-bold" href="javascript:void(0)">The Booking Station </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active1">
                        <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu navbar-dark bg-secondary" aria-labelledby="navbarDropdown">
                            <?php
                                $sql = "Select * from services where service_status=1";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo "
                                        <a class='dropdown-item' href='./service.php?service=$row[service_id]'> $row[service_name] </a>
                                        <div class='dropdown-divider'></div>";
                                }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="mx-2">
                    <ul class="navbar-nav mr-auto">
                        <?php 
                            if(isset($_SESSION['user'])){
                            ?>
                                <li class="nav-item dropdown mr-4">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Account
                                    </a>
                                    <div class="dropdown-menu navbar-dark bg-secondary" aria-labelledby="navbarDropdown">
                                        <a class='dropdown-item' href='./profile.php'>Profile</a>
                                        <a class='dropdown-item' href='./password-change.php'>Change Pasword</a>
                                        <a class='dropdown-item' href='./my-bookings.php'>My Bookings</a>
                                        <div class='dropdown-divider'></div>
                                        <a class='dropdown-item' href="logout.php"><b>Logout</b></a>
                                    </div>
                                </li>
                            <?php
                            }
                            else{
                            ?>
                                <a href="login.php">  <button class="btn btn-info mr-2"><b>Login</b></button></a> 
                                <a href="signup.php"> <button class="btn btn-success" ><b>Signup</b></button></a>
                            <?php
                            }
                        ?>
                    </ul>      
                </div>
            </div>
        </nav>