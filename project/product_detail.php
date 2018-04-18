
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html >
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">



<link rel="stylesheet" href="css/carousel.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/footer1.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
<!--<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/category_select.js"></script>
<title>PRODUCT DETAIL</title>


<style type="text/css">
	.s1{    margin-left: 40px;
		margin-top: 10px;
    display: inline-flex;
    width: 100px;
	}
	.a1{
		    margin-left: 40px;
	}

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
		height:127px !important;
	}
	.thumbnail{
		display: flex;
		width: 70%;
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
</head>
<script type="text/javascript">
	function setcolor(str,str1) {
			
		var req=new XMLHttpRequest();
		req.open("get","http://localhost/project/php_file/setcolor.php?color="+str+"&p_id="+str1,true);
		req.send();
		req.onreadystatechange=function(){

			if(req.readyState==4 && req.status==200)
			{ 

				
				document.getElementById("img").src=req.responseText;

			}
		};

}
</script>

<body>

<?php
session_start();
include("include/header.php");
include("dbcon.php");
?>
<?php
		$pid=$_GET['pid'];
		$query1="SELECT p.p_id,p.pname,p.price,p.brand_id,pc.p_img,p.descrp FROM product p,prod_color pc WHERE pc.p_id=$pid and p.p_id=$pid";
			$result=mysqli_query($conn,$query1);
			$row= mysqli_fetch_assoc($result);
?>
<div class="row" style="margin-top: 40px;">
	<div class="col-lg-1"></div>
	<form action="cart.php?action=add&id=<?php echo $row["p_id"]; ?>" method="post"> 
	<div class="col-lg-4">
		<div class="thumbnail" style="box-shadow: 0 10px 15px #ddd !important;    width: 350px; height: 552px; margin-left: 146px;margin-top: 40px;">
			<div class="card-shop">
				<img src="<?php echo $row['p_img']; ?> " style="    width: 340px; height: 543px;" id="img" >
			</div>
		</div>
	</div>

<div class="col-lg-1"></div>
	<div class="col-lg-5" style="display: inline; border: 1px solid #333; background-color: #9993930d; border-radius: 5px;padding: 16px; margin-bottom: 45px;" align="left-center">
		<h2 class="text-info a1"> <?php echo $row['pname']; ?></h2>
		<hr style="width: 91%;">
		<h4 class="a1">M.R.P.: <strike><?php echo "&#8377; ".($row['price']+1000);?></strike></h4>
		 <h4 class="a1" style="display: inline-flex;">Price: </h4> <h3 id="price" class="text-danger" style="display: inline;"><?php echo "&#8377; ".$row['price'];?></h3> & Free Return on some sizes and colors Inclusive of all taxes<br>
		 <h4  class="a1" style="display: inline-flex;">You Save: <?php echo "&#8377; ".(1000);?></h4><h4 class="text-danger" style="display: inline;"><?php echo" (".(int)((1000*100)/($row['price']+1000))."%)";?></h4><br>
		<h4 class="a1" style="display: inline;">Brand :</h4> <h4 id="Brand" style="display: inline-flex;"><?php echo $row['brand_id'];?></h4><br>
		
		<h3 class="a1 text-success" style="display: inline;">In stock -</h3><br>

		<ul class="list" style="margin-top: 10px;">
			<li><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $row['descrp'];?></li>	
		<li><span class="glyphicon glyphicon-chevron-right"></span> Pattern : Printed</li>	
		<li><span class="glyphicon glyphicon-chevron-right"></span>  Fabric : Rayon Moss</li>
		<li><span class="glyphicon glyphicon-chevron-right"></span>  Fit : Regular Fit</li>
		<li><span class="glyphicon glyphicon-chevron-right"></span>  Look absolutely stunning wearing this printed dress with high heels and minimal jewellery.	</li>
		</ul>
		
	
	

		<input  type="text" name="quantity" class="form-control a1" value="1" style="width: 36%;">
		<input type="hidden" name="hidden_name" class="form-control" value="<?php echo $row['pname'];?>">
		<input type="hidden" name="hidden_price" class="form-control" value="<?php echo $row['price'];?>">
		<input type="hidden" name="hidden_id" class="form-control" id="pid" value="<?php echo $row['p_id'];?>">
		
		<div>

		<select class="form-control s1" id="size" name="size">
			<?php $pid1=$row['p_id'];
					$size_q="SELECT DISTINCT p_size FROM prod_size WHERE p_id=$pid1";
					$r=mysqli_query($conn,$size_q);
					while ($row2=mysqli_fetch_assoc($r)) {
								echo "<option value=\"".$row2['p_size']."\">".$row2['p_size']."</option>";
							}		
			 ?>
		</select>
			<script type="text/javascript"> $a=document.getElementById("pid").value; </script>
		<select class="form-control s1" id="color" name="color" onchange="setcolor(this.value,$a)">
			<?php $pid1=$row['p_id'];
					$color_q="SELECT DISTINCT color FROM prod_size WHERE p_id=$pid1";
					$r1=mysqli_query($conn,$color_q);

					
					while ($row3=mysqli_fetch_assoc($r1)){
						
								echo "<option value=\"".$row3['color']."\">".$row3['color']."</option>";
							}		
			 ?>
		</select>

			<br><br><br><br><br>
			<input type="submit" name="add_to_cart" class="btn btn-success a1" value="Add To Cart">   
		</div>
	</div>



	</form>
	
</div>

<hr>
<div class="row" >
			
			<div style="margin-left: 50px;">
				<h3>Special offers and product promotions:</h3>
			</div>
			<hr>
			<div class="row">
			<div><label class="text-primary" style="padding-left: 100px;font-size: 19px;">Today's Deal</label>
				<a href="product.php?cat1=women&cat2=shirt" style="padding-left: 10px;"> See all</a>
			</div>
				<div class="col-8-lg" style="margin-right: -216px;
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


</div>


		
		
		
		
		



<?php

include('include/footer.php');
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>