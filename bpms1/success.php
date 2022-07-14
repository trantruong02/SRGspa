<?php
    session_start();
    require 'includes/dbconnection.php';
    include_once('includes/header.php');

    $user_id = $_SESSION['bpmsuid'];
    $confirm_query = "UPDATE tblistbill SET status='Confirmed' WHERE user_id = $user_id";
    $confirm_query_result = mysqli_query($con,$confirm_query) or die(mysqli_error($con));
?>

<div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <p>Your order is confirmed. Thank you for shopping with us. <a href="products.php">Click here</a> to purchase any other item.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
