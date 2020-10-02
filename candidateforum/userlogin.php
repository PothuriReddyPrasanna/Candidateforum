<?php
session_start();
$_SESSION['phoneno']=$_POST['no'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidateforum";
$conn = new mysqli($servername, $username, $password,$dbname);
if(isset($_POST['signin']))
{
$number=$_POST['no'];
$pwd=$_POST['pwd'];
$sql = "SELECT phoneno,password FROM users where phoneno='$number' and password='$pwd'";
$result = $conn->query($sql);
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()) {
if($row["phoneno"]==$number && $row["password"]==$pwd){
header("Location:profile.php");
break;
}

}
}
else{
echo "<script>alert('failed to login please enter correct email and password')</script>";
header("Location:userlogin.html");
}
}
?>