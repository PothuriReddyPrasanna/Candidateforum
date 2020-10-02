<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidateforum";
$conn = new mysqli($servername, $username, $password,$dbname);
if(isset($_POST['signup']))
{
 $name=$_POST['name'];
$con=$_POST['con'];
$pname=$_POST['pname'];
$phoneno=$_POST['phoneno'];
$_SESSION['phoneno']=$phoneno;    
$email=$_POST['email'];
    $_SESSION['email']=$email; 
$dob=$_POST['dob'];
$pin=$_POST['pincode'];
$file=$_POST['file'];
$pass=$_POST['password'];
$sql="insert into users (username,constituency,partyname,phoneno,email,dob,pincode,file,password) values('$name','$con','$pname','$phoneno','$email','$dob','$pin','$file','$pass')";
 if ($conn->query($sql) === TRUE) {
require('textlocal.class.php');

$textlocal = new Textlocal(false,false,'11L7nODReDg-zkSxrs7hlt9zLbpUTr5gfspjciMsoA');

$number = array($phoneno);
$sender = 'TXTLCL';
$otp=mt_rand(10000,99999);
$message = 'Hello '. $name .' This is your otp:'.$otp;

try {
    $result = $textlocal->sendSms($number, $message, $sender);
    $_SESSION['otp']=$otp;
    echo "otp successfully sent";
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}


    header("Location:otp.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>