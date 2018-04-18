<?php
			 	//if($_post['category_1']=='men')
$sql = "SELECT  cat_2 FROM category WHERE cat_1='men'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option>".$row['cat_2']."</option>"."<br>";
    }
} else {
    echo "0 results";
}


			 	?>