
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


// if button is pressed, increment counter

if(isset($_POST['add_to_cart'])){

  if (strlen($_SESSION['bpmsuid']==0)) {
    header('location:logout.php');
    } else{

  $proname = $_POST['proname'];
  $proprice = $_POST['proprice'];
  $proimg = $_POST['proimg'];
  $proquan = 1;

  $select_cart = mysqli_query($con, "SELECT * FROM `tblcart` WHERE Name = '$proname'");

  if(mysqli_num_rows($select_cart) > 0)
  {
    $message[] = '['. $proname . ']'. " already added. Adjust amount in Cart!"; 

  } 
  else 
  {
    $insert_product = mysqli_query($con, "INSERT INTO `tblcart`(Name, Cost, Image, Quantity) VALUES ('$proname', '$proprice', '$proimg', '$proquan')");
    $message[] = '['. $proname . ']' . ' added to cart succesfully!';
  }
}
}


  ?>
<!doctype html>
<html lang="en">
  <head>
    

    <title>SRG Spa | Products </title>

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
    <div class="about-inner services ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                Our Products
            </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">Products</li>
</ul>
<?php

    if(isset($message)){
      // var_dump($proname, $proprice, $proimg, $proquan, $insert_product, $select_cart);
      foreach($message as $message){
          echo '<div class="mx-5 badge badge-info"><span class="message ">'.$message.'</span> </div>';
      };
    };

?>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-recent-work-hobbies" > 
    <div class="recent-work ">
        <div class="container">
            <div class="row about-about">
                <?php
                

$ret=mysqli_query($con,"select * from tblproducts");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                  <div class="col-lg-4 col-md-6 col-sm-6 propClone">
                    <form action="" method="POST">
                    <img src="admin/images/<?php echo $row['Image']?>" alt="product" height="200" width="400" class="img-responsive about-me">
                      <div class="about-grids ">
                          <hr>
                          <h5 class="para" style="font-weight: 500;"><?php  echo $row['ProductName'];?></h5>
                          <p class="para " style="font-size: 15px ;"><?php  echo $row['ProductDescription'];?> </p>
                          <input type="hidden" name="proname" value="<?php echo $row['ProductName']; ?>">
                          <input type="hidden" name="proprice" value="<?php echo $row['Cost']; ?>">
                          <input type="hidden" name="proimg" value="<?php echo $row['Image']; ?>">
                          <!-- <br> -->
                          <div class="serpro">
                          <div><p class="para pb-5" style="color: #6667AB">$<?php  echo $row['Cost'];?> </p></div>
                            <div>
                                <input type="submit" class="btn btn-success" value="Add to Cart" name="add_to_cart">
                            </div>
                          </div>
                      </div>
                    </form>
                  </div>


                <br><?php 
$cnt=$cnt+1;
}?>
            
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

</html>