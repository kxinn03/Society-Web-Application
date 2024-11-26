<?php
//insert-membert.php
$page_title = 'Insert Member';
include ("config.php");
include 'memberlist_header.php';

// Processing form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $birthday = trim($_POST['birthday']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);


   // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT Username FROM member WHERE username = ?";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            $stmt->close();
        }
    }

    if (empty($name)) {
        $error['name'] = 'Please Enter Your Name.';
    }
    
   if (empty($password)) {
        $error['password'] = 'Please Enter Password.';
    }
    
    if (empty($email)) {
        $error['email'] = 'Please Enter Email.';
    }
    
     //check birthday pattern
    $pattern = "/^[ 0-9]{4}-[0-9]{2}-[0-9]{2}/";
    if (!preg_match($pattern, $birthday)) {
        $error['phone'] = 'There are invalid characters in your
        <strong>birthday</strong>.';   
    }
 
    if (empty($address) ) {
        $error['address'] = 'Please enter your address .';
    }

    //check phoneNo pattern
    $pattern2 = "/^[0-9]{3}-[0-9]{8}/";
    if (!preg_match($pattern2, $phone)) {
            echo '<script type="text/javascript">
                        window.onload = function () { alert("Phone format incorrect."); }
            </script>';
        $error['phone'] = 'Phone format incorrect';
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
        $sql = "INSERT INTO member (Username, Name, Password, Email, Birthday, Address, PhoneNo) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssss',$username, $name, $password, $email, $birthday, $address, $phone);
        $result = $stmt->execute();
        echo '<div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-success">Success!</h4>';
        echo "Member <strong>$username</strong> has been inserted.</div>";
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <table class="table table-hover">
         <tr>
            <th>Username :</th>
            <td><input type="text" class="form-control" name="username" class="form" placeholder="Username" id="username"required></td>
        </tr>
        <tr>
            <th>Name :</th>
            <td><input type="text" class="form-control" name="name" maxlength="30" placeholder="Name"required></td>
        </tr>
         <tr>
            <th>Email :</th>
            <td><input type="email" class="form-control" name="email"class="form"placeholder="Email" id="email"required></td>
        </tr>
        <tr>
            <th>Birthday :</th>
            <td><input type="text" class="form-control" name="birthday"class="form"placeholder="YYYY-MM-DD" id="birthday"required></td>
        </tr>
        <tr>
            <th>Password :</th>
            <td><input type="password" class="form-control" name="password" class="form" placeholder="Password" id="password" required></td>
        </tr>
        <tr>
            <th>Address :</th>
            <td><input type="text" class="form-control" name="address" class="form" placeholder="Address" id="address" required></td>
        </tr>
         <tr>
            <th>Phone No :</th>
            <td><input type="tel" class="form-control" name="phone" class="form" placeholder="Contact Number: 012-34567899" id="phone" required></td>
        </tr>
    </table>
    <input type="submit" class="btn btn-primary" value="Insert">
    <a href="member_list.php" class="btn btn-outline-secondary">Cancel</a>
</form>


