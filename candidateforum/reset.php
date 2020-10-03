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
    <link rel="stylesheet" href="base.css">
</head>
<body>
    <div style='text-align:center;' class="jumbotron">
    <p style='padding-bottom:100px'></p>
    <h2 style='color:green;'>RESET PASSWORD</h2>
    <form action="reset.php" method="POST">
    <input type="password" name="password" placeholder="Enter password"><br><br>
    <input type="password" name="confirmpassword" placeholder="confirm password"><br><br>
    <input type="submit" name="save" value="save" style='background-color:green;color:white;padding:5px;'>
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
if(isset($_POST['save'])){
    $p=$_POST['password'];
    $p1=$_POST['confirmpassword'];
    if($p!=$p1){

        echo "<script>alert('Password confirmation doesn't match Password')</script>";
header("Location:reset.php");

    }
    else{
        $conn->query("update users SET password='$p1' where phoneno=".$_SESSION['phone']."");
        header("Location:userlogin.html");
    }
}
?>
