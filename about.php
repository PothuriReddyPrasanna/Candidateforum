<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initian-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="syles.css" type="text/css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="about.css" type="text/css">
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
    <div class="tabs">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="profile.php"><i class='fa fa-home' aria-hidden='true'></i>&nbsp;Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php"><i class='fa fa-id-card' aria-hidden='true'></i>&nbsp;About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="media1.php"><i class='fa fa-play' aria-hidden='true'></i>&nbsp;Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class='fa fa-phone' aria-hidden='true'></i>&nbsp;Contact</a>
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

                   echo "<h6>" .$row["username"]. "<h6>";
                }
              } else { echo "0 results"; }
            ?>
        </div>
        <div class=" abt ">
            <input class="editbtn btn btn-primary" type="button" onclick="openForm()" value="Edit Profile">
            <div class="form-popup" id="myForm">
                <form action="edit.php" class="form-container" method="post" enctype='multipart/form-data'>
                <h5>Edit Profile</h5><br>
                <input type="text" placeholder="Enter Highest Qualification" name="qualification" required>
                <label for="img">Select Profile Picture:</label>
                <input type="file" name="propic"><br><br>
                <input type="text" name="name" placeholder="Update Username" required><br>
                <input type="text" name="con" placeholder="Update Constituency" required><br>
                <input type="text" name="pname" placeholder="Update Partyname" required><br>
                <input type="email" name="email" placeholder="Update Email" required><br>
                <input type="password" name="password" placeholder="Change Password" required><br>
                <div class="buttons">
                    <div class="action_btn">
                        <button name="save" class="btn action_btn" type="submit" value="Save">Save</button>
                    </div>
                    <div class="action_btn">
                        <button name="close" class="btn action_btn cancel" type="submit" value="Close" onclick="closeForm()">Close</button>
                    </div>
                </div>
                </form>
            </div>

            <h4>General Information</h4>
            <?php
               $sql = "SELECT * FROM users where phoneno=".$_SESSION['phoneno']."";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                     echo "<p><b> Name: </b>" .$row["username"]. "<br><b> Constituency:</b> " .$row["constituency"]. "<br><b> Party Name:</b> " .$row["partyname"]. "<br><b> Date of Birth: </b>" .$row["dob"]. "</p>";
                  }
               } else { echo "0 results"; }
            ?>
            <br>
            <h4>Educational Information</h4>
            <?php
               $sql = "SELECT * FROM about where phoneno=".$_SESSION['phoneno']."";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                     echo "<p><b> Highest Qualification: </b>" .$row["hqualification"]. "</p>";
                  }
               } else { echo "0 results"; }
            ?>

        </div>
    </section>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

    </script>
</body>

</html>
