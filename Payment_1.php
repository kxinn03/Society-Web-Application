<html>
    <head>
        <meta charset="UTF-8">
        <title>Payment - TARUC Chinese Language Society </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
        <link href="Payment.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="main.php">Chinese Language Society</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="main.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="v_allactivity.php">Activity
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="history.html">History</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="announcement.php">Announcement</a>
            </li>
            </ul>
    <ul class="logout">
        <a class="nav-link" href="logout.php"><button class="btn btn-secondary my-2 my-sm-0"><b>Logout</b></button></a>
    </ul>
          </div>
        </div>
      </nav>

<header>
    <br>

     <h1 id="wel">
         <p class="main text-center"><i>Payment</i></p>
       Please Fill Up All of Your Information!
    </h1>
</header>
</html>

<?php
// Include  file
$page_title = 'Payment Form';
include 'config.php';
 
// Processing form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = trim($_POST['fullname']);
    $phono = trim($_POST['phono']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $zip = trim($_POST['zip']);
    $cardname = trim($_POST['cardname']);
    $cardno = trim($_POST['cardno']);
    $pass = trim($_POST['pass']);
    $expmon = trim($_POST['expmon']);
    $expyear = trim($_POST['expyear']);
    $cvv = trim($_POST['cvv']);
    $db = mysqli_connect($servername, $username, $password, $dbname);

    //check Full Name is empty
    if (empty($fullname)) {
        $error['fullname'] = 'Please Enter A Full Name.';
    }
    
    //check Phone Number pattern
    $pattern = "/^[0-9]{3}-[0-9]{3}-[0-9]{4}/";
    if (!preg_match($pattern, $phono)) {
        $error['phono'] = 'Invalid digit. Please Enter A Phone Number.';
    }

    //check Email is empty
    $pattern = "/^[a-zA-Z0-9]+@[a-zA-Z0-9-]+([a-zA-Z0-9-]+)/";
    if (!preg_match($pattern, $email))  {
        $error['email'] = 'Invalid Format. Please Enter A Email.';
    }
    
    //check Address is empty
    if (empty($address)) {
        $error['address'] = 'Please Enter A Address.';
    }

    //check City is empty
    if (empty($city)) {
        $error['city'] = 'Please Enter A City.';
    }
     
    //check State is empty
    if (empty($state)) {
        $error['state'] = 'Please Enter A State.';
    }
    
    //check Zip is empty
    $pattern = "/^[0-9]{5}/";
    if (!preg_match($pattern, $zip)) {
        $error['zip'] = 'Invalid Format. Please Enter A Zip.';
    }

    //check Card Name is empty
    if (empty($cardname)) {
        $error['cardname'] = 'Please Enter A Card Name.';
    }
    
     //check Card Number is empty
    $pattern = "/^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}/";
     if (!preg_match($pattern, $cardno)) {
        $error['cardno'] = 'Invalid Format. Please Enter A Card Number.';
    }
    
    //check Password is empty
    if (empty($pass)) {
        $error['pass'] = 'Please Enter A Password.';
    }

    //check Exp Month is empty
    if (empty($expmon)) {
        $error['expmon'] = 'Please Enter A Exp Month.';
    }
    
    //check Exp Year is empty
    $pattern = "/^[0-9]{4}/";
    if (!preg_match($pattern, $expyear)) {
        $error['expyear'] = 'Please Enter A Exp Year.';
    }

    //check CVV is empty
    $pattern = "/^[0-9]{3}/";
    if (!preg_match($pattern, $cvv))  {
        $error['cvv'] = 'Please Enter A CVV.';
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
        $sql = "INSERT INTO payment (fullname, phono, email, address, city, state, zip, cardname, cardno,pass, expmon, expyear, cvv) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssssssss',$fullname, $phono, $email, $address, $city, $state, $zip, $cardname, $cardno, $pass, $expmon, $expyear, $cvv);
        $result = $stmt->execute();
        echo '<div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-success">Success!</h4>';
        echo "Payment <strong>$fullname</strong> has been created.</div>";
    }
}
?>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->


