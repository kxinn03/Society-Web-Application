<?php
// Include  file
$page_title = 'Announcement';
include 'config.php';
 
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->


<html>
    <head>
        <meta charset="UTF-8">
                <link href="announcement.css" rel="stylesheet" />
        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">

        <title>Announcement - TARUC Chinese Language Society</title>  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>

    <div class="header">
        <h1>Announcement</h1>
    </div>

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
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
                <a class="nav-link" href="profile.php">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="v_allactivity.php">Activity</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  active" href="announcement.php">Announcement</a>
                <span class="visually-hidden">(current)</span>
            </li>
            </ul>
    <ul class="logout">
        <a class="nav-link" href="logout.php"><button class="btn btn-secondary my-2 my-sm-0"><b>Logout</b></button></a>
    </ul>
          </div>
        </div>
      </nav>

    <?php
            $select = mysqli_query($conn, "SELECT * FROM announ");
    ?>

    <div class ="announce-display">
    <table class ="announce-display-table">
        <thead>
            <tr>
                <td><b>TITLE</b></td>
                <td><b>POSTED ON</b></td>
                <td><b>SENDER NAME</b></td>
                <td><b>ANNOUNCEMENT CONTENT</b></td>
            </tr>
        </thead>
        <?php while($row = mysqli_fetch_assoc($select)){?>
        <tr>
            <td><?php echo $row['title']; ?> </td>
            <td><?php echo $row['date']; ?> </td>
            <td><?php echo $row['sender']; ?> </td>
            <td><?php echo $row['content']; ?> </td>


        </tr>
        <?php }?>
    </table>
</div>


</body>
</html>



