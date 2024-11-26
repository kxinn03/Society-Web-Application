<?php
include 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
 <head>
     <meta charset="UTF-8" />
     <title>Update Ticket - TARUC Chinese Language Society</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
     <link rel="stylesheet" href="updticket.css">

</head>
<body>
    <?php
   
echo "<div class='header'>";
echo "<h1>UPDATE &nbsp; TICKET &nbsp; AVAILABLE</h1>";
echo '</div>';
echo '';
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">';
echo '<div class="container-fluid">';
echo '<a class="navbar-brand" href="admin.html">Chinese Language Society</a>';
echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">';
echo '<span class="navbar-toggler-icon"></span>';
echo '</button>';
echo '<div class="collapse navbar-collapse" id="navbarColor02">';
echo '<ul class="navbar-nav me-auto">';
echo '<li class="nav-item">';
echo '<a class="nav-link" href="admin.html">Home</a>';
echo '</li>';
echo '<li class="nav-item">';
echo '<a class="nav-link" href="add_activity.php">Activity</a>';
echo '</li>';
echo '<li class="nav-item">';
echo '<a class="nav-link" href="Post_Announcement.php">Announcement';
echo '</a>';
echo '</li>';
echo '<li class="nav-item">';
echo '<a class="nav-link" href="manage.php">Manage Booking</a>';
echo '</li>';
echo '<li class="nav-item">';
echo '<a class="nav-link  active" href="updticket.php">Update Ticket</a>';
echo '<span class="visually-hidden">(current)</span>';
echo '</li>';
echo '<li class="nav-item">';
echo '<a class="nav-link" href="member_list.php">Member List</a>';
echo '</li>';
echo '</ul>';
echo '<ul class="logout">';
echo '<a class="nav-link" href="logout.php"><button class="btn btn-secondary my-2 my-sm-0"><b>Logout</b></button></a>';
echo '</ul>';
echo '</div>';
echo '</div>';
echo '</nav>';
echo '';
echo '<!-- ACTIVITY 1   &&  ACTIVITY 2-->';
?>
    
    <div><form method="POST" action="updticket.php">
    <?php 

