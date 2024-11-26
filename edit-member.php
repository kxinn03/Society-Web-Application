
<?php
//edit-student.php
$page_title = 'Edit Member';
include 'config.php';
include 'memberlist_header.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['Username']);
    $name = trim($_POST['Name']);
    $email = trim($_POST['Email']);
    $password = trim($_POST['Password']);
    $phoneNo = trim($_POST['PhoneNo']);

    if (empty($name) || strlen($name) > 30) {
        $error['name'] = 'Please insert a name within 30 characters.';
    }
    //check email is empty
    if (empty($email)) {
        $error['email'] = 'Please enter your email.';
    }
    //check password is empty
    if (empty($password)) {
        $error['password'] = 'Please your new password.';
    }
    //cehck phoneNo is empty
    if (empty($phoneNo)) {
        $error['phoneNo'] = 'Please your phone number.';
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
        $sql = "UPDATE member SET Name = ?, Email = ?, Password = ?, PhoneNo = ? WHERE Username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $name, $email, $password, $phoneNo, $username);
        if ($stmt->execute()) {
            echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-success">Success!</h4>';
            echo "Student <strong>$name</strong> has been updated.</div>";
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
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <table class="table table-hover">
        <tr>
            <th>Username :</th>
            <td><?= $username ?>
                <input type="hidden" name="Username" 
                       value="<?= $username ?>"></td>
        </tr>
        <tr>
            <th>Name :</th>
            <td><input type="text" 
                       class="form-control" 
                       name="Name" maxlength="30" 
                       value="<?= $name ?>"></td>
        </tr>
        <tr>
            <th>Email :</th>
            <td><input type="text" 
                       class="form-control" 
                       name="Email" maxlength="30" 
                       value="<?= $email ?>"></td>
        </tr><tr>
            <th>Password :</th>
            <td><input type="text" 
                       class="form-control" 
                       name="Password" maxlength="30" 
                       value="<?= $password ?>"></td>
        </tr><tr>
            <th>Phone No :</th>
            <td><input type="text" 
                       class="form-control" 
                       name="PhoneNo" maxlength="11" 
                       value="<?= $phoneNo ?>"></td>
        </tr>
    </table>
    <input type="submit" class="btn btn-primary" value="Update">
    <a href="member_list.php" class="btn btn-outline-secondary">Cancel</a>
</form>


