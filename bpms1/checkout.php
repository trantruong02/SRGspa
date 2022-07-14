<?php

session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $homeno = $_POST['homeno'];
   $street = $_POST['street'];
   $ward= $_POST['ward'];
   $city = $_POST['city'];

   $cart_query = mysqli_query($con, "SELECT * FROM `tblcart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['Name'] .' ('. $product_item['Quantity'] .') ';
         $product_price = number_format($product_item['Cost'] * $product_item['Quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($con, "INSERT INTO `tblorder`(Name, Phone, Email, Method, HomeNo, Street, Ward, City, Total_prod, Total_cost) VALUES('$name','$number','$email','$method','$homeno','$street','$ward','$city','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Order completed!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."  </span>
         </div>
         <div class='customer-details'>
            <p> Fullname : <span>".$name."</span> </p>
            <p> Phone number : <span>".$number."</span> </p>
            <p> Email : <span>".$email."</span> </p>
            <p> Address : <span>".$homeno.", ".$street.", ".$ward.",".$city."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='cart.php?delete_all' class='btn btn-success'>Continue shopping</a>
            <br>
            <small>Your order history might take a few minutes to update.</small>
         </div>
      </div>
      ";
   }

}

?>


<!doctype html>
<html lang="en">
  <head>
 

    <title>SRG Spa | Checkout</title>

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
            <h3 class="header-name ">
                
Complete your Order
            </h3>
            <p class="tiltle-para ">Thanks for choosing us.<br> Kindly fill in recipient info.</p>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Checkout</li>
</ul>
</div>
</div>
    </div>
</section>

<div class="container">
<section class="checkout-form row">
   <div class="display-order col p-4">
      <?php
         $select_cart = mysqli_query($con, "SELECT * FROM `tblcart`");
         $total = 0;
         $grand_total = 0;
         
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['Cost'] * $fetch_cart['Quantity']);
            $grand_total = $total += $total_price;
            }
      ?>
   </div>
   <form action="" method="post" >




      <h3 class="text-align-center">Recipient Info</h3>
      <div class="flex">

         <div class="inputBox">
            <span>Fullname</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>Phone No.</span>
            <input type="number" placeholder="enter your phone number" name="number" required>
         </div>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>Payment method</span> <small>(choose one)</small>
            <select name="method">
               <option value="cash on delivery" selected>Cash on delivery</option>
               <option value="credit cart">Credit Card</option>
               <option value="paypal">Paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Home No.</span>
            <input type="text" placeholder="e.g. 63" name="homeno" required>
         </div>
         <div class="inputBox">
            <span>Street</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>Ward</span>
            <input type="text" placeholder="e.g. Tan Son Nhi" name="ward" required>
         </div>
         <div class="inputBox">
            <span>City</span>
            <input type="text" placeholder="e.g. Ho Chi Minh" name="city" required>
         </div>
      </div>
      <input type="submit" value="Checkout now [$<?= $grand_total; ?>]" name="order_btn" class="btn btn-success btn-lg order-btn">
   </form>

</section>
</div>

<div class="white-space">

</div>
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

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>
