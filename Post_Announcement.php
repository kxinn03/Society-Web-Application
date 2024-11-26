<?php
// Include  file
$page_title = 'Post Announcement';
include 'config.php';
 
// Processing form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $date = trim($_POST['date']);
    $sender = trim($_POST['sender']);
    $content = trim($_POST['content']);


    //check title is empty
    if (empty($title)) {
        $error['title'] = 'Please Enter A Title.';
    }
    
    //check date pattern
    $pattern = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}/";
    if (!preg_match($pattern, $date)) {
        $error['date'] = 'Invalid digit. Please enter a date.';
    }

    //check content is empty
    if (empty($content)) {
        $error['content'] = 'Please Enter A Content.';
    }
     
    if (!empty($error)) {
        echo '<div class="alert alert-dismissible alert-warning">
       <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
       <h4 class="alert-heading">Warning!</h4>
       <ul>';
        foreach ($error as $e => $t) {
            echo"<li>$t</li>";
        }
        echo '</ul></div>';
    } else {
        $sql = "INSERT INTO announ (title, date, sender, content) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss',$title, $date, $sender, $content);
        $result = $stmt->execute();
        echo '<div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-success">Success!</h4>';
        echo "Announce title<strong>$title</strong> has been created.</div>";
    }
}
?>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->


<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="Post_Announcement.css" rel="stylesheet" />
        <title>Announcement - TARUC Chinese Language Society</title>  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>

    <div class="header">
        <h1>Announcement</h1>
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
          <a class="nav-link" href="add_activity.php">Manage Activity</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Post_Announcement.php">Announcement
            <span class="visually-hidden">(current)</span>
          </a>
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

    <br>

 <div class="container">
        <h3>Post Announcement</h3> <br/>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <table> 
                <tr>
                  <td><b>Announcement Title:</b></td>
                  <td>
                      <input type="text"name="title"class="form"placeholder="Title of Announcement"id="title"minlength="3" maxlength="50"required>
                  </td>
                    <td>
                    <?php
                    if (isset($error['title']))
                        showErrorIcon()
                        ?>
                </td>
              </tr>  
              
                <tr>
                  <td><b>Posted on:</b></td>
                  <td>
                      <input type="date"name="date"class="form"id="date" required>
                  </td>
                    <td>
                    <?php
                    if (isset($error['date']))
                        showErrorIcon()
                        ?>
                </td>
              </tr> 
                             <tr>
                  <td><b>Sender:</b></td>
                  <td>
                      <input type="text"name="sender"class="form"placeholder="Your Name..."id="sender"minlength="3" maxlength="50"required>
                  </td>
                    <td>
                    <?php
                    if (isset($error['sender']))
                        showErrorIcon()
                        ?>
                </td>
              </tr> 
             <tr>
                <td valign="top"><b>Announcement Content:</b></td>
                <td>
                    <textarea rows="8" cols="100" name="content"class="form"placeholder="Write the announcement content here..."id="content"minlength="3" maxlength="1000" required></textarea>
                </td>
                <td>
                    <?php
                    if (isset($error['content']))
                        showErrorIcon()
                        ?>
                </td>
            </tr>
           
            <tr>
                <td></td>
                <td colspan="7"><input type="submit" name="submit" class="btn btn-primary" value="Post"/></td>
                <td><input type="hidden" name="submitted" value="TRUE"></td>
            </tr>
            </table>
        </form>
    </div>
    
    <br><br>
    
        
     <div class="container">
         
        <table class='table table-striped'>
            <tr>             
                <th style="width:150px">Title</th>
                <th style="width:100px">Post On</th>
                <th>Sender</th>
                <th>Announcement Content</th>
                <th>Action</th>
            </tr>
            
   </div>
</body>
</html>

    <?php
        //list 
        $c2='title';
        $c3='date';
        $c4='content';
        $c5='sender';
        
        $p = $_GET['p']??'';
        $o = $_GET['o']??'';

        $sql = "SELECT title, date, sender, content FROM announ ORDER BY date DESC";
        $result = $conn->query($sql);
         $c2='title';
         $c3='date';
         $c4='content';
         $c5='sender';
        if ($result->num_rows > 0) { 
            while ($row = $result->fetch_assoc()) {
            echo "<tr><td>$row[$c2]</td><td>$row[$c3]</td><td>$row[$c5]</td><td>$row[$c4]</td>"
               . "<td><a href='Edit_Announcement.php?title=$row[$c2]' class='btn btn-warning'>Edit</a> "
               . "<a href='Dlt_Announcement.php?title=$row[$c2]' class='btn btn-danger'>Delete</a></td></tr>";
        }
        echo "<tr><td colspan=5>$result->num_rows record(s) returned. "
                . "<a href='Post_Announcement.php' class='btn btn-primary'>Post Announcement</a>";
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();             
  ?>

