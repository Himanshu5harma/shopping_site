<?php
$conn = mysqli_connect("localhost", "root", "", "ecom");
$pid=$_GET['p_id'];
$color=$_GET['color'];

$q="SELECT p_img FROM prod_color WHERE p_id=$pid and p_color='$color'";
$r=mysqli_query($conn,$q);

$row=mysqli_fetch_assoc($r);
echo $row['p_img'];
?>