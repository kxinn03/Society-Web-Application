
<!DOCTYPE html>
<html>
    <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
     <link rel="stylesheet" href="member_list.css">
     
    </head>
    <body>
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
              <a class="nav-link" href="add_activity.php">Manage Activity</a>
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
              <a class="nav-link active" href="member_list.php">Member List</a>
                              <span class="visually-hidden">(current)</span>
            </li>
          </ul>
                          <ul class="logout">
                  <a class="nav-link" href="logout.php"><button class="btn btn-secondary my-2 my-sm-0"><b>Logout</b></button></a>
              </ul>
        </div>
  </div>
</nav>
    <div class="container p-4">
            <h1>Member List</h1>
    </body>
</html>


<?php
//list-member.php
include 'config.php';

$sql = "SELECT Username, Name, Email, Password, PhoneNo FROM member";
$result = $conn->query($sql);
$c1='Username';
$c2='Name';
$c3='Email';
$c4='Password';
$c5='PhoneNo';
if ($result->num_rows > 0) {
    echo "<table class='table table-striped' style='background-color: rgba(255,255,255,0.5)'><tr><th>Username</th><th>Name</th><th>Email</th><th>Password</th><th>Phone No</th><th></th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr style='background-color: rgba(255,255,255,0.5)' ><td style='color:black'>$row[$c1]</td><td style='color:black'>$row[$c2]</td><td style='color:black'>$row[$c3]</td><td style='color:black'>$row[$c4]</td><td style='color:black'>$row[$c5]</td>"
           ."<td><a href='edit-member.php?Username=$row[$c1]' class='btn btn-warning'>Edit</a> "
           ."<a href='delete-member.php?Username=$row[$c1]' class='btn btn-danger'>Delete</a></td></tr>";
    }
    echo "<tr><td colspan=5>$result->num_rows record(s) returned. "
            . "<a href='insert-member.php' class='btn btn-primary'>Insert Member</a><tr>";
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>