echo '<div class="section">';
echo '<div class="activity">';
echo '<img src="update-diabolo.jpg" alt="Diabolo" width="500" height="250">';
echo '<h3>---- Diabolo ----</h3>';
echo '';
echo '<div class="form-group">';
$sql8 = "SELECT * FROM activity WHERE Category='Diabolo'";
$result8 = $conn->query($sql8);
if ($result8->num_rows > 0) {
  echo "<table><tr><th>Activity Name</th><th>Ticket Amount</th></tr>";
  // output data of each row
  while($row = $result8->fetch_assoc()) {
    echo "<tr><td>"  . $row["ActName"]. "</td><td>" .$row["people"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
echo '<label for="exampleSelect1" class="form-label mt-4">Activity : </label>';
echo'<br>';
echo'<select id="eventseat" name="ActName">'; 
$sql2 = "SELECT * FROM activity WHERE Category='Diabolo'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {

echo '<option selected disabled hidden>Select Activity</option>';
  echo'<option value="'.$row["ActID"].'">' .($row["ActName"]).'</option>';}
echo'<input type="submit" id="submit" value="Update" class="done"style="float:right;">';
echo'<select id="amount" name="amount" style="margin-left: 10px;text-align: center;background-color: rgb(244, 81, 30);
  border: none;border-radius: 9px;color: white;padding: 8px 15px; float:right;text-align: center;font-size: 11px;opacity: 1;transition: 0.3s;
  position:flex;"><option value="none" selected disabled hidden>Select Amount</option><option value="1" >1</option><option value="2" >2</option> 
  <option value="3" >3</option><option value="4" >4</option><option value="5" >5</option></select>';
echo '</select>';
 
echo '</div>';
echo '</div>';
echo '';
echo '';
echo '<div class="activity">';
echo '<img src="update-calligraphy.jpg" alt="Calligraphy" width="500" height="250">';
echo '<h3>---- Calligraphy ----</h3>';
echo '';
echo '<div class="form-group">';
$sql9 = "SELECT * FROM activity WHERE Category='Calligraphy'";
$result9 = $conn->query($sql9);
if ($result9->num_rows > 0) {
  echo "<table><tr><th>Activity Name</th><th>Ticket Amount</th></tr>";
  // output data of each row
  while($row = $result9->fetch_assoc()) {
    echo "<tr><td>"  . $row["ActName"]. "</td><td>" .$row["people"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
echo '<label for="exampleSelect1" class="form-label mt-4">Activity : </label>';
echo'<br>';
echo'<select id="eventseat" name="ActName">'; 
$sql3 = "SELECT * FROM activity WHERE Category='Calligraphy'";
$result3 = $conn->query($sql3);
  // output data of each row
  while($row = $result3->fetch_assoc()) {
  echo '<option selected disabled hidden>Select Activity</option>';
  echo'<option value="'.$row["ActID"].'">' .($row["ActName"]).'</option>';}
echo'<input type="submit" id="submit" value="Update" class="done"style="float:right;">';
echo'<select id="amount" name="amount" style="margin-left: 10px;text-align: center;background-color: rgb(244, 81, 30);
  border: none;border-radius: 9px;color: white;padding: 8px 15px; float:right;text-align: center;font-size: 11px;opacity: 1;transition: 0.3s;
  position:flex;"><option value="none" selected disabled hidden>Select Amount</option><option value="1" >1</option><option value="2" >2</option> 
  <option value="3" >3</option><option value="4" >4</option><option value="5" >5</option></select>';
echo '</select>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '';
echo '';
echo '<!-- ACTIVITY 3   &&  ACTIVITY 4-->';
echo '<div class="section">';
echo '<div class="activity">';
echo '<img src="update-crosstalk.jpg" alt="Crosstalk" width="500" height="250">';
echo '<h3>---- Crosstalk ----</h3>';
echo '';
echo '<div class="form-group">';
$sql10 = "SELECT * FROM activity WHERE Category='Cross Talk'";
$result10 = $conn->query($sql10);
if ($result10->num_rows > 0) {
  echo "<table><tr><th>Activity Name</th><th>Ticket Amount</th></tr>";
  // output data of each row
  while($row = $result10->fetch_assoc()) {
    echo "<tr><td>"  . $row["ActName"]. "</td><td>" .$row["people"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
echo '<label for="exampleSelect1" class="form-label mt-4">Activity : </label>';
echo'<br>';
echo'<select id="eventseat" name="ActName">'; 
$sql4 = "SELECT * FROM activity WHERE Category='Cross Talk'";
$result4 = $conn->query($sql4);
  // output data of each row
  while($row = $result4->fetch_assoc()) {
echo '<option selected disabled hidden>Select Activity</option>';
  echo'<option value="'.$row["ActID"].'">' .($row["ActName"]).'</option>';}
echo'<input type="submit" id="submit" value="Update" class="done"style="float:right;">';
echo'<select id="amount" name="amount" style="margin-left: 10px;text-align: center;background-color: rgb(244, 81, 30);
  border: none;border-radius: 9px;color: white;padding: 8px 15px; float:right;text-align: center;font-size: 11px;opacity: 1;transition: 0.3s;
  position:flex;"><option value="none" selected disabled hidden>Select Amount</option><option value="1" >1</option><option value="2" >2</option> 
  <option value="3" >3</option><option value="4" >4</option><option value="5" >5</option></select>';
echo '</select>';
echo '</div>';
echo '</div>';
echo '';
echo '<div class="activity">';
echo '<img src="xiangqi_1.jpg" alt="Xiangqi" width="500" height="250">';
echo '<h3>---- Xiang Qi ----</h3>';
echo '';
echo '<div class="form-group">';
$sql11 = "SELECT * FROM activity WHERE Category='Xiangqi'";
$result11 = $conn->query($sql11);
if ($result10->num_rows > 0) {
  echo "<table><tr><th>Activity Name</th><th>Ticket Amount</th></tr>";
  // output data of each row
  while($row = $result11->fetch_assoc()) {
    echo "<tr><td>"  . $row["ActName"]. "</td><td>" .$row["people"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
echo '<label for="exampleSelect1" class="form-label mt-4">Activity : </label>';
echo'<br>';
echo'<select id="eventseat" name="ActName">'; 
$sql5 = "SELECT * FROM activity WHERE Category='Xiangqi'";
$result5 = $conn->query($sql5);
  // output data of each row
  while($row = $result5->fetch_assoc()) {
echo '<option selected disabled hidden>Select Activity</option>';
  echo'<option value="'.$row["ActID"].'">' .($row["ActName"]).'</option>';}
echo'<input type="submit" id="submit" value="Update" class="done"style="float:right;">';
echo'<select id="amount" name="amount" style="margin-left: 10px;text-align: center;background-color: rgb(244, 81, 30);
  border: none;border-radius: 9px;color: white;padding: 8px 15px; float:right;text-align: center;font-size: 11px;opacity: 1;transition: 0.3s;
  position:flex;"><option value="none" selected disabled hidden>Select Amount</option><option value="1" >1</option><option value="2" >2</option> 
  <option value="3" >3</option><option value="4" >4</option><option value="5" >5</option></select>';
echo '</select>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '';
echo '';
echo '<!-- ACTIVITY 5   &&  ACTIVITY 6-->';
echo '<div class="section">';
echo '<div class="activity">';
echo '<img src="update-lion dance.jpeg" alt="LionDance" width="500" height="250">';
echo '<h3>---- Lion Dance ----</h3>';
echo '';
echo '<div class="form-group">';
$sql12 = "SELECT * FROM activity WHERE Category='Lion Dance'";
$result12 = $conn->query($sql12);
if ($result12->num_rows > 0) {
  echo "<table><tr><th>Activity Name</th><th>Ticket Amount</th></tr>";
  // output data of each row
  while($row = $result12->fetch_assoc()) {
    echo "<tr><td>"  . $row["ActName"]. "</td><td>" .$row["people"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
echo '<label for="exampleSelect1" class="form-label mt-4">Activity : </label>';
echo'<br>';
echo'<select id="eventseat" name="ActName">'; 
$sql6 = "SELECT * FROM activity WHERE Category='Lion Dance'";
$result6 = $conn->query($sql6);
  // output data of each row
  while($row = $result6->fetch_assoc()) {
echo '<option selected disabled hidden>Select Activity</option>';
  echo'<option value="'.$row["ActID"].'">' .($row["ActName"]).'</option>';}
echo'<input type="submit" id="submit" value="Update" class="done"style="float:right;">';
echo'<select id="amount" name="amount" style="margin-left: 10px;text-align: center;background-color: rgb(244, 81, 30);
  border: none;border-radius: 9px;color: white;padding: 8px 15px; float:right;text-align: center;font-size: 11px;opacity: 1;transition: 0.3s;
  position:flex;"><option value="none" selected disabled hidden>Select Amount</option><option value="1" >1</option><option value="2" >2</option> 
  <option value="3" >3</option><option value="4" >4</option><option value="5" >5</option></select>';
echo '</select>';
  
echo '</div>';
echo '</div>';
echo '';
echo '<div class="activity">';
echo '<img src="update-threater.jpg" alt="Theater" width="500" height="250">';
echo '<h3>---- Theater ----</h3>';
echo '';
echo '<div class="form-group">';
$sql13 = "SELECT * FROM activity WHERE Category='Theater'";
$result13 = $conn->query($sql13);
if ($result13->num_rows > 0) {
  echo "<table><tr><th>Activity Name</th><th>Ticket Amount</th></tr>";
  // output data of each row
  while($row = $result13->fetch_assoc()) {
    echo "<tr><td>"  . $row["ActName"]. "</td><td>" .$row["people"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
echo '<label for="exampleSelect1" class="form-label mt-4">Activity : </label>';
echo'<br>';
echo'<select id="eventseat" name="ActName">'; 

$sql7 = "SELECT * FROM activity WHERE Category='Theater'";
$result7 = $conn->query($sql7);
  // output data of each row
  while($row = $result7->fetch_assoc()) {
echo '<option selected disabled hidden>Select Activity</option>';
  echo'<option value="'.$row["ActID"].'">' .($row["ActName"]).'</option>';}
echo'<input type="submit" id="submit" value="Update" class="done"style="float:right;">';
echo'<select id="amount" name="amount" style="margin-left: 10px;text-align: center;background-color: rgb(244, 81, 30);
  border: none;border-radius: 9px;color: white;padding: 8px 15px;text-align: center;font-size: 11px;opacity: 1;transition: 0.3s;
  position:flex;"><option value="none" selected disabled hidden>Select Amount</option><option value="1" >1</option><option value="2" >2</option> 
  <option value="3" >3</option><option value="4" >4</option><option value="5" >5</option></select>';
echo '</select>';
 
echo '</div>';
echo '';
echo '</div>';
echo '</div>';
}?>
        </form>
            </div>
 <script src="upd_seat_avail.js"></script>
</body>
</html>

<?php
                            
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                
                                $newActID = $_POST['ActName'];
                                $newAmount = $_POST['amount'];    
                                $newMemberID = 1;

                                $sqlupdate = "UPDATE activity SET people = people + '$newAmount' WHERE ActID = '$newActID'";
                 
                                if(!mysqli_query($conn, $sqlupdate)){
                                    echo "<script>alert('Update Activity Failed'); window.history.go(-1);</script>";
                                    exit();
                                } else {
                                    echo "<script>alert('Booking Successfully'); window.location.href='updticket.php';</script>";
                                    exit();
                                }
                              
                            }


