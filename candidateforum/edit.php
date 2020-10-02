<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidateforum";
$conn = new mysqli($servername, $username, $password,$dbname);
if(isset($_POST['save']))
{
    $name=$_POST['name'];
    $con=$_POST['con'];
    $pname=$_POST['pname'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $qualification=$_POST['qualification'];
    $propic=$_FILES["propic"]['name'];
    move_uploaded_file($_FILES['propic']['tmp_name'],"profilepic/".$propic);
    $result = $conn->query("select * from about where phoneno=".$_SESSION['phoneno']."");
   // $result1=$conn->query("select * from users where phoneno=".$_SESSION['phoneno']."");
    if($result->num_rows > 0){
        $conn->query("update about set hqualification='$qualification',propic='$propic' where phoneno=".$_SESSION['phoneno']."");
        $conn->query("update users set username='$name', constituency='$con',email='$email',password='$pass' where phoneno=".$_SESSION['phoneno']."");
    }
    else{
        $conn->query("insert into about(phoneno, hqualification,propic) values(".$_SESSION['phoneno'].",'$qualification','$propic')");
    }
   
    //header("Location:about.php");
$conn->close();
}
?>
