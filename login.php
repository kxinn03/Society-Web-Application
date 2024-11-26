<?php
   include("config.php");
   session_start();
   $user = null;
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       
//////////////////////////////////////         member          //////////////////////////////////////////
        // username and password sent from member form 
        $usernameInput = $_POST['username'];
        $passwordInput = $_POST['logpass']; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $insert = "SELECT * FROM member WHERE Username=? and Password=?";
        $stmt = $conn->prepare($insert);
        $stmt->bind_param('ss', $usernameInput, $passwordInput);
        $stmt->execute();

        $result = $stmt->get_result(); // get the mysqli result
        $user = $result->fetch_assoc(); // fetch data  

        // Close statement
        $conn->close();
        
        if($user != null){  
                $_SESSION['username'] = $usernameInput;
                setcookie("name", $usernameInput, time()+1000, "/","", 0);
                // Redirect user to welcome page
                header("location: main.php");
                }else{
                echo "Oops! User not found or incorrect password.";
            }
            
//////////////////////////////////////             admin              ///////////////////////////////////////
        // username and password sent from user form 
        $adminusername = $_POST['adusername'];
        $adminpasswrd = $_POST['adlogpass']; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        $insert2 = "SELECT * FROM admin WHERE Username=? and Password=?";
        $stmt = $conn->prepare($insert2);
        $stmt->bind_param('ss', $adminusername, $adminpasswrd);
        $stmt->execute();
    
        $result = $stmt->get_result(); // get the mysqli result
        $admin = $result->fetch_assoc(); // fetch data  
  
        // Close statement
        $conn->close();
        
        if($admin != null){  
                setcookie("name", $adminusername, time()+1000, "/","", 0);
                // Redirect user to admin page
                header("location: admin.html");
                }else{
                echo '<script type="text/javascript">
                        window.onload = function () { alert("Opps! Username not found or incorrect password."); }
            </script>';
            }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TARUC Chinese Language Society</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="CHINESE LANGUAGE SOCIETY">
    <link href="logIn.css" rel="stylesheet"/>
</head>

<body>
	<header>
            <b>CHINESE LANGUAGE SOCIETY</b>
	</header>
	<div class="section">
		<div class="container">
            <h1>
                LOGIN
            </h1>
						<h2><span>MEMBER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>ADMIN</span></h2>
			          	<input class="checkbox" type="checkbox" id="choose" name="choose"/>
			          	<label for="choose"></label>
						<div class="log">
							<div class="log-rotate">
								<div class="memberlog">
									<div class="box">
										<div class="text-center">
											<h3>Member</h3>
											<form action="" method="post">
												<div class="formgrp">
													<input type="text"name="username"class="form"placeholder="Username"id="username"required>
													<input type="password"name="logpass"class="form"placeholder="Password"id="logpass"required>
													<input type="submit"value="Login"class="submit">
												</div>
												<a href="registermember.php" class="link">Don't have an account?</a>
											</form>
				      					</div>
			      					</div>
			      				</div>
								<div class="adminlog">
									<div class="box">
										<div class="text-center">
											<h3>Admin</h3>
											<form action="" method="post">
												<div class="formgrp">
													<input type="text"name="adusername"class="form"placeholder="Username"id="adusername"required>
													<input type="password"name="adlogpass"class="form"placeholder="Password"id="adlogpass"required>
													<input type="submit"value="Login"class="submit">
												
												</div>
												</form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
	      	</div>
	    </div>

</body>
</html>


