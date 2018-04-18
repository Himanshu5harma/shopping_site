<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<!--

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!---********************************************************* -->
<html >
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/footer1.css">
<!--<link rel="stylesheet" href="css/carousel.css">-->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
<!--<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/category_select.js"></script>
<title>LOOK BEFORE SHOPING</title>
<style type="text/css">
	.h3{
		color: white;
	}
.i{
	width: 100%;
}

.product {
		background-color: white;
	}
	.myshoping-img > a > .image
	{
		height:250px !important;
	}
	.thumbnail{
		display: flex;
		box-shadow: 0 10px 15px #ddd !important;
	}
	.card-shop{
		flex-grow: 1;
   	 flex-basis: 100px;
	}
	.thumbnail a>img, .thumbnail>img {
    display: block;
}

</style>
<script type="text/javascript">
	// Carousel Auto-Cycle
  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 6000
    })
  });



</script>
</head>
<?php
   //include("dbcon.php");
   session_start();

		 if (isset($_POST['login'])) { 

        require 'php_file/login.php';
        
    }
    elseif (isset($_POST['register'])) { 
        echo "register pressed";
        require 'php_file/register.php';
        
    }


?>

<body>

<?php
include("dbcon.php");
include("include/header.php");

?>




<div class="carousel slide" id="sonal" style="height:60% ;    margin-top: 0px;  ">
				<ol class="carousel-indicators">
					<li  data-target="#sonal" data-slide-to="0"></li>
					<li  data-target="#sonal" data-slide-to="1"></li>
					<li  data-target="#sonal" data-slide-to="2"></li>
				</ol>
					<div class="carousel-inner">
						<div class="item  active">
							<img class="img-responsive i center-block" src="images/slide/img.jpeg" alt="First slide" style="height:100%">
						</div>
						<div class="item">
							<img class="img-responsive i center-block" src="images/slide/img1.jpeg" alt="Second slide" style="height:100%">
						</div>
						<div class="item">
							<img class="img-responsive i center-block" src="images/slide/s1.jpg" alt="Third slide" style="height:100%">
						</div>
					</div>

						<a class="left carousel-control" href="#sonal" data-slide="prev">
						<span class="icon-prev"></span></a>
						
						<a class="right carousel-control" href="#sonal" data-slide="next">
						<span class="icon-next"></span> </a>
		
</div>
<hr style="margin-left: 60px;margin-right: 60px;">

		<div class="row">
			<div><label class="text-primary" style="padding-left: 100px;font-size: 19px;">Today's Deal</label>
				<a href="product.php?cat1=women&cat2=shirt" style="padding-left: 10px;"> See all</a>
			</div>
				<div class="col-7-lg" style="margin-right: -216px;
    margin-left: 102px;">
						<?php
						$query1="SELECT p.p_id,p.pname,p.price,p.brand_id,pc.p_img FROM category c,product p,prod_color pc WHERE cat_1='women' and cat_2='shirt' and p.cat_id=c.cat_id and p.p_id=pc.p_id";
		$result=mysqli_query($conn,$query1);

								for($j=0;$j<5;$j++)
          { 
          		if($row1= mysqli_fetch_assoc($result)){
                  

          		echo "<div class=\"col-lg-2 col-md-3 col-sm-6 col-xs-6 \" style=\"display:inline;\">
                <div class=\"thumbnail\">
                <div class=\"card-shop\">
                <div class=\"caption\">
                  <h4>".$row1['pname']."</h4>
                </div>
                <div class=\"myshoping-img\">
                  <a href=\"#\"><img src=\"".$row1['p_img']."\" alt=\"\" class=\" image\"></a>
                </div>
                <div class=\"caption\" align=\" center\">
                  <h4>"."&#8377; ".$row1['price']."</h4>
                  <p>"."Brand-".$row1['brand_id']."</p>
                  <a class=\"btn btn-success\" href=\"product_detail.php?pid=".$row1['p_id']."\">» BUY NOW</a>
                </div>
                            </div>
                        </div>
                        </div>";


          }
          
          	
           }

						?>
				</div>
	
		</div>
<hr style="margin-left: 60px;margin-right: 60px;">
<img src="images/add/add5.jpg" style="width: 87%;margin-left: 117px;">

