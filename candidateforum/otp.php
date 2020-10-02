<!DOCTYPE html>
<html lang="en">

<head>
    <title>CANDIDATE FORUM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
         body {
            background-image: url('bgp.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        </style>
</head>
<body>
    <div style='text-align:center;' class="jumbotron">
    <p style='padding-bottom:100px'></p>
    <h2 style='color:green;'>MOBILE VERIFICATION</h2>
    <form action="otp.php" method="POST">
    <input type="text" name="otp" placeholder="Enter OTP"><br><br>
    <input type="submit" name="verify" value="verify" style='background-color:green;color:white;padding:5px;'>
</form>
</div>
</body>
</html>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidateforum";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['verify'])){
    $tp=$_POST['otp'];
    if($_SESSION['otp']==$tp){
        echo "Congrats!!!Your Mobile Number is Verified";
        header("Location:email.php");
    }
    else{
        echo "enter valid otp ";
    }
}
?>