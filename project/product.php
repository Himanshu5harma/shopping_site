<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">



<link rel="stylesheet" href="css/footer1.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
<!--<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/category_select.js"></script>
<title>LOOK BEFORE SHOPING</title>
<style type="text/css">
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

</head>


<body>

<?php
include("include/header.php");
include("dbcon.php");
?>
<div class="container  ">
	<?php
				if(isset($_POST['go']))
				{
						$search=$_POST['search'];
						$query2="SELECT p.p_id,p.pname,p.price,p.brand_id,pc.p_img,c.cat_1,c.cat_2 FROM category c,product p,prod_color pc WHERE match(pname,brand_id,descrp,cat_1,cat_2) against('$search' In boolean mode) and p.cat_id=c.cat_id and p.p_id=pc.p_id";
						$result2=mysqli_query($conn,$query2);

						for($i=0;$i<5;$i++)
        {$flag=0;
        	// echo "<div class=\"col-sm-1\"></div>";
    		$flag=0;
          for($j=0;$j<4;$j++)
          { 
          		if($row1= mysqli_fetch_assoc($result2)){
                  

          		echo "<div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-6 \" style=\"display:inline;\">
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
          else
          {	$flag=1;
          	break;

          }
          	
           }
          
          if($flag==1)
          	break;
          	          echo "<div class=\"row\"></div>";
        }

	}
	else
	{
	if(isset($_GET['cat1']) and isset($_GET['cat2'])){
 	

 	$cat_1=$_GET['cat1'];
		$cat_2=$_GET['cat2'];
		
 }


		
		$query1="SELECT p.p_id,p.pname,p.price,p.brand_id,pc.p_img FROM category c,product p,prod_color pc WHERE cat_1='$cat_1' and cat_2='$cat_2' and p.cat_id=c.cat_id and p.p_id=pc.p_id";
		$result=mysqli_query($conn,$query1);
		/*if($result)
			echo "chala ";
		else
			echo "ni chala ";
		$a=0;
		echo "loop ke bahar";
	*/
		/*while($row = mysqli_fetch_assoc($result) )
		{

			echo "loop ke andr"; 
			echo $a;
			$a++;
			echo $row['p_id'].$row['pname'];
		}*/
		
		

        for($i=0;$i<5;$i++)
        {$flag=0;
        	// echo "<div class=\"col-sm-1\"></div>";
    		$flag=0;
          for($j=0;$j<4;$j++)
          { 
          		if($row1= mysqli_fetch_assoc($result)){
                  

          		echo "<div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-6 \" style=\"display:inline;\">
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
          else
          {	$flag=1;
          	break;

          }
          	
           }
          
          if($flag==1)
          	break;
          	          echo "<div class=\"row\"></div>";
        }
}
      ?>

</div>

	

<footer >
<?php
include('include/footer.php');
?>
</footer>
<!--<script src="js/jquery-3.1.1.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>