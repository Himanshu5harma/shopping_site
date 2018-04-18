<?php
/* User login process, checks if user exists and password is correct */
$mysqli = new mysqli('localhost','root','','ecom') or die($mysqli->error);
if($mysqli)

// Escape email to protect against SQL injections
$phone = $mysqli->escape_string($_POST['Phone']);

if($_POST['check_reg']=='customer')
$result = $mysqli->query("SELECT * FROM customer WHERE phone=$phone");
else
$result = $mysqli->query("SELECT * FROM supplier WHERE phone=$phone");
if($result)

if ( $result->num_rows == 0 ){ // User doesn't exist
echo '<script>alert("Invalid Phone No.")</script>';
    echo '<script>window.location="index.php"</script>';

    
}
else { // User exists
    $user = $result->fetch_assoc();
$pass=md5($_POST['pass']);
    if ( $pass==$user['pass'] ) {
        
        $_SESSION['phone'] = $user['phone'];
        
        if($_POST['check_reg']=='customer')
        {$_SESSION['cust_id'] = $user['cust_id'];
            $_SESSION['user'] = "customer";
            $_SESSION['fname'] = $user['c_fname'];
        $_SESSION['lname'] = $user['c_lname'];
        }
        else
        {
            $_SESSION['s_id'] = $user['supplierID'];
        $_SESSION['user'] = "sailer";
        $_SESSION['fname'] = $user['s_fname'];
        $_SESSION['lname'] = $user['s_lname'];   
        }
  
        
       
        $_SESSION['logged_in'] = true;

       
    }
    else {
        echo '<script>alert("Incorrect Password")</script>';
    echo '<script>window.location="index.php"</script>';
       
       
    }
}
