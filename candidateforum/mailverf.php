<?php
if(isset($_GET['vkey'])){
    $vkey=$_GET['vkey'];
    session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidateforum";
$conn = new mysqli($servername, $username, $password,$dbname);
$sql= $conn->query("SELECT mverified,vkey FROM users WHERE mverified = 0 AND vkey='$vkey' LIMIT 1");
 if ($sql->num_rows == 1){
     $update = "UPDATE users SET mverified = 1 WHERE vkey = '$vkey' LIMIT 1";
     if($conn->query($update) === TRUE){
         echo "Email Verification successful";
         header('location:userlogin.html');
     }
      else{
        echo $conn->error;
    }
 }    
    else{
        echo "err";
    }
}
else{
    echo "umm";
}
?>