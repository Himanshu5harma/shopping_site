
<style type="text/css">
	
	.dropdown-toggle{
		color: white;
	}
</style>
	<div>
    <nav class ="" style="background-color: black !important;" >
      `<div class="row">
				<div class="row">
			<div class ="container-fluid">
					<div class="navbar-header col-lg-3" >
						<a class="navbar-brand" href="index.php"> <img src="images/logo.jpg" style="width: 223px;margin-top: -35px;margin-left: -16px;"> </a>
        
					</div>
					<form  method="post" action="product.php">
				<div class ="col-lg-5" >
					<div class="input-group">
      <input type="text" class="form-control" placeholder="Search for..." name="search">
      <span class="input-group-btn">
       <input type="submit" name="go" value="GO!" class="btn btn-default"> 

      </span>
    </div>
  </div>
  </form>
					<?php
					if(isset($_POST['logout']))
					{echo "hello";
					echo '<script>alert("destoy")</script>'; 
						session_destroy();

						if(isset($_SESSION['phone']))
						{
							header("location:index.php");
						}
					}
					
					?>

				<div class ="col-lg-4" style="padding-right: 50px;">
					<?php
					if(isset($_SESSION['phone'])){?>
					<h4 style="color: white; display: inline; padding-left: 70px;"><span class="glyphicon glyphicon-user"></span><a style="color: white;"href="<?php if($_SESSION['user']=="customer") echo "cust_prof.php";
					else echo "salerdetail.php";
					?>"> <?php
							 echo $_SESSION['fname']." ".$_SESSION['lname'];?> </a></h4>
							 <form method="post" action="index.php" style="display: inline;">
							 <button class="btn btn-primary  btn-md pull-right" type="submit" name="logout" >
					<span class="glyphicon glyphicon-log-out"></span> Logout
					</button> </form><?php
					}
					else 
					{?>
					<button class="btn btn-primary  btn-md pull-right" type="button" data-toggle="modal" data-target="#loginModal">
					<span class="glyphicon glyphicon-log-in"></span> LogIn or Sign Up
					</button><?php
					include("include/login_modal.php");

					}

					?>

				</div>
				</div>
				
			</div> 
				</div>
			<div class="row">
			<div class ="col-lg-10">
		<ul class="nav nav-pills nav-justified">
  			<li><li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">MENS
     <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="product.php?cat1=men&cat2=Shoes">Shoses</a></li>
      <li><a href="product.php?cat1=men&cat2=shirt">Shirts</a></li>
      <li><a href="product.php?cat1=men&cat2=tshirt">T-shirt</a></li>
		<li><a href="product.php?cat1=men&cat2=jean">Jean</a></li>
		<li><a href="product.php?cat1=men&cat2=kurta">Kurta</a></li>
    </ul> </li>
		    <li class ="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">WOMENS<span class="caret"></span></a>
		    	<ul class="dropdown-menu">
		    	<li><a href="product.php?cat1=women&cat2=tshirt">T-Shirts</a></li>
      <li><a href="product.php?cat1=women&cat2=shirt">Shirts</a></li>
      <li><a href="product.php?cat1=women&cat2=kurta">Kurtas</a></li>
		<li><a href="product.php?cat1=women&cat2=saree">Saree</a></li>
		<li><a href="product.php?cat1=women&cat2=top">Top</a></li>
		
		    </ul>

		    </li>




		    <li class ="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">KIDS<span class="caret"></span></a>
		    		<ul class="dropdown-menu">
		    	<li><a href="product.php?cat1=kids&cat2=tshirts">T-Shirts</a></li>
      <li><a href="product.php?cat1=kids&cat2=pant">pants</a></li>
      
		    </ul>

		    </li>
            <li class ="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">BAGS<span class="caret"></span> </a>
            	<ul class="dropdown-menu">
		    	<li><a href="product.php?cat1=bags&cat2=luggege_bag">Luggage Bags</a></li>
      			<li><a href="product.php?cat1=bags&cat2=bag_packs">Bag Pack</a></li>
      			<li><a href="product.php?cat1=bags&cat2=t_Bag">Tracking Bags</a></li>
				</ul>



            </li>
            
		</ul>
		
		</div >
		<div class="col-lg-2" style="padding-right: 50px;">
			<?php if(isset($_SESSION['user'])){?>
					<a class="btn btn-primary  btn-md pull-right  " type="submit"  href="<?php if($_SESSION['user']=="customer") echo "cart.php";
					else echo "upproduct.php";
					?>"> 
								 <?php if($_SESSION['user']=="customer") echo "<span class=\"glyphicon glyphicon-shopping-cart\"></span>Cart";
					else if($_SESSION['user']=="sailer") echo "Add Product";
					?>
						</a> <?php } ?>
		</div>
			</div>
	  
	  </div>
      
    </nav>
    </div>
   
<?php

function cat_ser( $cat_1,$cat_2)
{	/*echo $cat_1;
		echo $cat_2;*/
	$_SESSION['cat1']=$cat_1;
	$_SESSION['cat2']=$cat_2;
	
	/*echo $_SESSION['cat1'];
	echo $_SESSION['cat2'];*/
}
 if(isset($_GET['cat1']) and isset($_GET['cat2'])){
 	cat_ser($_GET['cat1'],$_GET['cat2']);
 }

