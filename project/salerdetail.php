<?php
session_start();
if($_SESSION['user'] == "")
//echo '<script>alert("Log In Form Sailer Account.!")</script>';
  //  echo '<script>window.location="index.php"</script>';
?>
<?php
	include("dbcon.php");
	$phone=$_SESSION['phone'];
	$q1="SELECT * FROM supplier WHERE phone=$phone";
	$r1=mysqli_query($conn,$q1);
	$row1=mysqli_fetch_assoc($r1);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
	<title>Welcome To Lookbefore</title>
</head>
<body>

	<?php
		include("include/header.php");
	?>

	<H1 align="center">Register Your Shop</H1>
<div class="row">
<hr>
		<div  class="col-lg-2">
			

		</div>
	<div class="col-lg-9">
		<form action="salerdetail.php" method="post" id="sailerform1">
		<div class="form-group">
				<div class="row">
						<div class="col-lg-5">
						<h4><label>First Name </label></h4>

						<input type="text" name="fname" class="form-control" placeholder="First Name" required value="<?php echo $row1['s_fname']?>">
						</div>	
						<div class="col-lg-4">
						<h4><label >Last Name </label></h4>

						<input type="text" name="lname" class="form-control"  placeholder="Last Name" required value="<?php echo $row1['s_lname']?>">
						</div>
				</div>
				
				
		</div>

		<div class="form-group">
				<div class="row">
						<div class="col-lg-5">
						<h4><label>Company Name </label></h4>

						<input type="text" name="cname" class="form-control" placeholder="Company Name" required value="<?php echo $row1['comp_name']?>">
						</div>
						<div class="col-lg-4">
						<h4><label >Types of Goods</label></h4>

						<input type="text" name="gtype" class="form-control" placeholder="Goods Type" required value="<?php echo $row1['types_of_goods']?>">
						</div>
						
				</div>
		</div>
		<div class="form-group">
				<div class="row">
						<div class="col-lg-5">
						<h4><label>E-mail</label></h4>

						<input type="email" name="email" class="form-control" placeholder="email" required value="<?php echo $row1['email']?>">
						</div>
						<div class="col-lg-4">
						<h4><label >Phone No.</label></h4>

						<input type="text" name="phone" class="form-control" placeholder="phone no " required value="<?php echo $row1['phone']?>">
						</div>
						
				</div>
		</div>
		
		<div class="form-group ">
				<div class="row">
						<div class="col-lg-9">
							<h4><label>Permanent Address</label></h4>
							<textarea class="form-control" rows="3" name="add1" placeholder="Enter Permanent Address" required value="<?php echo $row1['add1']?>"></textarea>
						</div>
			
				</div>
		</div>

		<div class="form-group ">
				<div class="row">
						<div class="col-lg-9">
							<h4><label>Current Address</label></h4>
							<textarea class="form-control" rows="3" name="add2" placeholder="Enter Current Address" required value="<?php echo $row1['add2']?>"></textarea>
						</div>

				</div>
		</div>
		<div class="form-group">
				<div class="row">
						<div class="col-lg-5">
						<h4><label>City </label></h4>

						<input type="text" name="city" class="form-control" placeholder="City" required value="<?php echo $row1['city']?>">
						</div>
						<div class="col-lg-4">
						<h4><label >Pin Code</label></h4>

						<input type="text" name="pincode" class="form-control" placeholder="pincode" required value="<?php echo $row1['pincode']?>">
						</div>
						
				</div>
		</div>

		<div class="form-group">
				<div class="row">
						<div class="col-lg-5">
						<h4><label>State </label></h4>

						<input type="text" name="state" class="form-control" placeholder="State" required value="<?php echo $row1['state']?>">
						</div>
						<div class="col-lg-4">
						<h4><label >Country</label></h4>

						<input type="text" name="country" class="form-control" placeholder="Country" required value="<?php echo $row1['country']?>">
						</div>
						
				</div>
		</div>
		<div>
			<div class="col-lg-9">
				<button type="submit" form="sailerform1" name="regshop" class="btn btn-success pull-right" data-toggle="modal"  data-target="#regmodal">Register Your Shop</button>
					<?php
						include("regstore.php");
					?>
			</div>
		</div>

		</form>
	</div>
	<div  class="col-lg-1"></div>
</div>

<?php

	if(isset($_POST['regshop']))
	{
		$com=$_POST['cname'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$add1=$_POST['add1'];
		$add2=$_POST['add2'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$pin=$_POST['pincode'];
		$country=$_POST['country'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$gtype=$_POST['gtype']; 
        $qer="UPDATE supplier SET comp_name='$com',s_fname='$fname',s_lname='$lname',add1='$add1',add2='$add2',city='$city',state='$state',pincode=$pin,country='$country',email='$email',types_of_goods='$gtype' WHERE phone=$phone";
		
		$run=mysqli_query($conn, $qer);
			if($run)
				echo "inserted";
			else
				echo "not inserted";

			mysqli_close($conn);

	}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
