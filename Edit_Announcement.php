<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="Post_Announcement.css" rel="stylesheet" />
        <title>Edit Announcement - TARUC Chinese Language Society</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
</html>

<?php
//Edit_Announcement.php
$page_title = 'Edit Announcement';
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $date = trim($_POST['date']);
    $sender = trim($_POST['sender']);
    $content = $_POST['content'];

    
    //check date pattern
    $pattern = "/^[ 0-9]{4}-[0-9]{2}-[0-9]{2}/";
    if (!preg_match($pattern, $date)) {
        $error['date'] = 'Invalid digit. Please enter a date.';
    }
    if (empty($sender) || strlen($sender) > 30) {
        $error['name'] = 'Please insert a sender name within 30 characters.';
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
        $sql = "UPDATE announ SET date = ?, sender = ?, content = ? WHERE title = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $date, $sender, $content, $title); 
        if ($stmt->execute()) {
            echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-success">Success!</h4>';
            echo "Announcement <strong>$title</strong> has been updated.</div>";
        } else {
            echo '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-heading">Warning!</h4>
  <ul>';
            echo"<li>Database update error!</li>";
            echo '</ul></div>';
        }
    }
} else {
    $title = $_GET['title'] ?? '';

    $sql = "SELECT * FROM announ WHERE title = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $title);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title =  $row['title'];
        $date = $row['date'];
        $sender = $row['sender'];
        $content = $row['content'];
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
     <table class='table table-striped'>
                     <tr>
            <th>Title </th>
            <td><?= $title ?>
                <input type="hidden" name="title" 
                       value="<?= $title ?>"></td>
        </tr>
              
                <tr>
                  <td><b>Posted on:</b></td>
                  <td>
                      <input type="text"name="date"value="<?= $date ?>"class="form"placeholder="2022-09-09"id="date"required>
                  </td>
              </tr> 
              
                <tr>
                  <td><b>Sender:</b></td>
                  <td>
                      <input type="text"name="sender"value="<?= $sender ?>"class="form"placeholder="Sender Name"id="sender"minlength="3" maxlength="50"required>
                  </td>
              </tr>  
             
             <tr>
                <td valign="top"><b>Announcement Content:</b></td>
                <td>
                    <textarea rows="8" cols="100" value="" name="content"class="form"placeholder="Announcement Content"id="content"minlength="3" maxlength="1000" required><?= $content ?></textarea>
                </td>
            </tr>
    </table>
    <input type="submit" class="btn btn-primary" value="Update">
    <a href="Post_Announcement.php" class="btn btn-outline-secondary">Cancel</a>
</form>

