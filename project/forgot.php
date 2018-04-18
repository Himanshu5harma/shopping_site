<?php
		session_start();
include("dbcon.php");


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



</head>
<body>
<?php

include("include/header.php");
?>
<div class="row" >
		<div class=" container col-lg-10" style="margin:  80px 0px 135px 198px;  padding-left: 400px;">
			<?php
			if(!isset($_SESSION['ver']))
			$_SESSION['ver']="not";	
			if( $_SESSION['ver']=="not")
			{
			?>
			<h4 style="margin: 0px 0px 30px 120px;">Reset Your Password</h4>
			<form action="forgot.php" method="post" autocomplete="off">
          
        <div class="row" style="display: inline-flex;">
            <div class="input-group input-group-md col-lg-4 ">
          		<span class="input-group-addon" id="sizing-addon1">Phone No*</span>
           			<input type="text" class="form-control" placeholder="Phone No*" name="phone" aria-describedby="sizing-addon1">
			</div>	
			<div class="col-lg-2">
      			<button type="submit" class="btn btn-primary" name="sotp" style="margin-top: 0px; margin-left: 24px;">send OTP</button>
      		</div>
      	</div>
			<div style="text-align:left;margin-top: 25px; margin-left: 150px;">
            
           <label class="radio-inline"><input type="radio" value="sailer" id="check1" name="check_reg"> Sailer</label>
          
          <label class="radio-inline"><input type="radio" value="customer"  name="check_reg">customer</label>
          </div>
         </form> 
       		<form action="" method="post">
         		<div class="row" style="display: inline-flex;">
            <div class="input-group input-group-md col-lg-4 ">
          		<span class="input-group-addon" id="sizing-addon1" style="padding-left: 30px;padding-right: 30px;">OTP*</span>
           			<input type="text" class="form-control" placeholder="OTP*" name="cotp" aria-describedby="sizing-addon1">
			</div>	
			<div class="col-lg-2">
      			<button type="submit" class="btn btn-primary" name="verify" style="margin-top: 0px; margin-left: 24px;">verify OTP</button>
      		</div>
      	</div>

           
      
          </form>

          <?php
      }
         else if($_SESSION['ver']=="ok")
          {?>	
          	</form> 
       		<form action="forgot.php" method="post">
         		<div class="row" style="">
            <div class="input-group input-group-md col-lg-4 ">
          		<span class="input-group-addon" id="sizing-addon1" style="padding-left: 45px;padding-right: 47px;">NEW PASSWORD</span>
           			<input type="password" class="form-control" placeholder="NEW PASSWORD*" name="pass1" aria-describedby="sizing-addon1">
			</div>	
			<div class="input-group input-group-md col-lg-4 " style="    margin-top: 25px;">
          		<span class="input-group-addon" id="sizing-addon1" style="padding-left: 30px;padding-right: 30px;">CONFIRM PASSWORD</span>
           			<input type="password" class="form-control" placeholder="CONFIRM PASSWORD*" name="pass2" aria-describedby="sizing-addon1">
			</div>
			<div class="col-lg-4" style="text-align: right; ">
      			<button type="submit" class="btn btn-primary" name="update" style="margin-top: 25px; margin-left: 24px;">UPDATE</button>
      		</div>
      	</div>
      	

         <?php
         	if(isset($_POST['update']) )
         	{extract($_POST);
         		$phone=$_SESSION['PO'];
         		
         		if($_POST['pass1']==$_POST['pass2'])
         		{$pass=md5($pass1);
         			if($_SESSION['check_reg']=="customer")
         		$t="UPDATE customer SET pass='$pass' WHERE phone=$phone" ;
         	else
         		$t="UPDATE supplier SET pass='$pass' WHERE phone=$phone" ;
         		$s=mysqli_query($conn,$t);
         		if($s){
         			echo '<script>alert("Password Updated.!")</script>';
         			echo '<script>window.location="index.php"</script>';
         			$_SESSION['ver']="not";
         		}
         		}
         		else 
         			echo '<script>alert("Password Not Match.!")</script>';
         		

         	}
          }

          ?>


       	</div>
         
          
          
         
</div>
</div>



<div class="footer" style="position: last; left: 0px;right: 0px;bottom: 0px;">
<?php
	include("include/footer.php");	
		?>		
		

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
	if(isset($_POST['sotp']))
	{	
		$phone=$_POST['phone'];
		$_SESSION['PO']=$phone;
		$_SESSION['check_reg']=$_POST['check_reg'];
		if($_POST['check_reg']=="customer")
		$q="SELECT email FROM customer WHERE phone=$phone";
		else
		$q="SELECT email FROM supplier WHERE phone=$phone";
		$r=mysqli_query($conn,$q);
		$row1=mysqli_fetch_assoc($r);
		$email=$row1['email'];
		$_SESSION['OTP']=rand(1000,9999);
		echo $email;
		$otp=$_SESSION['OTP'];
		$to = "$email";
		$subject = "My subject";
		$txt = "your OTP is - $otp";
		$headers = "From: lookbefore.com " . "\r\n" .
		"CC: somebodyelse@example.com";

		$s=mail($to,$subject,$txt,$headers);
		if($s)
		echo "mail send";
		else
		echo "mail not send";
		echo '<script>window.location="forgot.php"</script>';
	}
	if(isset($_POST['verify']))
	{	echo "kfjlasdkjflkjdsklfjkdsj    ".$_SESSION['OTP'];

		$k=$_POST['cotp'];
		echo "   jkdjflkajflkjdlf".$k;
		if($k==$_SESSION['OTP']){
				$_SESSION['ver']="ok";
			echo '<script>window.location="forgot.php"</script>';		
		}
		
		else{$_SESSION['ver']="not";
			
			echo $_SESSION['ver'];
		echo '<script>alert("Incorrect OTP.!")</script>';
		}
		
	}
?>