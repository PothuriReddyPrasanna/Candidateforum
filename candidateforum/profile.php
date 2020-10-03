<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initian-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="syles.css" type="text/css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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

        .update{
            height: auto;
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
        <ul class="nav navbar-nav navbar-right">

        <li><a href="welcome.html"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
      </ul>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- divclass collapse navbar ul-->
        </div>
    </nav>
    <div class="tabs">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="profile.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp; About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="media1.php"><i class="fa fa-play" aria-hidden="true"></i>&nbsp; Media </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp; Contact</a>
            </li>
        </ul>
    </div>

    <section class="profile">
        <div class="nametag">
        <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "candidateforum";
                session_start();
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                }
            $sql = "SELECT propic FROM about where phoneno=".$_SESSION['phoneno']."";
             $result=$conn->query($sql);
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

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT username FROM users where phoneno=".$_SESSION['phoneno']."";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {
                        echo "<h6>" .$row["username"]. "</h6>";
                   }
               } else { echo "0 results"; }
               $conn->close();
            ?>
        </div>
        <div class="content_section">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "candidateforum";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
            }
                $sql = "SELECT * FROM media  where phoneno=".$_SESSION['phoneno']." ORDER BY date desc";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {
                       echo "<div class='single_content'>";
                       echo "<p id='dateu'>" .$row["date"]. "</p>";
                       echo "<p>" .$row["status"]. "</p>";
                       $file1=$row['file1'];
                       $str=strrev($file1);
                       $pos=strpos($str,".");
                       $str1=strrev(substr($str,0,$pos));
                       if($str1=='png'|| $str1=='PNG'|| $str1=='jpg'|| $str1=='JPG'|| $str1=='jpeg'|| $str1=='JPEG')
                       {
                           echo "<img class='picu' src='images/".$row['file1']."' alt='sorry'  width='300px' height='200px'/>";
                       }
                       echo "</div>";
                    }
                }
                else { echo "No content"; }
            ?>


        </div>
    </section>

    <section class="update">
        <form method='post' action="profilenew.php" enctype='multipart/form-data'>
            <h3> Upload Status </h3>
            <textarea id="status" name="status" rows="7"></textarea>
            <input type="file" id="file-input" name="image" class="i">
            <label for="file-input"><i class="fas fa-image"></i></label>
            <input type="file" id="file-input" name="video">
            <label for="file-input"><i class="fas fa-file-video"></i></label>
            <input type="file" id="file-input" name="audio" class="i1">
            <label for="file-input"><i class="fas fa-file-audio"></i></label>
            <input type="submit" name="post" class="bg-primary text-white" value="Post">
        </form>
    </section>

</body>
</html>
