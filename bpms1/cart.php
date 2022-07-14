<?php

session_start();
error_reporting(0);
include('includes/dbconnection.php');

// $select_rows = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
// $row_count = mysqli_num_rows($select_rows);

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($con, "UPDATE `tblcart` SET Quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($con, "DELETE FROM `tblcart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($con, "DELETE FROM `tblcart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>SRG Spa | Your Cart</title>
    
    <!-- Template CSS -->    
    <link rel="shortcut icon" href="assets/images/lotus.png" />
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/cart.css">
  </head>
  <body id="home">
  <?php

    if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
    };

?>

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
                <h3 class="header-name ">Shopping cart</h3>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-sub">
        <div class="container">   
            <ul class="breadcrumbs-custom-path">
                <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
                <li class="active ">Cart</li>
            </ul>
        </div>
    </div>
</section>

<div class="container">

<section class="shopping-cart">
<table class="table">

  <thead class="thead-dark">
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Action</th>

    </tr>
  </thead>

  <tbody>

         <?php 
         
         $select_cart = mysqli_query($con, "SELECT * FROM `tblcart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <th><img src="admin/images/<?php echo $fetch_cart['Image']; ?>" height="100" alt=""></th>
            <th><?php echo $fetch_cart['Name']; ?></th>
            <th>$<?php echo number_format($fetch_cart['Cost']); ?></th>
            <th>
               <form action="" method="POST">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['ID']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['Quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </th>
            <th>$<?php echo $sub_total = number_format($fetch_cart['Cost'] * $fetch_cart['Quantity']); ?></th>
            <th><a href="cart.php?remove=<?php echo $fetch_cart['ID']; ?>" onclick="return confirm('Remove item from Cart?')" class="delete-btn"> Remove</a></th>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>

         <thead class="thead">
            <tr>
               <th scope="col"><a href="products.php" class="option-btn" style="margin-top: 0;">Continue shopping</a></th>
               <th scope="col"></th>
               <th scope="col"></th>
               <th scope="col">Grand total</th>
               <th scope="col">$<?php echo $grand_total; ?></th>
               <th scope="col"><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> Delete all </a></th>
               

            </tr>
         </thead>
      </tbody>
</table>


   <div class="checkout-btn">
      <a href="checkout.php" class="btn btn-success <?= ($grand_total > 1)?'':'disabled'; ?>">Checkout now</a>
   </div>

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
