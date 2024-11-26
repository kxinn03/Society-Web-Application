<?php
//delete-member.php
$page_title = 'Delete Member';
include 'config.php';
include 'memberlist_header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['Username']);
    $name = trim($_POST['Name']);

    $sql = "DELETE FROM member WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    if ($stmt->execute()) {
        echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-success">Success!</h4>';
        echo "Member <strong>$name</strong> has been deleted."
        . "<a href='member_list.php' class='btn btn-primary'>Back to List</a></div>";
    } else {
        echo '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-heading">Warning!</h4>
  <ul>';
        echo"<li>Database update error!</li>";
        echo '</ul></div>';
    }
} else {
    $username = $_GET['Username'] ?? '';
    
    $sql = "SELECT * FROM member WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['Username'];
        $name = $row['Name'];
        $email = $row['Email'];
        $password = $row['Password'];
        $phoneNo = $row['PhoneNo'];
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <p>Are you sure you want to delete the following student?</p>
        <table class="table table-hover">
            <tr>
                <th>Username :</th>
                <td><?= $username ?>
                    <input type="hidden" name='Username'
                           value="<?= $username ?>"></td>
            </tr>
            <tr>
                <th>Name :</th>
                <td><?= $name ?>
                    <input type="hidden" name='Name'
                           value="<?= $name ?>"></td>
            </tr>
            <tr>
                <th>Email :</th>
                <td><?= $email ?>
                    <input type="hidden" name='Email' 
                           value="<?= $email ?>"></td>
            </tr>
            <tr>
                <th>Password :</th>
                <td><?= $password ?>
                    <input type="hidden" name='Password'
                           value="<?= $password ?>"></td>
            </tr>
            <tr>
                <th>Phone Number :</th>
                <td><?= $phoneNo ?>
                    <input type="hidden" name='PhonNo'
                           value="<?= $phoneNo ?>"></td>
            </tr>
        </table>
        <input type="submit" class="btn btn-primary" value="Yes">
        <a href="member_list.php" class="btn btn-outline-secondary">Cancel</a>
    </form>
    <?php
}


