<?php



$mysqli = new mysqli('localhost','root','','ecom') or die($mysqli->error);
if($mysqli)


$first_name = $mysqli->escape_string($_POST['fname']);
$last_name = $mysqli->escape_string($_POST['lname']);
$phone = $mysqli->escape_string($_POST['Phone']);
$pass=md5($_POST['pass']);
$password = $mysqli->escape_string($pass);

    
if($_POST['check_reg']=='customer')
$result = $mysqli->query("SELECT * FROM customer WHERE phone='$phone'") or die($mysqli->error());
else
$result = $mysqli->query("SELECT * FROM supplier WHERE phone='$phone'") or die($mysqli->error());    


if ( $result->num_rows > 0 ) {
   echo  '<script>alert("You are already registered please login .!")</script>';
    echo '<script>window.location="index.php"</script>';
}
else {
    if($_POST['check_reg']=='customer')
    $sql = "INSERT INTO customer(c_fname,c_lname, phone, pass) VALUES ('$first_name','$last_name',$phone,'$password')";
    else
     $sql = "INSERT INTO supplier(s_fname,s_lname, phone, pass) VALUES ('$first_name','$last_name',$phone,'$password')";   
    
    if ( $mysqli->query($sql) ){
                    echo "you are singed up ";
                    if($_POST['check_reg']=='customer')
                        {   $result1 = $mysqli->query("SELECT * FROM customer WHERE phone='$phone'");
                            $user = $result1->fetch_assoc();
                            $_SESSION['cust_id']=$user['cust_id'];
                            $_SESSION['user'] = 'customer';
                        }
                    else
                    {$result1 = $mysqli->query("SELECT * FROM supplier WHERE phone='$phone'");
                            $user = $result1->fetch_assoc();
                            $_SESSION['s_id']=$user['supplierID'];
                        $_SESSION['user'] = 'sailer';
                    }
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['phone'] = $_POST['Phone'];
    }

   else {
        
        
        echo  '<script>alert("Sign Up failed ..!")</script>';
    echo '<script>window.location="index.php"</script>';
    }

}