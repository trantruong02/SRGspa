<section class=" w3l-header-4 header-sticky">
    <header class="overlay">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <h1><a class="navbar-brand" href="index.php">
            SRG Spa
            </a></h1>
            <button class="navbar-toggler bg-gradient collapsed" type="button" data-toggle="collapse"
                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="fa icon-expand fa-bars"></span>
        <span class="fa icon-close fa-times"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li> 
                    

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    
                     <?php if (strlen($_SESSION['bpmsuid']==0)) {?>

                     <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li><?php }?>
                    <?php if (strlen($_SESSION['bpmsuid']>0))  {?>
                        <?php
                        $select_rows = mysqli_query($con, "SELECT * FROM `tblcart`") or die('query failed');
                        $row_count = mysqli_num_rows($select_rows);
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart<span>[<?php echo $row_count; ?>]</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> <?php echo "Hi, ". $_SESSION['user_name'] ?> </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="book-appointment.php">Book Appointment</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="booking-history.php">Booking History</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="order-history.php">Order History</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="change-password.php">Change password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                    

                  <?php }?>
                </ul>
                
            </div>
        </div>

        </nav>
    </div>
      </header>
</section>