<?php
include 'config.php';
session_start();
if (isset($_SESSION['username'])){
    $usernameInput= ($_SESSION['username']);
    
} else{
    header("Location: login.php");
}
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="TARUC,Chinese,Language,Society">
        <title>Profile - TARUC Chinese Language Society</title>
        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
        <link href="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" rel="stylesheet">
         
        <style>
            body{
            background-image: url('profile_background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
}
        </style>
    </head>  
<body>
        
<?php
$c1='Username';
$c2='Name';
$c3='Birthday';
$c4='Email';
$c5='PhoneNo';
$c6='Address';
$sql = "SELECT Username, Name, Birthday, Email, PhoneNo, Address FROM member WHERE Username='$usernameInput'";
$result = $conn->query($sql);
?>
        
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width:100%;">
        <div class="container-fluid" style="width:100%;">
          <a class="navbar-brand" href="main.php">Chinese Language Society</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="main.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="profile.php">Profile
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="v_allactivity.php">Activity</a>
              </li>
                          <li class="nav-item">
                <a class="nav-link" href="announcement.php">Announcement</a>
              </li>
            </ul>
                            <ul class="logout">
                  <a class="nav-link" href="logout.php"><button class="btn btn-secondary my-2 my-sm-0"><b>Logout</b></button></a>
              </ul>
          </div>
        </div>
      </nav>

<h1 style="text-align: center; margin-top: 135px;">YOUR PERSONAL PROFILE </h1>
<div class="row d-flex justify-content-center align-items-center h-100">
     <div class="col-md-12 col-xl-4">
        <div class="card" style="border-radius: 15px; box-shadow: 5px 10px 18px #888888;">
            <div class="card-body text-center">
             <?php
                     while ($row = $result->fetch_assoc()){
                       echo "<h4 class='mb-2' style='color:rgb(166,154,243); font-weight:800; margin-top:35px; text-shadow: 2px 1px grey;'>$row[$c2]</h4>";  
                       echo "<span class='text-muted mb-4'>$row[$c1]<span class='mx-2'>|</span>$row[$c3]</span>";
                       echo "<p style='margin-top: 20px;'>Email : <span style='mb-2'>$row[$c4]</span></p>";
                       echo "<p style='margin-top: 3px;'>Phone No : <span style='mb-2'>$row[$c5]</span></p>";
                       echo "<p style='margin-top: 3px; margin-bottom:30px; margin-right:20px; margin-left:20px;'>Address : <span style='mb-2'>$row[$c6]</span></p>";   
            }
             ?>
             </div>   
        </div>
     </div>
</div>
    </body>
</html>




