<html>
    

 <div class="container">
        <h3><--Payment Form--></h3> <br/>
        <h3>Billing Address</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <table> 
                <tr>
                  <td><i class="fa fa-user"></i><b>   Full Name:</b></td>
                  <td>
                      <input type="text"name="fullname"class="form"placeholder="Zhang Yun Lei"id="title"minlength="3" maxlength="50"required>
                  </td>
                   
 
                
              </tr>  
              
                <tr>
                  <td><i class="fa fa-phone"></i><b>   Phone Number:</b></td>
                  <td>
                      <input type="text"name="phono"class="form"placeholder="016-123-4567"id="phono"required>
                  </td>
                    
                  
              </tr> 
             
             <tr>
                <td><i class="fa fa-envelope"></i><b>   Email:</b></td>
                <td>
                      <input type="text"name="email"class="form"placeholder="zhangyunlei@example.com"id="email"required>
                </td>

            </tr>             
 
            <tr>
                  <td><i class="fa fa-address-card-o"></i><b>   Address:</b></td>
                  <td>
                      <input type="text"name="address"class="form"placeholder="111 Jalan 92/30, Kampung Zhang"id="address"required>
                  </td>

                
              </tr>               
              
                <tr>
                  <td><i class="fa fa-institution"></i><b>   City:</b></td>
                  <td>
                      <input type="text"name="city"class="form"placeholder="Petaling Jaya"id="city"required>
                  </td>
                    

                
              </tr> 
              
                <tr>
                  <td><b>State:</b></td>
                  <td>
              <select class="form" id="state" name="state" required>
              <option>Johor</option>
              <option>Kedah</option>
              <option>Kelantan</option>
              <option>Malacca</option>
              <option>Negeri Sembilan</option>
              <option>Pahang</option>
              <option>Penang</option>
              <option>Perak</option>
              <option>Perlis</option>
              <option>Sabah</option>
              <option>Sarawak</option>
              <option>Selangor</option>
              <option>Terengganu</option>
              <option>Kuala Lumpur</option>
              <option>Labuan</option>
              <option>Putrajaya</option>
            </select>                      
                  </td>
              </tr>              
             
             <tr>
                <td><b>Zip:</b></td>
                <td>
                      <input type="text"name="zip"class="form"placeholder="12356"id="zip"minlength="5" maxlength="5"required>
                </td>

            </tr>
            
            <tr>
                <td><h3>Accepted Cards</h3></td>     
                <td><i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i></div
              
            </tr>   
            
            <tr>
                  <td><b>Card Name:</b></td>
                  <td>
                      <input type="text"name="cardname"class="form"placeholder="ZHANG YUN LEI"id="cardname"required>
                  </td>
                    

              </tr>  
              
                <tr>
                  <td><b>Card Number:</b></td>
                  <td>
                      <input type="text"name="cardno"class="form"placeholder="1111-2222-3333-4444"id="CardNo"required>
                  </td>

                
              </tr> 
             
             <tr>
                <td><b>Password:</b></td>
                <td>
                      <input type="text"name="pass"class="form"placeholder="12ab34cd"id="pass"required>
                </td>

                
            </tr>
        
                <tr>
                  <td><b>Exp Month:</b></td>
                  <td>
          <select class="form" id="expmon" name="expmon" required>
          <option>January</option>
          <option>February</option>
          <option>March</option>
          <option>April</option>
          <option>May</option>
          <option>June</option>
          <option>July</option>
          <option>August</option>
          <option>September</option>
          <option>October</option>
          <option>November</option>
          <option>December</option>
        </select>                      
                  </td>
              </tr> 
             
             <tr>
                <td><b>Exp Year:</b></td>
                <td>
              <select class="form" id="expyear" name="expyear" required>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
                <option>2027</option>
                <option>2028</option>
                <option>2029</option>
                <option>2030</option>
              </select>                    
                </td>
            </tr>    
          
             <tr>
                <td><b>CVV:</b></td>
                <td>
                      <input type="text"name="cvv"class="form"placeholder="222"id="cvv"required>
                </td>

                
            </tr>              
            
            <tr>
                <td></td>
                <td colspan="7"><input type="submit" name="submit" class="btn btn-primary" value="Submit"/></td>
                <td><input type="hidden" name="submitted" value="TRUE"></td>
               <td> <a href="v_allactivity.php" class="btn btn-primary">Cancel</a></td>
            </tr>
            </table>
        </form>
    </div>
</body>
</html>
