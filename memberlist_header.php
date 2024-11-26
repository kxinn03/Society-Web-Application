<?php
//memberlist_header.php
?>
<!DOCTYPE html>
<html>
    <head>
     <meta charset="UTF-8" />
     <title><?php echo $page_title ?></title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
              <a class="nav-link" href="event.php">Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="announcement.php">Announcement
              </a>
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
        </div>
  </div>
</nav>
    <div class="container p-4">
            <h1><?php echo $page_title ?></h1>
    </body>
</html>


