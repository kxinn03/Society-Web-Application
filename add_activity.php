<html>
     <script type="text/javascript" src="event.js" defer></script>
    <head>
        <meta charset="UTF-8">
        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="eventstyle.css" rel="stylesheet" />
        <link href="eventheader.css" rel="stylesheet" />
        
        <title>Manage Activity - TARUC Chinese Language Society</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>

    <div class="eventheader">
    <h1>ACTIVITY</h1>
        <p>Let's check out what activities had organized by TARUC Chinese Language Society! Come and join our activities!</p>
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
        
        
        
        
        if (isset($_POST['add_activity'])) {
            $ActName = $_POST['act_name'];
            $UpdDate = $_POST['upd_date'];
            $ActDesc = $_POST['act_desc'];
            $ActVenue = $_POST['act_venue'];
            $StartDate = $_POST['start_date'];
            $StartTime = $_POST['start_time'];
            $Category = $_POST['category'];
            $ActImage = $_FILES['act_image']['name'];
            $ActImage_tmp_name = $_FILES['act_image']['tmp_name'];
            $ActImage_folder = 'uploaded_img/'.$ActImage;
            $value = $_POST['value'];
            $people = $_POST['people'];
            
            

                $insert = "INSERT INTO activity (ActName, UpdDate, ActImage, ActDesc, ActVenue, StartDate, StartTime, Category, value, people) VALUES (?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($insert);
                $stmt->bind_param('ssssssssdi', $ActName,$UpdDate,$ActImage,$ActDesc,$ActVenue,$StartDate,$StartTime,$Category,$value,$people);
                if ($stmt->execute()) {


                    move_uploaded_file($ActImage_tmp_name, $ActImage_folder);
                    echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-success">Success!</h4>';
            echo "<strong>$ActName</strong> has been inserted.</div>";
                }else {
            echo '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-heading">Warning!</h4>
  <ul>';
            echo"<li>Database update error!</li>";
            echo '</ul></div>';
       }


            
        }
        
        
        if(isset($_GET['delete'])){
            $ActID = $_GET['delete'];
                        
            mysqli_query($conn, "DELETE FROM activity WHERE ActID = $ActID");
            HEADER('location:add_activity.php');

        }
        
        
        
        

    ?>



        <?php
            $select = mysqli_query($conn, "SELECT * FROM activity ORDER BY UpdDate DESC");
        ?>


    
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h1>Add New Event</h1>
                <hr>
                <label for="title"><b>Activity Name</b></label><br>
                <input type="text" placeholder="Enter Activity Name" name="act_name" required>
                <br><br>

                <label for="Date"><b>Updated on</b></label><br>
                <input type="date" id="date" name="upd_date" required>
                <br><br>

                <label for="Description"><b>Event Description</b></label><br>
                <textarea id="actdesc" name="act_desc" placeholder="Write the event description here......" style="height:200px; width:100%;" required></textarea>
                <br><br>
                
                <label for="title"><b>Activity Venue</b></label><br>
                <input type="text" placeholder="Enter Activity Venue" name="act_venue" required>
                <br><br>
                
                <label for="Date"><b>Activity Start Date</b></label><br>
                <input type="date" id="date" name="start_date" required>
                <br>
                
                <label for="appt"><b>Activity Start Time</b></label><br>
                <input type="time" id="time" name="start_time">
                <br><br>
                
                <label for="category"><b>Category:</b></label><br>
                <select name="category" id="category">
                    <option value="Theater">Theater</option>
                    <option value="Calligraphy">Calligraphy</option>
                    <option value="Cross Talk">Cross Talk</option>
                    <option value="Xiangqi">Xiangqi</option>
                    <option value="Lion Dance">Lion Dance</option>
                    <option value="Diabolo">Diabolo</option>

                </select>
                <br><br>
                                <label for="title"><b>Ticket Price</b></label><br>
                <input type="text" placeholder="Enter Ticket Price(eg 10.00)" name="value" required>
                <br><br>
                                <label for="title"><b>No of Ticket</b></label><br>
                <input type="text" placeholder="Enter No of Ticket" name="people" required>
                <br><br>
                
                <label for="image"><b>Activity Image:</b></label><br>
                <p>Click on the "Choose File" button to upload the activity image</p>
                    <input type="file" accept="image/png, image/jpeg, imge/jpg" name="act_image">
                    <br><br><br>

                <input type="submit" class="btn btn-primary" name= "add_activity" value="Add">
                <a href="add_activity.php" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>



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
            <td><img src="uploaded_img/<?php echo $row['ActImage']; ?>" height="200%" width=100%"alt="" ></td>
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
        <div class="bottom">
        <button onclick="topFunction()" id="myBtn" title="Go to top">&#x21e7;</button>
    </div>
</body>

    