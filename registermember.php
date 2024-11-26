<?php
// Include config file
include("config.php");
 
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
    $pattern = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}/";
    if (!preg_match($pattern, $birthday)) {
        $error['birthday'] = 'There are invalid characters in your
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Register Member - TARUC Chinese Language Society</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="CHINESE LANGUAGE SOCIETY">
    <link href="registermember.css" rel="stylesheet"/>
    <script src="register.js" type="text/javascript" defer> </script>

</head>

<body>
<header>
    <b>CHINESE LANGUAGE SOCIETY</b>
        </header>
<div class="section">
        <div class="container">
    <h1>
        REGISTER
    </h1>
<div class="log">
    <div class="memberlog">
      <div class="box">
        <div class="text-center">
          <h3>Member Account</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="formgrp">
                    <input type="text"name="username"class="form"placeholder="Username"id="username"required>
                    <input type="text"name="name"class="form"placeholder="Name"id="name"required>
                    <input type="email" name="email"class="form"placeholder="Email" id="email"required>
                    <input type="text"name="birthday"class="form"placeholder="Birthday: 2000-01-01"id="birthday" required>
                    <input type="text"name="address"class="form"placeholder="Address"id="address"required>
                    <input type="tel" name="phone" class="form" placeholder="Contact Number: 012-34567899" id="phone" required>
                    <input type="password"name="password"class="form"placeholder="Password"id="password"required>
                    <input type="submit"value="Submit"class="submit">
                </div>
                  <p>Already have an account? <a href="login.php">Login here</a></p>
            </form>
        </div>
      </div>
    </div>
 </div>
 </div>
</div>

</body>
</html>