<hr style="margin-left: 60px;margin-right: 60px;">
<div class="row">
	<div><label class="text-primary" style="padding-left: 100px;font-size: 19px;">Today's Deal</label>
				<a href="product.php?cat1=men&cat2=tshirt" style="padding-left: 10px;"> See all</a>
			</div>
				<div class="col-7-lg" style="margin-right: -216px;
    margin-left: 102px;">
						<?php
						$query1="SELECT p.p_id,p.pname,p.price,p.brand_id,pc.p_img FROM category c,product p,prod_color pc WHERE cat_1='men' and cat_2='tshirt' and p.cat_id=c.cat_id and p.p_id=pc.p_id";
		$result=mysqli_query($conn,$query1);

								for($j=0;$j<5;$j++)
          { 
          		if($row1= mysqli_fetch_assoc($result)){
                  

          		echo "<div class=\"col-lg-2 col-md-3 col-sm-6 col-xs-6 \" style=\"display:inline;\">
                <div class=\"thumbnail\">
                <div class=\"card-shop\">
                <div class=\"caption\">
                  <h4>".$row1['pname']."</h4>
                </div>
                <div class=\"myshoping-img\">
                  <a href=\"#\"><img src=\"".$row1['p_img']."\" alt=\"\" class=\" image\"></a>
                </div>
                <div class=\"caption\" align=\" center\">
                  <h4>"."&#8377; ".$row1['price']."</h4>
                  <p>"."Brand-".$row1['brand_id']."</p>
                  <a class=\"btn btn-success\" href=\"product_detail.php?pid=".$row1['p_id']."\">» BUY NOW</a>
                </div>
                            </div>
                        </div>
                        </div>";


          }
          
          	
           }

			?>
				</div>
	
	</div>

		<div style="margin-left: 75px;margin-top: 30px;smargin-bottom: 30px;">
			<img src="images/add/add6.jpg" style="width: 15%;margin-left: 117px;display: inline-flex;">
			<img src="images/add/add7.jpg" style="width: 15%;margin-left: 117px; display: inline-flex;">
			<img src="images/add/add8.jpg" style="width: 15%;margin-left: 117px;display: inline-flex;">
			<img src="images/add/add9.jpg" style="width: 15%;margin-left: 117px;display: inline-flex;">
		</div>

<hr style="margin-left: 60px;margin-right: 60px;">

<div class="row">
	<div><label class="text-primary" style="padding-left: 100px;font-size: 19px;">Today's Deal</label>
				<a href="product.php?cat1=men&cat2=tshirt" style="padding-left: 10px;"> See all</a>
			</div>
				<div class="col-7-lg" style="margin-right: -216px;
    margin-left: 102px;">
						<?php
						$query1="SELECT p.p_id,p.pname,p.price,p.brand_id,pc.p_img FROM category c,product p,prod_color pc WHERE cat_1='bags' and cat_2='bag_packs' and p.cat_id=c.cat_id and p.p_id=pc.p_id";
		$result=mysqli_query($conn,$query1);

								for($j=0;$j<5;$j++)
          { 
          		if($row1= mysqli_fetch_assoc($result)){
                  

          		echo "<div class=\"col-lg-2 col-md-3 col-sm-6 col-xs-6 \" style=\"display:inline;\">
                <div class=\"thumbnail\">
                <div class=\"card-shop\">
                <div class=\"caption\">
                  <h4>".$row1['pname']."</h4>
                </div>
                <div class=\"myshoping-img\">
                  <a href=\"#\"><img src=\"".$row1['p_img']."\" alt=\"\" class=\" image\"></a>
                </div>
                <div class=\"caption\" align=\" center\">
                  <h4>"."&#8377; ".$row1['price']."</h4>
                  <p>"."Brand-".$row1['brand_id']."</p>
                  <a class=\"btn btn-success\" href=\"product_detail.php?pid=".$row1['p_id']."\">» BUY NOW</a>
                </div>
                            </div>
                        </div>
                        </div>";


          }
          
          	
           }

			?>
			</div>
	</div>




<?php

//include('include/product-caruosal.php');
?>


<footer ">
<?php

include('include/footer.php');
?>
</footer>
<!--<script src="js/jquery-3.1.1.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>


</body>
</html>