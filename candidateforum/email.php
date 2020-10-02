<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidateforum";
$conn = new mysqli($servername, $username, $password,$dbname);
$vkey=md5(time().$username);
$sql="update users set vkey='$vkey' where phoneno=".$_SESSION['phoneno']."";
if($conn->query($sql) === TRUE){
   
   $to=$_SESSION['email'];
   $subject="Candidate Forum Email Verification";
   $body="a href ='http://localhost/candidate_forum/mailverf.php?vkey=$vkey'> Register </a>";
    $body = "<p> Thank you for registering on our Website! We hope you have a Good experience. 
<br><br> Before we get started, we just need to confirm that this is you. <br> Click on the link to verify your email address:  <a href ='http://localhost/candidate_forum/mailverf.php?vkey=$vkey'> Verify email </a> </p>";
$headers = "From: padmareddy2534@gmail.com \r\n";
$headers .= "MIME-Version: 1.0" ."\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" ."\r\n";
 

if (mail($to, $subject, $body, $headers)) {
   // echo "Email successfully sent to $to";
    header("location:mailverf.html");
} else {
    echo "Email sending failed...";
}
   
}
else{
   echo "error";
}
//
// if ($conn->query($sql) === TRUE) {
//    header("Location:mailverf.html");
//} else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
//}
$conn->close();
?>