<!DOCTYPE html>
<html>
<head>
    <title>View and Manage Booking</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
  <link rel="stylesheet" href="manage.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

</html>
  
  
<?php
if (!isset($_COOKIE["name"])) {
    header("location: login.php");
}

//list-booking.php
include 'config.php';
include 'manage_header.php';

$sql = "SELECT bookingID, Username, numOfTicket, ActID FROM booking";
$result = $conn->query($sql);
$c1='bookingID';
$c2='Username';
$c3='numOfTicket';
$c4='ActID';
if ($result->num_rows > 0) {
    echo "<table class='table table-striped' style='background-color: rgba(255,255,255,0.5)'><tr><th>Booking ID</th><th>Username</th><th>No. Of Ticket</th><th>Activity ID</th><th></th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr style='background-color: rgba(255,255,255,0.5)' ><td style='color:black'>$row[$c1]</td><td style='color:black'>$row[$c2]</td><td style='color:black'>$row[$c3]</td><td style='color:black'>$row[$c4]</td>"
           ."<td><a href='edit.php?bookingID=$row[$c1]' class='btn btn-warning'>Edit</a> "
           ."<a href='delete_booking.php?bookingID=$row[$c1]' class='btn btn-danger'>Delete</a></td></tr>";
    }
$conn->close();
}
?>



