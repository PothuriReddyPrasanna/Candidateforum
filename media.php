<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initian-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="syles.css" type="text/css">
    <style>
       .single_content {
            margin-top: 10px;
            padding: 10px 10px 10px 10px;
            height: inherit;
            width: 97%;
            background-color: azure;
            word-wrap: break-word;
            border-radius: 10px;

        }
        .content_section {
            padding-top: 65px;
            padding-left: 20px;
        }

        .single_content:hover {
            background-color: #c9d1d3;
            cursor: pointer;
        }
        .picu{
            border-radius: 0%;
            padding: 0px;
            bottom: none;
            position: relative;
            border: 4px;
        }
        .propic {
            border-radius: 50%;
            padding-left: 10px;
            position: absolute;
            bottom: -50%;
        }
        
        #dateu{
            text-align: right;
            font-family: "Times New Roman", Times, serif;
            font-weight: bold;
            
        }
        h6 {
            color: aliceblue;
            text-align: center;
            padding-top: 30px;
            font-size: 30px;
            font-family: monospace;
            text-transform: uppercase;
        }

        input#file-input {
            display: none;
        }

        input.i+label {
            margin-left: 30px;
        }

        input.i1+label {
            margin-right: 10px;
        }

        input#file-input+label {
            background-color: blue;
            padding: 8px;
            color: #fff;
            border: 2px solid #9ec3ff;
            border-radius: 9px;
            margin-right: 25px;
        }

        input#file-input+label:hover {
            background-color: #3b73ce;
            border-color: #729fe7;
            cursor: pointer;
        }
        .profile {
    background-color: #6983aa;
    width: 60%;
    min-height: 100vh;
    float: left;
    height:auto;
    padding-bottom:20px;
}
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <h3> My Profile </h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- divclass collapse navbar ul-->
        </div>
    </nav>
    <?php
           error_reporting(0);
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "candidateforum";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                }
                if(isset($_GET['phoneno'])){
                    
                    $username = $_GET['phoneno'];
                    $sql = "SELECT * FROM users where phoneno='$username'";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      $phoneno=$row['username'];
                  }
                }
                }
                    echo "<div class='tabs'>";
                    echo "<ul class='nav flex-column'>";
                    echo " <li class='nav-item'>
                    <a class='nav-link active' href='profile1.php?pname=$phoneno'><i class='fa fa-home' aria-hidden='true'></i>&nbsp; Home</a>
                </li>";
                    echo " <li class='nav-item'>
            
                    <a class='nav-link' href='about1.php?pname=$phoneno'><i class='fa fa-id-card' aria-hidden='true'></i>&nbsp;About</a>
                </li>";
                echo " <li class='nav-item'>
                <a class='nav-link' href='media.php?phoneno=$username'><i class='fa fa-play' aria-hidden='true'></i>&nbsp;Media</a>
            </li>";
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'><i class='fa fa-phone' aria-hidden='true'></i>&nbsp;Contact</a>
        </li>";
        echo "</ul>";
            echo "</div>";   
               
               $conn->close();

            ?>
    <section class="profile">
        <div class="nametag">
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidateforum";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['phoneno'])){
    $phoneno = $_GET['phoneno'];
}
$sql = "SELECT propic FROM about where phoneno='$phoneno'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
       echo "<img class='propic' src='profilepic/".$row['propic']."' alt='sorry'  width='130px' height='100px'/>"; 
  }}
             else{
                echo " <img src='avatar.webp' class='propic' alt='MODI' width='130' height='100' />";
            }
?>
            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidateforum";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['phoneno'])){
    $phoneno = $_GET['phoneno'];
}
$sql = "SELECT username FROM users where phoneno='$phoneno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $username=$row['username']; 
echo "<h6>$username</h6>"; 

  }
} else {
  echo "0 results";
}
$conn->close();
?>
        </div>
        <div class="content_section">
        <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "candidateforum";
    $conn = new mysqli($servername, $username, $password,$dbname);
    if(isset($_GET['phoneno'])){
        $phoneno = $_GET['phoneno'];
    }
 $sql="select * from media where phoneno='$phoneno' order by date desc";
 $result=$conn->query($sql);
 
 if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    
   
                       $file1=$row['file1'];
                       $str=strrev($file1);
                       $pos=strpos($str,".");
                       $str1=strrev(substr($str,0,$pos));
                       if($str1=='png'|| $str1=='PNG'|| $str1=='jpg'|| $str1=='JPG'|| $str1=='jpeg'|| $str1=='JPEG')
                       {
                        echo "<div class='single_content' style='padding-left:30px;'>";
                        echo "<p id='dateu'>" .$row["date"]. "</p>";
                        echo "<img class='picu' src='images/".$row['file1']."' alt='sorry'  width='300px' height='200px'/>";     
                        echo "</div>";
                    }                
    if($str1=='mp4'||$str1=='mpeg'||$str1=='avi'||$str1=='3gp'||$str1=='mov'){
        echo "<div class='single_content'>";
        echo "<p id='dateu'>" .$row["date"]. "</p>";
      echo "<video class='picu' src='images/".$row['file1']."' controls width='320px' height='200px' >";
      echo "</div>"; 
    }
   
  }
}
$conn->close();
   
     ?>
</div>


    </section>

</body>

</html>
