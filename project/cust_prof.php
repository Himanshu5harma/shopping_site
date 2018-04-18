
<?php

session_start();
if(!isset($_SESSION['phone']))
{
	echo '<script>alert(" First login  ")</script>';
	echo '<script>window.location="index.php"</script>';
}
include("dbcon.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>

	</title>

<link rel="stylesheet" href="css/footer1.css">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/carousel.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
<style type="text/css">
	
.row1{
	display: inline-flex;
	

}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/category_select.js"></script>

</head>
<body>
	<?php 
	include("include/header.php");
			$c_phone=$_SESSION['phone'];
			$cust_query="SELECT * FROM customer WHERE phone=$c_phone";
			$result=mysqli_query($conn,$cust_query);
			$row= mysqli_fetch_assoc($result)
			//$row['cust_id'];

	 ?>
	 <div>
<div class="container">
	<div class="jumbotron">
				<h3>Edit Your Profile</h3>
	<div align="center"><img class="img-circle" src="images/profile-icon.png" style="width: 200px; height: 200px;"></div>
<ul  class="dropdown-menu"
style="color: black;">			<li class="divider"></li></ul>

		

					<div class="">
						<form method="post" action="cust_prof.php">
		<div  class="group">
				<div  class="row1"  style="padding-top: 10px;">
				<div class="input-group input-group-md col-lg-6" style="padding: 5px; ">
			<span class="input-group-addon s1">First Name</span><input  class="form-control" type="text" name="cfname" value=" <?php echo $row['c_fname']; ?>">
		</div>
		<div class="input-group input-group-md col-lg-6" style="padding: 5px;">
			<span class="input-group-addon s1">Last Name </span><input  class="form-control" type="text" name="clname" value=" <?php echo $row['c_lname']; ?>">
		</div>
			</div>
			<div  class="row1" >
		<div class="input-group input-group-md" style="padding: 5px;">
			<span class="input-group-addon s1" style="padding-left: 26px;
    padding-right: 26px;">   Phone   </span><input  class="form-control" type="text" name="phone" value=" <?php echo $row['phone'];?>">
		</div>
		<div class="input-group input-group-md " style="padding: 5px">
		<span class="input-group-addon s1" style="padding-left: 26px;
    padding-right: 27px;">E-mail</span><input  class="form-control" type="email" name="email" value=" <?php echo $row['email'];?>">
		</div>
			</div>

		</div>							
		<h4 class="text-info">Permanent Address </h4>
		<div class="row1">
		<div class="input-group input-group-md " style="padding: 5px;">
			<span class="input-group-addon s1">Flat no./streat</span><input type="text" name="add1" class="form-control">
		</div>
		<div class="input-group input-group-md " style="padding: 5px;">
			<span class="input-group-addon s1">LandMark/Town</span><input type="text" name="add2" class="form-control">
		</div>
	</div>
		<div  class="row1" style="padding-top: 10px">
		<div class="input-group input-group-md " style="padding: 5px;">
			<span class="input-group-addon s1" style="    padding-left: 27px;
    padding-right: 27px;">State</span><input  class="form-control" type="text" name="state" value=" <?php echo $row['state'];?>">
		</div>
		<div class="input-group input-group-md" style="padding: 5px;">
			<span class="input-group-addon s1" style="padding-left: 27px;
    padding-right: 27px;">City</span><input  class="form-control" type="text" name="city" value=" <?php echo $row['city'];?>">
		</div>									
		<div class="input-group input-group-md" style="padding: 5px;">
			<span class="input-group-addon s1">Pin Code</span><input  class="form-control" type="text" name="pincode" value=" <?php echo $row['pincode'];?>">
		</div>									
		<div class="input-group input-group-md" style="padding: 5px;">
			<span class="input-group-addon s1">Country</span><input  class="form-control" type="text" name="country" value=" <?php echo $row['country'];?>">
		</div>	
		</div>									
		<h4 class="text-info"> Shipping Address </h4>
		<div class="row1" >
		<div class="input-group input-group-md " style="padding: 5px;">
			<span class="input-group-addon s1">Flat no./streat</span><input type="text" name="ship_add1" class="form-control">
		</div>
		<div class="input-group input-group-md " style="padding: 5px;">
			<span class="input-group-addon s1">LandMark/Town</span><input type="text" name="ship_add2" class="form-control">
		</div>
	</div>

		<div  class="row1" style="padding-top: 10px">					
		<div class="input-group input-group-md" style="padding: 5px;">
			<span class="input-group-addon s1" style="    padding-left: 27px;
    padding-right: 27px;">State</span><input  class="form-control" type="text" name="ship_state" value=" <?php echo $row['ship_state'];?>">
		</div>		
		<div class="input-group input-group-md" style="padding: 5px;">
			<span class="input-group-addon s1" style="    padding-left: 27px;
    padding-right: 27px;">City</span><input  class="form-control" type="text" name="ship_city" value=" <?php echo $row['ship_city'];?>">
		</div>									
		<div class="input-group input-group-md" style="padding: 5px;">
			<span class="input-group-addon s1">Pin Code</span><input  class="form-control" type="text" name="ship_pincode" value=" <?php echo $row['ship_pin'];?>">
		</div>								
		<div class="input-group input-group-md" style="padding: 5px;">
			<span class="input-group-addon s1">Country</span><input  class="form-control" type="text" name="ship_country" value=" <?php echo $row['ship_count'];?>">
		</div>							
		</div>						
								<div  align="center" style="padding-top: 20px ">
									<input type="submit" name="submit" class="btn btn-success " >	
								</div>	
								
						</form>
					</div>

	</div>
	

</div>
</div>

<footer style=" ">	
		<?php

				include("include/footer.php");
		?>
	</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php 
		if(isset($_POST['submit']))
		{	$id=$row['cust_id'];
			extract($_POST);
			$email=mysqli_escape_string($conn,$email);
				$p_add=$add1." ".$add2;
				$sh_add=$ship_add1."".$ship_add2;
			$u_qu="UPDATE customer SET c_fname='$cfname',c_lname='$clname',add1='$p_add',city='$city',state='$state',pincode=$pincode,country='$country',email='$email',ship_add='$sh_add',ship_city='$ship_city',ship_state='$ship_state',ship_count='$ship_country',ship_pin=$ship_pincode  WHERE cust_id=$id";
			$result=mysqli_query($conn,$u_qu);
			if($result)
				echo "hello";
			else
				echo "bahg ja ";
			if($result)
			{
				$_SESSION['fname']=$cfname;
				$_SESSION['lname']=$clname;
			}
			
		}

 ?>