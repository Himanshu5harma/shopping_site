<html>
<body>

<form method="post" action="rajat.php">
	<select name="o1">
		<option value="1">1 </option>
		<option value="2">2 </option>
		<option value="3">3 </option>
		<option value="4">4 </option>
	</select>
	<select name="o2">
		<option value="a">a </option>
		<option value="b">b </option>
		<option value="c">c </option>
		<option value="d">d </option>
	</select>
	<input type="submit" name="submit">
	<input type="submit" name="unset" value="unset">
</form>
<?php

		session_start();
		extract($_POST);
		

		//$_SESSION['name']="{";
		//$n=strlen($name);
		if(isset($_POST['submit']))
	
	{	
		if(!isset($_SESSION['name']))
			$_SESSION['name']="{";
		$name=$_SESSION['name'];

		
		$name=$name."$o1"."="."$o2".",";
		$_SESSION['name']=$name;


		echo $name;

	}
	if(isset($_POST['unset']))
	{
		unset($_SESSION['name']);
	}	
		/*for($i=0;$name[$i]!='}';$i++)
		echo $name[$i];
*/

?>
</body>
</html>
<?php
if(isset($_POST["add_to_cart"]))  
 {  	$ps=$_POST["size"];
		$pc=$_POST["color"];
 	$q1="SELECT ps_id FROM prod_size  WHERE color='$pc' and p_size='$ps'";
 	$r1=mysqli_query($conn,$q1);
 	$row1=mysqli_fetch_assoc($r1);



      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
           $item_array_size_id = array_column($_SESSION["shopping_cart"], "item_size_id");  
           if((!in_array($_GET["id"], $item_array_id))||(!in_array($row1["ps_id"], $item_array_size_id)))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(
                	'item_size_id'  => $row1["ps_id"],  	  
                     'item_id'  => $_GET["id"],  
                     'item_name'  =>  $_POST["hidden_name"],  
                     'item_price'   => $_POST["hidden_price"],  
                     'item_quantity'   => $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                //echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
           		'item_size_id'  => $row1["ps_id"],
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  



if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     //echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  



?>