<?php
		session_start();
if(!isset($_SESSION['phone']))
{
	echo '<script>alert("login first ")</script>';
	echo '<script>window.location="index.php"</script>';
}
else if($_SESSION['user']=="sailer")
{
	echo '<script>alert(" First login form customer account ")</script>';
	echo '<script>window.location="index.php"</script>';
}

		include("dbcon.php");
		
		if(isset($_POST["add_to_cart"]))  
 {  	
 	$ps=$_POST["size"];
	$pc=$_POST["color"];
 	$q1="SELECT ps_id FROM prod_size  WHERE color='$pc' and p_size='$ps'";
 	$r1=mysqli_query($conn,$q1);
 	$row1=mysqli_fetch_assoc($r1);
 	$ps_id=$row1['ps_id'];
 	$p_id=$_GET["id"];
 	$cust_id=$_SESSION['cust_id'];
 	$q2="SELECT * FROM  order_tbl WHERE ps_id=$ps_id and p_id=$p_id and ord_status=0";
 	$r2=mysqli_query($conn,$q2);
 	
 	if (mysqli_num_rows($r2) > 0) {
    
    		echo '<script>alert("Item Already Added")</script>';  
	}
	else
	{	
		/*$q4="SELECT MAX(order_id) as order_id FROM  order_tbl WHERE cust_id=$cust_id";
		$r4=mysqli_query($conn,$q4);
		if (mysqli_num_rows($r4) > 0) {
    
    		$row4=mysqli_fetch_assoc($r4);
    		$ord_no=$row4['order_id']+1;
		}
		else
		{
			$ord_no=1;
		}*/	
		//echo $ord_no;
		extract($_POST);
		$pname=mysqli_escape_string($conn,$hidden_name);
		$total=$quantity*$hidden_price;
		$date=date("Y-m-d");
		$time=date("h:i:s");
		$flag=0;
		if($quantity>90)

		{$flag=1;
			echo '<script>alert(" Item out of  stock ")</script>';
	echo '<script>window.location="cart.php"</script>';
		}
		/*$q3="INSERT INTO order_tbl VALUES ($cust_id,$ord_no,$ps_id,$p_id,'$hidden_name',$quantity,$hidden_price,$total,0,$date,$time)";
		*/if($flag==0){
			$q3="INSERT INTO `order_tbl`(`cust_id`, `ps_id`, `p_id`, `p_name`, `quant`, `price`, `total`, `ord_status`) VALUES ($cust_id,$ps_id,$p_id,'$pname',$quantity,$hidden_price,$total,0)";
			$r3=mysqli_query($conn,$q3);
		}
		
	}

     } 


if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
      	$cust_id=$_SESSION['cust_id'];echo $cust_id;

      	$k_id=$_GET["p_id"]; echo $k_id;

      	$ks_id=$_GET["ps_id"]; echo $ks_id;
           $q6="DELETE FROM order_tbl WHERE p_id=$k_id and ps_id=$ks_id and cust_id=$cust_id and ord_status=0";
           $r6=mysqli_query($conn,$q6);
            

      }  
 }  
 ?>  




<!DOCTYPE html>
<html>
<head>
	<title>CART</title>
<link rel="stylesheet" href="css/bootstrap.min.css">


<link rel="stylesheet" href="css/footer1.css">
<link rel="stylesheet" href="css/carousel.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" >

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/category_select.js"></script>


</head>
<body>
	<?php
		include("include/header.php");
	?>

	<div class="container">
		
				<h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php $cust_id=$_SESSION['cust_id'];
                          $q5="SELECT * FROM order_tbl WHERE cust_id=$cust_id and ord_status=0";
                          $r5=mysqli_query($conn,$q5);
                          


                          if(mysqli_num_rows($r5)>0)  
                          {  $_SESSION['cart']="full";
                               $total = 0;  
                               while($row5=mysqli_fetch_assoc($r5))
                               {  $k1=$row5["p_id"];$k2=$row5["ps_id"];
                          ?>  
                          <tr>  
                               <td><?php echo $row5["p_name"]; ?></td>  
                               <td><?php echo $row5["quant"]; ?></td>  
                               <td>&#8377; <?php echo " ".$row5["price"]; ?></td>  
                               <td>&#8377; <?php echo " ".number_format($row5['total'], 2); ?></td>  
                               <td><?php echo"<a href=\"cart.php?action=delete&p_id=".$k1."&ps_id=".$k2."\">";?> <span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + $row5['total'];  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">&#8377;<?php echo " ".number_format($total, 2); ?> </td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }
                          else
                          $_SESSION['cart']="empty";  
                          ?>  
                     </table>  
                </div>
               <div align="center">
               	<a class="btn btn-success " href="checkout.php"> Proceed To Checkout </a>  
               </div>
	</div>
	<footer style=" position: fixed;bottom: 0px;left: 0px;right: 0px;">
<?php

include("include/footer.php");
?>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>