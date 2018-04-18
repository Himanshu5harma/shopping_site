<?php
		session_start();
		if(!isset($_SESSION['phone']))
        {
        	echo '<script>alert("Please Login.!")</script>';
			echo '<script>window.location="index.php"</script>';
        }

include("dbcon.php");

		/*
							
	*/
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<link rel="stylesheet" href="css/bootstrap.min.css">


<link rel="stylesheet" href="css/footer1.css">
<link rel="stylesheet" href="css/carousel.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" >

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/category_select.js"></script>


<style type="text/css">
	
	#h{
		font-size: 28px;
    color: white;
	}
</style>
</head>
<body>
<?php

include("include/header.php");
?>
<?php


$cust_id=$_SESSION['cust_id'];
    
                            		
                               
        $ch="UPDATE prod_size ,order_tbl set units=units-order_tbl.quant, order_tbl.ord_status=1  WHERE prod_size.ps_id=order_tbl.ps_id AND prod_size.p_id=order_tbl.p_id AND order_tbl.ord_status=0 AND order_tbl.cust_id=$cust_id ";
        $r=mysqli_query($conn,$ch);
        $ch1="UPDATE order_tbl set ord_status=1  WHERE ord_status=0 AND cust_id=$cust_id ";
        $r1=mysqli_query($conn,$ch1);
        if($r1)

        
        if($_SESSION['cart']=="empty")
        {
        	echo '<script>alert(" Cart is Empty.")</script>';
			echo '<script>window.location="cart.php"</script>';
        }
        else
        {
        	$phone=$_SESSION['phone'];
		
		
		if($_SESSION['user'] == "customer")
		$q="SELECT email FROM customer WHERE phone=$phone";
		
		$r=mysqli_query($conn,$q);
		$row1=mysqli_fetch_assoc($r);
		$email=$row1['email'];
		
		
		
		$to = "$email";
		$subject = "My subject";
		$txt = "thanks for shopping with us \r\r Your Order  will be delivered with in 4-5 working days";
		$headers = "From: lookbefore.com " . "\r\n" .
		"CC: somebodyelse@example.com";

		$s=mail($to,$subject,$txt,$headers);
		
        }
          /*if($r)
          {
          	$ch1="UPDATE order_tbl set ord_status=1 WHERE cust_id=$cust_id";
      	$r1=mysqli_query($conn,$ch1);
          
          }*/
          


                               
?>
							



<div class="row" align="center">
<div  class="col-lg-6"  style=" height: 410px; margin-left: 442px;background-color: #c1c1c130; margin-top: 100px;   margin-bottom: 100px;">

	<div align="left" style="margin-left: 21px;padding-left: 28px;width: 210%;padding-bottom: 19px;">
<h3 style="text-align: left ; margin-left: 194px;">Thank You For Shopping With Us</h3>
<br/><br/>

<h4 style="margin-left: 170px; color: green;"> Your order will be delivered with in 4-5 working days</h4>
<br/>
<div class="row">
<div class="col-lg-4">
<h3>Your shipping address - </h3>
			

			<?php
			

					
					$k=$_SESSION['phone'];
					$qr="SELECT * FROM customer WHERE phone=$k";
					$r2=mysqli_query($conn,$qr);
					$w=mysqli_fetch_assoc($r2);
					echo "<h4>".$w['ship_add']."</h4><h4>".$w['ship_city'].",".$w['ship_state'].",".$w['ship_count']."</h4>";
					echo "<h4>Pincode-".$w['ship_pin']."</h4>";
					echo "<a href=\"cust_prof.php\" >Edit</a>";
				
			?>
</div>
<div class="col-lg-2" style="display: inline-flex;">
	<img src="images/ship1.png" style="margin-top: 28px; width: 68%; height: 45%;padding-left: 10px;">
</div>
</div>
<div class="row">
	<a href="index.php" class="btn btn-success" style="margin-left: 275px"> Do You Want To Shop More</a>
</div>
</div>

</div>

</div>






<div class="footer">
	<?php
	include("include/footer.php");	
		?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>