<!DOCTYPE html>
<?php
	
	session_start();
	include("dbcon.php");
	include("include/header.php");
$s_id=$_SESSION['s_id'];
?>
<html>

<head>
	<title>Add Products</title>`

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
<link rel="stylesheet" href="css/footer1.css">


</head>


</script>


</head>
<body>
			<h1 style="text-align: center;">Upload Your Product </h1>
<div class="container" style="margin-bottom: 30px;">
	
<!--<form method="post" action="upload_pic.php" enctype="multipart/form-data" target="image">
		<div  class="col-lg-4" name="image">
			<img src="images/Product_Icon.png" class="img-thumbnail alt="product-image">
		</div>
		<input class="form-control" type="file" name="file" id="file"/>
		<input class="form-control" type="submit" name="submit" value="Upload image"/>
</form>	

--><div class="row">
<div class="col-lg-7">
<form method="post" action="upproduct.php" > 
	<div class="row">

		<div class="col-lg-12" style="padding-left: 0px;padding-right: 0px;">
			
			<h4><label>Product Name </label></h4>	
<input type="text" name="pname" class="form-control" placeholder="Product Name" required>

			<h4><label>Category</label></h4>
			
			<div class="col-lg-4" style="padding-left: 0px;" >

				<h4><label>Category 1</label></h4>
	<select name="category_1" class="form-control"  onchange="fetch_cat1(this.value)" id="sel_1" >
	  <option value="0">SELECT CATEGORY</option>
      <option value="men">MENS</option>
      <option value="women">WOMENS</option>
      <option value="kids">KIDS</option>
      <option value="bags">Bags</option>
    </select>
			</div>
		<div class="col-lg-4" >

				<h4><label>Category 2</label></h4>
			 <select class="form-control" id="2nd_cat" onchange="fetch_cat2(this.value,getElementById('sel_1').value)" name="category_2">
						

          
    		</select>
		</div>

			<div class="col-lg-4" style="padding-right: 0px;">
				<h4><label>Category 3</label></h4>
			 <select class="form-control" id="3th_cat" name="category_3" >
      
   			 </select>
			</div>
			
		</div>			<div class="row">
				


			<div class="col-lg-6">
				<h4><label>price</label></h4>	
<input type="text" name="price" class="form-control" placeholder="price" required>
			</div>

			

			<div class="col-lg-6">
				<h4><label>Brand</label></h4>	

				<select class="form-control" name="brand"> 
					<option value="0">BRAND</option>
					<option value="puma"> PUMA</option>
					<option value="Red Tape"> Red Tape</option>
					<option value="Levi's"> LEVI'S</option>
					<option value="Alberto Torresi"> Alberto Torresi</option>
					<option value="nike"> NIKE</option>
					<option value="adidas"> ADIDAS</option>
						<option value="Winza"> Winza</option>
					<option value="Poushali">Poushali</option>
					<option value="US polo">US POLO</option>
					<option value="Newport">Newport</option>
					<option value="woodlend"> WOODLAND</option>
					<option value="redchief"> REDCHIEF</option>
					<option value="allen solly"> ALLEN SOLLY</option>
					<option value="Pepe Jeans">Pepe Jeans</option>
					<option value="redchief"> REDCHIEF</option>
					<option value="skybags"> SKYBAGS</option>
					<option value="American Tourister">American Tourister</option>
					<option value="Ben Martin">Ben Martin</option>
				</select>
			</div>

			</div>

<LABEL style="    margin-top: 10px;">DESCRIPTION</LABEL>
<input type="text-area" name="desc" class="form-control">

		</div>

<input type="submit" name="submit" class="btn btn-success" style="margin-top: 18px;margin-left: -15px;width: 103%;height: 54px;">

</form>
</div>
<div class="col-lg-4" style="margin-left: 50px;">
<form action="upproduct.php" method="post"  enctype="multipart/form-data">
			<div class="row">

			<h4 align="center"><label>Available Size And Color </label></h4>	
			<div>
				<div class="col-lg-12">
					<label>SIZE</label>
				<select class="form-control" name="size" id="size">
								
				</select>
				</div>
				<div class="col-lg-12">
					<label style="    margin-top: 15px;">COLOR</label>
				<select class="form-control" name="color" style="    margin-top: 5px;">
					<option value="0">color</option>
					<option value="red">RED</option>
					<option value="black">BLACK</option>
					<option value="Brown">Brown</option>
					<option value="gray">GRAY</option>
					<option value="blue">BLUE</option>
					<option value="white">WHITE</option>
					<option value="pink">PINK</option>
					<option value="green">GREEN</option>
					<option value="yellow">YELLOW</option>
				</select>
				</div>

				<div class="col-lg-12">
					<label style="    margin-top: 15px;">UNITS</label>
				<input type="text" name="units" class="form-control" style="    margin-top: 10px;">
				</div>

				<div class="col-lg-12">
					<label style="    margin-top: 15px;">UPLOAD IMAGE</label>
				<input type="file" name="upload_pic" class="form-control" >

				</div>

				</div>	
			</div>


				<input class="btn btn-success" type="submit" name="addmore" value="Add Item" style="margin-top: 28px;margin-left: -15px;width: 103%;height: 54px;">
			</form>
		</div>
		</div>


</div>




</div>

<footer>	
		<?php

				include("include/footer.php");
		?>
	</footer>
<script src="js/category_select.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>



<?php
if(isset($_POST['submit']))
{

$sql = "SELECT  cat_id FROM category WHERE cat_1='$_POST[category_1]' and cat_2='$_POST[category_2]'and cat_3='$_POST[category_3]'";
			$result = mysqli_query($conn,$sql);
			if($result)
				echo "category_id  mili          \n    ";
			else
				echo "category_id ni mili           \n    ";


    // output data of each row
    $row = mysqli_fetch_assoc($result);
    
    $category_id=$row['cat_id'];
	echo $category_id;  
 	
$pname=mysqli_escape_string($conn,$_POST['pname']);
$price=$_POST['price'];
$brand=mysqli_escape_string($conn,$_POST['brand']);
$desc=mysqli_escape_string($conn,$_POST['desc']);



echo "$pname"." <-pname ";
echo "$price"." <-price ";
echo "$brand"." <-brand ";
echo "$desc"." <-desc ";
echo "$s_id"." <-s_id ";




			/////////////////////////////
		$pro_q="INSERT INTO product(pname,s_id,cat_id,price,brand_id,descrp) VALUES('$pname',$s_id,$category_id,$price,'$brand','$desc')";
$result1 = mysqli_query($conn,$pro_q);
	if($result1)
				echo "product inserted  \n ";
			else
				echo " pruduct not inserted \n";




		$pro_id_sql = "SELECT p_id  FROM product WHERE pname='$pname' and cat_id=$category_id and brand_id='$brand'";
			$result2 = mysqli_query($conn,$pro_id_sql);
if($result2)
				echo "product  id mil gai       \n  ";
			else
				echo "product  not id mil gai      \n    ";





    $row = mysqli_fetch_assoc($result2);

		$p_id=$row['p_id'];
		$_SESSION['pid']=$p_id;

/*
	$imagename=$_FILES['upload_pic']['name'];
	
		$tmpname=$_FILES['upload_pic']['tmp_name'];

		
		$img_path="pdimage/".basename($imagename);
		$qry=("INSERT INTO prod_size (p_id, p_size, color,units,prod_img) VALUES ($p_id,'$psize','$pcolor',$punits,'$img_path')");

		$imp=mysqli_query($conn,$qry);


		if($imp)
				echo "product size inserted      \n";
			else
				echo "product size not inserted     \n   ";
		 if(move_uploaded_file($tmpname,$img_path))
			echo"image uploaded";
	   else
		echo"kuch ni ukhda \n";
	*/

}




  if(isset($_POST['addmore']))
  {

$psize=$_POST['size'];
$pcolor=$_POST['color'];
$punits=$_POST['units'];

	$p_id=$_SESSION['pid'];

$sz_av="SELECT * FROM prod_size  WHERE p_id=$p_id and p_size='$psize' and color='$pcolor'";
	 $sec=mysqli_query($conn,$sz_av);
	 if(mysqli_num_rows($sec)>0)  
	 {	
	 	$qry="UPDATE  prod_size set units=units+$punits ";
	 	mysqli_query($conn,$qry);

	 }
	 else
	 {
	 	$qry=(" INSERT INTO prod_size (p_id, p_size, color,units) VALUES ($p_id,'$psize','$pcolor',$punits) " );

		$imp=mysqli_query($conn,$qry);


		if($imp)
				echo "product size inserted ";
			else
				echo "product size not inserted ";

	 }

$qrl="SELECT *FROM PROD_COLOR WHERE p_id=$p_id and p_color='$pcolor'";
$qrl3=mysqli_query($conn,$qrl);
if($qrl3)
echo "ekta";
else
echo "rihan";
if(mysqli_num_rows($qrl3)>0)
{
	

	

}
else
{

		$imagename=$_FILES['upload_pic']['name'];
	
		$tmpname=$_FILES['upload_pic']['tmp_name'];

		
		$img_path="pdimage/".basename($imagename);
		



			$qry1=("INSERT INTO prod_color (p_id, p_color,P_img) VALUES ($p_id,'$pcolor','$img_path')");
			$sec2=mysqli_query($conn,$qry1);
	if($sec2)
	{
	echo "3rd table inserted";

	}
else
	{
		echo "3rd table not  inserted";	
	}

		 if(move_uploaded_file($tmpname,$img_path))
			echo"image uploaded";
	   else
		echo"kuch ni ukhda ";


		}



}