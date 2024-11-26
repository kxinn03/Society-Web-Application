<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->


<html>
    <script type="text/javascript" src="event.js" defer></script>
    <head>
        <meta charset="UTF-8">

        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
                <link href="eventstyle.css" rel="stylesheet" />
                <link href="eventheader.css" rel="stylesheet" />
        <title>Lion Dance - TARUC Chinese Language Society</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>

<div class="liondanceheader">
  <h1>LION DANCE</h1>
  <p>Lion dance is a form of traditional dance in Chinese culture and other Asian countries in which performers mimic a lion's movements in a lion costume to bring good luck and fortune. </p>
</div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="admin.html">Chinese Language Society</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="admin.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="add_activity.php">Manage Activity
            <span class="visually-hidden">(current)</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="Post_Announcement.php">Announcement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage.php">Manage Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="updticket.php">Update Ticket</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="member_list.php">Member List</a>
        </li>
      </ul>
    <ul class="logout">
        <a class="nav-link" href="logout.php"><button class="btn btn-secondary my-2 my-sm-0"><b>Logout</b></button></a>
    </ul>
    </div>
  </div>
    </nav>


    

    
    
    <div class="button">
            <a href="add_activity.php" class="category">Add Activity</a>
            <a href="activity.php" class="category">All Activity</a>
            <a href="theater.php" class="category">Theater</a>
            <a href="calligraphy.php" class="category">Calligraphy</a>
            <a href="crosstalk.php" class="category">Crosstalk</a>
            <a href="xiangqi.php" class="category">Xiang Qi</a>
            <a href="liondance.php" class="category">Lion Dance</a>
            <a href="diabolo.php" class="category">Diabolo</a>
    </div>
    
    <?php
       include 'config.php';
    ?>
    
    <?php
            $select = mysqli_query($conn, "SELECT * FROM activity WHERE Category='Lion Dance' ORDER BY ActID;");
    ?>

   <div class ="activity-display">
    <table class ="activity-display-table">
        <thead>
            <tr>
                <td>ACTIVITY TITLE</td>
                <td>UPDATED ON</td>
                <td>ACTIVITY IMAGE</td>
                <td>ACTIVITY DESCRIPTION</td>
                <td>ACTIVITY VENUE</td>
                <td>START DATE</td>
                <td>START TIME</td>
                <td>CATEGORY</td>
                <td>PRICE</td>
                <td>PEOPLE</td>
                <td>ACTION</td>
            </tr>
        </thead>
        <?php while($row = mysqli_fetch_assoc($select)){?>
        <tr>
            <td><?php echo $row['ActName']; ?> </td>
            <td><?php echo $row['UpdDate']; ?> </td>
            <td><img src="uploaded_img/<?php echo $row['ActImage']; ?>" height="100%" width="100%"alt="" ></td>
            <td><?php echo $row['ActDesc']; ?> </td>
            <td><?php echo $row['ActVenue']; ?> </td>
            <td><?php echo $row['StartDate']; ?> </td>
            <td><?php echo $row['StartTime']; ?> </td>
            <td><?php echo $row['Category']; ?> </td>
            <td><?php echo $row['value']; ?> </td>
            <td><?php echo $row['people']; ?> </td>
            
            <td>
                <a href="edit_activity.php?edit=<?php echo$row['ActID']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                <a href="add_activity.php?delete=<?php echo$row['ActID']; ?>" class="btn btn-danger"onclick="myFunction()"><i class="fa fa-trash"></i>Delete</a>
            </td>
        </tr>
        <?php }?>
    </table>
</div>

    </div>
        <div class="bottom">
        <button onclick="topFunction()" id="myBtn" title="Go to top">&#x21e7;</button>
    </div>

</body>
</html>