<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidateforum";
$conn = new mysqli($servername, $username, $password,$dbname);
session_start();
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['post'])){
$file1=$_POST['status'];
$file2=$_FILES["image"]['name'];
$file3=$_FILES["video"]['name'];
$file4=$_FILES["audio"]['name'];
$date=date('d-m-y h:i:s');
move_uploaded_file($_FILES['image']['tmp_name'],"images/".$file2);
move_uploaded_file($_FILES['video']['tmp_name'],"images/".$file3);
move_uploaded_file($_FILES['audio']['tmp_name'],"images/".$file4);
$sql="insert into media (phoneno,status,file1,date) values(".$_SESSION['phoneno'].",'$file1','$file2','$date')";
if ($conn->query($sql) === TRUE) {
    header("Location:profile.php");

 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>