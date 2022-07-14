<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
    header('location:logout.php');
} else {
    // if($_GET['delid']) {
    //     $sid=$_GET['delid'];
    //     mysqli_query($con,"delete from tblbook where ID ='$sid'");
    //     echo "<script>alert('Data Deleted');</script>";
    //     echo "<script>window.location.href='all-appointment.php'</script>";
    // }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Order List</title>

<link rel="shortcut icon" href="images/lotus.png" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link rel="shortcut icon" href="assets/images/lotus.png" />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">All Order List</h3>
					<div class="table-responsive bs-example widget-shadow">
						<h4>Order list:</h4>
						<table class="table table-bordered"> 
                            <thead> 
                                <tr> 
                                    <th>ID</th> 
                                    <th>Name</th><th>Phone</th> 
                                    <th>Date</th>
                                    <th>Address</th>
                                    <th>Method</th>
                                    <th>Products</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $ret=mysqli_query($con,"SELECT * FROM tblorder");
                            // $cnt=1;
                            while ($row=mysqli_fetch_array($ret)) {
                            ?>
						        <tr>
                                    
                                    <td><?=$row['ID'];?></td> 
                                    <td><?= $row['Name'];?></td>
                                    <td><?= $row['Phone'];?></td>
                                    <td><?= $row['Date'];?></td> 
                                    <td><?= $row['HomeNo'];?> <?= $row['Street'];?> <?= "q" . $row['Ward'];?> <?= $row['City'];?> </td>
                                    <td><?= $row['Method'];?></td>
                                    <td><?= $row['Total_prod'];?></td>
                                    <td><?= $row['Total_cost'];?></td>
                                    
                                    <?php if($row['Status']==""){ ?>
                                    <td class="font-w600"><?= "Confirming";?></td>
                                    <?php } else { ?>
                                    <td><p class="rounded px-2" style="background-color: #CEE5D0;"><?php  echo $row['Status'];?></p></td><?php } ?> 
                                    
                                    <td><a href="view-order.php?viewid=<?= $row['ID'];?>" class="btn btn-primary">View</a>
                                    </td>
                                </tr>   <?php }?>
                            </tbody>
                        </table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		 <?php include_once('includes/footer.php');?>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
</body>
</html>
<?php }  ?>