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
        h6 {
            color: aliceblue;
            text-align: center;
            padding-top: 30px;
            font-size: 30px;
            font-family: monospace;
            text-transform: uppercase;
        }

        .abt {
            padding-top: 60px;
            padding-left: 150px;
        }

        h4,h5 {
            text-decoration-line: underline;
        }

        .editbtn {
            margin-right: 50px;
            float: right;
            position: relative;
            top: -70px;
        }

        .form-popup {
            display: none;
            position: fixed;
            bottom: 210px;
            right: 15px;
            border: 3px solid #f1f1f1;
        }

        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: #b4f2e1;
        }

        .form-container input[type=text],
        .form-container input[type=password] {
            width: 100%;
            padding: 5px;
            margin: 0 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        .form-container .btn {
          background-color: forestgreen;
           cursor: pointer;
            width: auto;
            opacity: 0.8;
        }

        .form-container .cancel {
            background-color: red;
        }

        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
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
           
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "candidateforum";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                }
                if(isset($_GET['pname'])){
                    $_GLOBALS['pname']=$_GET['pname'];
                    $username = $_GET['pname'];
                    $sql = "SELECT * FROM users where username='$username'";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      $phoneno=$row['phoneno'];
                  }
                }
                }
                    echo "<div class='tabs'>";
                    echo "<ul class='nav flex-column'>";
                    echo " <li class='nav-item'>
                    <a class='nav-link active' href='profile1.php?pname=$username'><i class='fa fa-home' aria-hidden='true'></i>&nbsp; Home</a>
                </li>";
                    echo " <li class='nav-item'>
            
                    <a class='nav-link' href='about1.php?pname=$username'><i class='fa fa-id-card' aria-hidden='true'></i>&nbsp;About</a>
                </li>";
                echo " <li class='nav-item'>
                <a class='nav-link' href='media.php?phoneno=$phoneno'><i class='fa fa-play' aria-hidden='true'></i>&nbsp;Media</a>
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
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
            }
            if(isset($_GET['pname'])){
                $_GLOBALS['pname']=$_GET['pname'];
                $username = $_GET['pname'];
                $sql = "SELECT * FROM users where username='$username'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {
                       $phoneno=$row['phoneno'];
                   }
                 }
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
              $conn = new mysqli($servername, $username, $password, $dbname);
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              } 
              if(isset($_GET['pname'])){
                $_GLOBALS['pname']=$_GET['pname'];
                $username = $_GET['pname'];
                echo "<h6>$username</h6>";
           
           }
            ?>
        </div>
        <div class=" abt ">
            </div>

            <h4>General Information</h4>
            <?php
            if(isset($_GET['pname'])){
                $_GLOBALS['pname']=$_GET['pname'];
                $username = $_GET['pname'];
            }
               $sql = "SELECT * FROM users where username='$username'";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                     echo "<p><b> Name: </b>" .$row["username"]. "<br><b> Constituency:</b> " .$row["constituency"]. "<br><b> Party Name:</b> " .$row["partyname"]. "<br><b> Date of Birth: </b>" .$row["dob"]. "</p>"; 
                  }
               } else { echo "0 results"; }
            ?>
            <br>

        </div>
    </section>

    <?php
       $conn->close();
    ?>
</body>

</html>
