<?php
//edit-member.php
$page_title = 'Edit Booking';
include 'config.php';
include 'manage_header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bid = trim($_POST['bookingID']);
    $mid = trim($_POST['Username']);
    $tick = trim($_POST['numOfTicket']);
    $aid = trim($_POST['ActID']);
    
    if (empty($mid) || strlen($mid) > 30) {
        $error['memberID'] = 'Column Username must be fill in';
    }
   
    if (empty($aid)) {
        $error['ActID'] = 'Must fill in your account ID';
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
        $sql = "UPDATE booking SET Username = ?, numOfTicket = ?, ActID = ? WHERE bookingID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('siii', $mid, $tick, $aid, $bid);
        if ($stmt->execute()) {
            echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-success">Success!</h4>';
            echo "The <strong>$bid</strong> booking has been updated.</div>";
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
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <table class="table table-hover">
        <tr>
            <th>Booking ID :</th>
            <td><?= $bid ?>
                <input type="hidden" name="bookingID" 
                       value="<?= $bid ?>"></td>
        </tr>
        <tr>
            <th>Username :</th>
            <td><input type="text" 
                       class="form-control" 
                       name="Username" maxlength="30" 
                       value="<?= $mid ?>"></td>
        </tr>
        <tr>
            <th>No Of Ticket :</th>
            <td><input type="text" 
                       class="form-control" 
                       name="numOfTicket" maxlength="30" 
                       value="<?= $tick ?>"></td>
        </tr>
        <tr>
            <th>Account ID :</th>
            <td><input type="text" 
                       class="form-control" 
                       name="ActID" maxlength="30" 
                       value="<?= $aid ?>"></td>
        </tr>
    </table>
    <input type="submit" class="btn btn-primary" value="Update">
    <a href="manage.php" class="btn btn-outline-secondary">Cancel</a>
</form>


