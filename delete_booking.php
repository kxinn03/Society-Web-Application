<?php
//delete-member.php
$page_title = 'Delete Booking';
include 'config.php';
include 'manage_header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mid = trim($_POST['Username']);
    $bid = trim($_POST['bookingID']);
    $aid = trim($_POST['ActID']);

    $sql = "DELETE FROM booking WHERE bookingID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $bid);
    if ($stmt->execute()) {
        echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-success">Success!</h4>';
        echo "The <strong>$bid</strong> booking ID has been deleted."
        . "<a href='manage.php' class='btn btn-primary'>Back to List</a></div>";
    } else {
        echo '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-heading">Warning!</h4>
  <ul>';
        echo"<li>Database update error!</li>";
        echo '</ul></div>';
    }
} else {
    $bid = $_GET['bookingID'] ?? '';
    
    $sql = "SELECT * FROM booking WHERE bookingID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $bid);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $bid = $row['bookingID'];
        $mid = $row['Username'];
        $tick = $row['numOfTicket'];
        $aid = $row['ActID'];
    }
    ?>
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <p>Are you sure you want to delete the following booking?</p>
        <table class="table table-hover">
            
            <tr>
            <th>Booking ID :</th>
            <td><?= $bid ?>
                <input type="hidden" 
                       name='bookingID'
                       value="<?= $bid ?>"></td>
        </tr>
        <tr>
            <th>Username :</th>
            <td><?= $mid ?>
                <input type="hidden" 
                       name='Username'
                       value="<?= $mid ?>"></td>
        </tr>
        <tr>
            <th>No of ticket :</th>
            <td><?= $tick ?>
                <input type="hidden" 
                       name='numOfTicket'
                       value="<?= $tick ?>"></td>
        </tr><tr>
            <th>Account ID :</th>
            <td><?= $aid ?>
                <input type="hidden" 
                       name='ActID'
                       value="<?= $aid ?>"></td>
        </tr>
            
        </table>
        <input type="submit" class="btn btn-primary" value="Yes">
        <a href="manage.php" class="btn btn-outline-secondary">Cancel</a>
    </form>
    <?php
}


