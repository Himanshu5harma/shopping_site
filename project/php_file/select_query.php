<?php

//echo "<option>".$_GET['category_1']."</option>";


if(isset($_GET['category_2']))
{
	$cat1=$_GET['category_1'];
	$cat2=$_GET['category_2'];
			 	if($cat1=='0')
			 	echo "<option>SELECT CATEGORY 1</option>";
			 else
			 {//echo "<option>".$cat1."</option>";
			$conn = mysqli_connect("localhost", "root", "", "ecom");
			 		$sql = "SELECT DISTINCT  cat_3 FROM category WHERE cat_1='$cat1' and cat_2='$cat2'";
			$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<option>".$row['cat_3']."</option>"."<br>";
    }
} 	

	else {
    echo  "<option value=\"NULL\">"."NONE"."</option>"."<br>";
}
}
		 
}
				else{

						$cat1=$_GET['category_1'];
			 	if($cat1=='0')
			 	echo "<option>SELECT CATEGORY 1</option>";
			 else
			 {//echo "<option>".$cat1."</option>";
			$conn = mysqli_connect("localhost", "root", "", "ecom");
			 		$sql = "SELECT DISTINCT  cat_2 FROM category WHERE cat_1='$cat1'";
			$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<option>".$row['cat_2']."</option>"."<br>";
    }
} 	

	else {
    echo "0 results";
}

		 }
				}
?>