<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <style>
    body {
        background-image: url('bgp.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        width: 100%;
        height: 100%;
        margin: 0;
    }
    html {
        width: 100%;
        height: 100%;
        margin: 0;
    }

    .container {
        width: 100%;
        height: 100%;
    }

    * {
        box-sizing: border-box;
    }

    form.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    form.example button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.example button:hover {
        background: #0b7dda;
    }

    form.example::after {
        content: "";
        clear: both;
        display: table;
    }
    .navbar-center { 
            position: absolute; 
            left: 50%; 
            transform: translatex(-50%); 
        } 
</style>
</head>
<body>
  <div class="container-fluid">
  <div class="navbar-header navbar-center ">
       <h1 class="text-primary">Candidate Forum</h1>
      </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="userlogin.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<br><br><br><br><br><br><br>
 <form class="example" action="action1.php" style="margin:auto;max-width:300px" method="POST">
            <input type="text" placeholder="Search by constituency" name="search2">
            <button type="submit" name="search"><i class="fa fa-search"></i></button>
            <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "candidateforum";
                    $conn = new mysqli($servername, $username, $password,$dbname);
                    if(isset($_POST['search']))
{
    $cons=$_POST['search2'];
    $sql="select * from users where constituency='$cons'";
    $result = $conn->query($sql);
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()) {
     $name=$row['username'];
echo "<div style='text-align:center;'>";
echo "<a href='profile1.php?pname=$name' name='user' style='text-color:green;font-size: 25px;'>$name</a>";
     echo "</div>";
 }}
}
                    ?>
        </form><br><br>
        <form class="example" action="action1.php" style="margin:auto;max-width:300px" method="POST">
            <input type="text" placeholder="Search by name" name="search3">
            <button type="submit" name="search1"><i class="fa fa-search"></i></button>
            <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "candidateforum";
                    $conn = new mysqli($servername, $username, $password,$dbname);
                    if(isset($_POST['search1']))
{
    $cons=$_POST['search3'];
    $sql="select * from users where username='$cons'";
    $result = $conn->query($sql);
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()) {
     $name=$row['username'];
echo "<div style='text-align:center;'>";
echo "<a href='profile1.php?pname=$name' name='user' style='text-color:green;font-size: 25px;'>$name</a>";
     echo "</div>";
 }}
}
                    ?>
</form>
   


</body>
</html>
