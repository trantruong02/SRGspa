<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
    header('location:logout.php');
} else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/images/lotus.png" />
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <title>SRG Spa | Order Details</title>
    <style>
        .order-detail {
            margin-top: 305px !important;
        }
    </style>
</head>
<body> 
    <div class='order-message-container'>
        <div class='message-container'>
            <?php
            $id = $_GET['ID'];
            $query = mysqli_query($con, "SELECT * FROM tblorder WHERE ID = $id"); 
            while($row=mysqli_fetch_array($query))
            { ?>
            <div class='order-detail'>
                <span> <?= $row['Total_prod']; ?></span>
                <span class='total'> total : $<?=  $row['Total_cost']; ?></span>
            </div>
            <div class='customer-details'>
                <p> Fullname : <span> <?= $row['Name']; ?> </span> </p>
                <p> Phone number : <span> <?= $row['Phone']; ?> </span> </p>
                <p> Email : <span> <?= $row['Email']; ?> </span> </p>
                <p> Address : <span> <?= $row['HomeNo']; ?> </span> </p>
                <p> your payment mode : <span> <?= $row['Method']; ?> </span> </p>
                <p>Status:
                    <?php if($row['Status'] == "Confirmed") { ?>
                        <span class=" mx-3 bg-success text-dark rounded"><?= $row['Status'];?> </span></p>
                    <?php } else { ?>
                        <span>Confirming</span></p>
                    <?php } ?>
                <hr>
                <p>Thank you for choose us. 
                    <br>SRG With Love <3                        
                </p>
            </div>
            <a href='order-history.php' class='btn btn-success'>Back</a>
            <?php  } ?>   
        </div>
    </div>

</body>
</html><?php } ?>