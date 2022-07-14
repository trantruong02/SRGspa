<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
    header('location:logout.php');
} else{
?>
<!doctype html>
<html lang="en">
    <head> 
    <title>SRG Spa | Booking History</title>

    <!-- Template CSS -->
    <link rel="shortcut icon" href="assets/images/lotus.png" />
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    </head>
    <body id="home">
<?php include_once('includes/header.php');?>

<script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
<!--bootstrap working-->
<script src="assets/js/bootstrap.min.js"></script>
<!-- //bootstrap working-->
<!-- disable body scroll which navbar is in active -->
<script>
$(function () {
  $('.navbar-toggler').click(function () {
    $('body').toggleClass('noscroll');
  })
});
</script>

<!-- disable body scroll which navbar is in active -->

<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
                <h3 class="header-name ">Order History</h3>
                <p class="tiltle-para ">Check your order history.</p>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-sub">
        <div class="container">   
            <ul class="breadcrumbs-custom-path">
                <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
                <li class="active ">Order History</li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">
            <div>
                <div class="cont-details">
                   <div class="table-content table-responsive cart-table-content m-t-30">
                    <h4 style="padding-bottom: 20px;text-align: center;color: blue;">Order History</h4>
                        <table border="2" class="table">
                            <thead class="gray-bg" >
                                <tr>
                                    <th>#</th>
                                    <th>Order Date</th>
                                    <th>Method</th>
                                    <th>Products</th>
                                    <th>Total cost</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php
                                $userid= $_SESSION['bpmsuid'];
                                $query = mysqli_query($con,"SELECT * FROM tblorder");
                                $cnt=1;
                                while($row=mysqli_fetch_array($query))
                                { ?>
                                <tr>
                                    <td><?php echo $cnt;?></td>
                                    <td><?php echo $row['Date'];?></td>
                                    <td><p> <?php echo $row['Method'];?> </p></td> 
                                    <td><?php echo $row['Total_prod'];?></td> 
                                    <td><?php echo $row['Total_cost'];?></td>
                                    
                                    <?php if($row['Status']==""){ ?>
                                    <td class="font-w600 "><?= "Confirming";?></td>
                                    <?php } else { ?>
                                    <td><p class="rounded px-2" style="background-color: #CEE5D0;"><?php  echo $row['Status'];?></p></td><?php } ?> 
                                    
                                    <td><a href="order-details.php?ID=<?php echo $row['ID'];?>" class="btn btn-primary">View</a></td>       
                                </tr>
                                <?php $cnt=$cnt+1; } ?>                             
                            </tbody>
                        </table>
                    </div> 
                </div>                
            </div>   
        </div>  
    </div>
</section>
<?php include_once('includes/footer.php');?>
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	<span class="fa fa-long-arrow-up"></span>
</button>
<script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("movetop").style.display = "block";
		} else {
			document.getElementById("movetop").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>
<!-- /move top -->
</body>

</html><?php } ?>