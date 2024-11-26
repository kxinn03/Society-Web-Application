<html>
    <body>
    <head>
        <?php $page_title = 'Edit Activity';?>
        <title><?php echo $page_title ?></title>
        <meta charset="UTF-8">
        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="eventstyle.css" rel="stylesheet" />
        <link href="eventheader.css" rel="stylesheet" />
        
        <title>Edit Activity - TARUC Chinese Language Society</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    </body>
</html>
<?php
 include'config.php';

?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ActID = $_POST['edit'];
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
    
    $sql = "UPDATE activity SET ActName = ?, UpdDate = ?, ActImage = ?, ActDesc = ?, ActVenue = ?, StartDate = ?, StartTime = ?, Category = ?, value = ?, people = ? WHERE ActID= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssssss', $ActName,$UpdDate,$ActImage,$ActDesc,$ActVenue,$StartDate,$StartTime,$Category,$value,$people,$ActID);
        if ($stmt->execute()) {
            echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-success">Success!</h4>';
            echo "<strong>$ActName</strong> has been updated. Click the 'Go Back' button below to view.</div>";
        } else {
            echo '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-heading">Warning!</h4>
  <ul>';
            echo"<li>Database update error!</li>";
            echo '</ul></div>';
       }
    
}else {
    $ActID = $_GET['edit'] ?? '';

    $sql = "SELECT * FROM activity WHERE ActID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $ActID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ActName = $row['ActName'];
        $UpdDate = $row['UpdDate'];
        $ActImage = $row['ActImage'];
        $ActDesc = $row['ActDesc'];
        $ActVenue = $row['ActVenue'];
        $StartDate = $row['StartDate'];
        $StartTime = $row['StartTime'];
        $Category = $row['Category'];
        $value = $row['value'];
        $people = $row['people'];
    }
}



          
 
     
?>




<div class="container">
            
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" value="<?php echo $_REQUEST['edit'] ?>" name="edit"/>
                <h1>Edit Event</h1>
                <hr>
                <label for="title"><b>Event Title</b></label><br>
                <input type="text" placeholder="Enter Event Title" value="<?= $ActName ?>" name="act_name" required>
                <br><br>

                <label for="Date"><b>Updated on</b></label><br>
                <input type="date" id="date" value="<?= $UpdDate ?>"name="upd_date" required>
                <br><br>

                <label for="Description"><b>Event Description</b></label><br>
                <textarea id="actdesc" value="" name="act_desc" placeholder="Write the event description here......" style="height:200px; width:100%;" required><?= $ActDesc ?></textarea>
                <br><br>
                
                <label for="title"><b>Activity Venue</b></label><br>
                <input type="text" placeholder="Enter Activity Venue" value="<?= $ActVenue ?>"name="act_venue" required>
                <br><br>
                
                <label for="Date"><b>Activity Start Date</b></label><br>
                <input type="date" id="date"value="<?= $StartDate ?>" name="start_date" required>
                <br>
                
                <label for="appt"><b>Activity Start Time</b></label><br>
                <input type="time" id="time" value="<?= $StartTime ?>"name="start_time">
                <br><br>
                
                <label for="category"><b>Category:</b></label><br>
                <select value="<?= $Category ?>" name="category" id="category">
                    <option value="Theater">Theater</option>
                    <option value="Calligraphy">Calligraphy</option>
                    <option value="Cross Talk">Cross Talk</option>
                    <option value="Xiangqi">Xiangqi</option>
                    <option value="Lion Dance">Lion Dance</option>
                    <option value="Diabolo">Diabolo</option>

                </select>
                <br><br>
                                                <label for="title"><b>Ticket Price</b></label><br>
                <input type="text" placeholder="Enter Ticket Price"value="<?= $value ?>" name="value" required>
                <br><br>
                                <label for="title"><b>No of Ticket</b></label><br>
                <input type="text" placeholder="Enter No of Ticket" value="<?= $people ?>"name="people" required>
                <br><br>
                
                <p>Click on the "Choose File" button to upload the event picture:</p>
                    <input type="file" accept="image/png, image/jpeg, imge/jpg" value=""name="act_image">
                    <br><br><br>

                <input type="submit" class="btn btn-primary" value="Update">
                <a href="add_activity.php" class="btn btn-outline-secondary">Go Back</a>

            </form>


</div>

