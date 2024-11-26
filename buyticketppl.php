
<?php
include 'config.php';
session_start();
if (isset($_SESSION['username'])){
    $usernameInput= ($_SESSION['username']);
    
} else{
    header("Location: login.php");
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Activity - TARUC Chinese Language Society </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
        <link href="buyticketppl.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                            <a class="nav-link" href="aboutus.php">About Us</a>
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
            </br>

            <div class="text-light text-right title">
                <h1 class="display-6 text-center font-weight-bold heading">
                    <b>BUY TICKET       </b>     </div>

            <div>
                <form method="POST" action="buyticketppl.php">
            <!-- Grid -->
            <div class="w3-row">

                <a href="v_allactivity.php"id="back-to-series">
                    <div class="return"><img src="back1.png"alt="back"></div>
                </a>
                <div class="w3-col l7 s12">
<label for="fname">Your name:</label>
  <input type="text" id="fname" name="fname"class="fname"required style="margin-top: 30px;"><br><br>
                    <div class="w3-card-4 w3-margin w3-white">
                        <div class="w3-container">
                            <h3><b>Please Select Event & Quantity </b></h3>
                            <h5>Maximum 10</h5>
                            <div class="w3-container">
                                <div class="seat-container">              
                                <select id="eventseat" name="ActName">; 
                                    <?php         
                                            $sqlPro = "SELECT * FROM activity";
                                            $resultPro = mysqli_query($conn,$sqlPro);
                                            if (mysqli_num_rows($resultPro) > 0) {
                                                while ($rowPro = mysqli_fetch_assoc($resultPro)) {
                                                    echo'<option selected disabled hidden>Select an Event</option>';
                                                    echo '<option value="'.$rowPro["ActID"].'">' .($rowPro["ActName"]) . '</option>';
                                                }
                                            } else {
                                                echo '<option>No Product Found</option>';
                                            }
                                            ?>
                                        </select>      
                                
                                <div class="seatcontainer"> 
                                 <input type="number" class="amount" name="amount"value="0"min="1"max="10"style="margin-left: 50px;padding: 0px 20px;text-align: center;margin-top: 10px">
                                </div>     
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

                <!-- Introduction menu -->
                <div class="w3-col l5">
                    <!-- About Card -->
                    <div class="w3-card w3-margin w3-margin-top w3-white">
                        <img src="ticketimg.jpg" style="width:30rem; height:18rem;margin-left: 80px;" >
                       
                        <div>
                            <input type ="submit" id="submit"  value ="CheckOut" style="background-color:rgb(112, 214, 138);border: none;
  color: white;
  padding: 7px 233px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;;">
                        </div>
                    </div>
                </div>
            </div>
            </form>
            </div>

                </body>
                </html>
                                    
                            <?php
                            
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                
                                $newActID = $_POST['ActName'];
                                $newAmount = $_POST['amount'];    
                                $newMemberID = $_POST['fname'];
                            
                                $sqlinsert = "INSERT INTO booking(Username, ActID, numOfTicket) 
                                     VALUES ('$newMemberID', '$newActID','$newAmount')";

                                if(!mysqli_query($conn, $sqlinsert)){
                                   echo "<script>alert('Booking Failed'); window.history.go(-1);</script>";
                                   exit();
                                }  
                                
                                
    if (empty($_POST['ActName']) || empty($_POST['amount'])){
        $message = "<span > Booking Failed</span>";
    }
else{
$sqlupdate = "UPDATE activity SET people = people - '$newAmount' WHERE ActID = '$newActID'";}

                 
                                if(!mysqli_query($conn, $sqlupdate)){
                                    echo "<script>alert('Booking Failed'); window.history.go(-1);</script>";
                                    exit();
                                } else {
                                    echo "<script>alert('Booking Successfully'); window.location.href='Payment.php';</script>";
                                    exit();
                                }
                              
                            }




                            
                                 
                            
                            
