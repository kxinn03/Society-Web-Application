
<?php
include 'config.php';
session_start();
if (isset($_SESSION['username'])){
    $usernameInput= ($_SESSION['username']);
    
} else{
    header("Location: login.php");
}

 ?>
<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
      $name = trim($_POST['Username']);
  }  
  $sql = "SELECT Username FROM member WHERE Username='$usernameInput'";
$result = $conn->query($sql);
  if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['Username'];
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TARUC Chinese Language Society</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="CHINESE LANGUAGE SOCIETY">
    <link href="main.css" rel="stylesheet"/>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            
    <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">

    <script src="main.js" type="text/javascript"  defer> </script>
</head>

<?php
$c1='Username';

$sql = "SELECT Username WHERE Username='$usernameInput'";

$result = $conn->query($sql);

?>

<body>
    <header>
        <div class="text-light text-right title">
           <h1 class="titlestyle">
            <b>WELCOME TO CHINESE LANGUAGE SOCIETY</b> 
            <div class="text-center"><b>HELLO</b> <?php
             echo "$name";
             ?>
            </div>
           <div>
            <b>  <h1 id="currentdate"></h1></b>


           </div>
        </h1>
         </div>
       </header>

       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="main.php">Chinese Language Society</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="main.php">Home
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="v_allactivity.php">Activity</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
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
      
   <!-- Blog entries -->
	<div class="w3-col l8 s12">
	  <!-- Blog entry -->
   
    <div class="w3-card-4 w3-margin w3-white">
      <div class="card-style">
		<div class="w3-container">
		  <h3><b>ACTIVIES</b></h3>
		  <h5>Organise by Chinese Language Society</h5>
		</div>
    <div class="slideshow-container">
    </br>
  
    <div class="mySlides1">
      <img src="mainweiqi.png" style="width:54rem; height:35rem;">
    </div>
    
    <div class="mySlides1">
      <img src="mainxiangqi.jpg" style="width:54rem; height:35rem;">
    </div>
    
    <div class="mySlides1">
      <img src="maintheater.jpeg" style="width:54rem; height:35rem;">
    </div>
    <div class="mySlides1">
      <img src="mainliondance.png" style="width:54rem; height:35rem;">
    </div>
    <div class="mySlides1">
      <img src="maincalligraphy.jpg" style="width:54rem; height:35rem;">
    </div>
    <div class="mySlides1">
      <img src="maincrosstalk.png" style="width:54rem; height:35rem;">
    </div>
    <div class="mySlides1">
      <img src="maindiabolo.jpg" style="width:54rem; height:35rem;">
    </div>

    <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
    <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
  
    </div>
		<div class="w3-container">
		  <p>Chinese Language Society currently hosts many programs such as Go (Weiqi), Chinese Chess (Xiangqi), Theater, Lion Dance, Calligraphy, Crosstalk, Diabolo and others. Chinese Language Society will also organize many activities in various programs such as calligraphy competitions, cross talk classes and so on. </p>
			<div class="w3-col m8 s12">
			  <p><a href="v_allactivity.php"><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></a></p>
			</div>
		  </div>
		</div>
	  </div>
    <div class="w3-card-4 w3-margin w3-bisque">
      <div class="aboutus">
      <h3 class="aboutus"><b>ABOUT US</b></h3>
      <img src="mainaboutus.png" alt="mainaboutus" style="width:100%; height:18rem;">
		<div class="w3-container">
		  <p>Want to learn more about the Chinese Language Society? Want to know the background story of our society? You can just click the READ MORE button to learn more about the Chinese Language Society!  </p>
			<div class="w3-col m8 s12">
			  <p><a href="aboutus.html"><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></a></p>
			</div>
		  </div>
		</div>
	</div>
	  <hr>
	</div>


  <div class="w3-col l4">
<div class="w3-card w3-margin w3-margin-top">
  <div class="profilecard">

  <img src="mainprofile.png" style="width:100%">
    <div class="w3-container w3-bisque">
      <h4><b>PROFILE</b></h4>
      <p>Want to view own details? Want to view ticket / booked event records?
        All you can look on profile page!
      </p>
      <p><a href="profile.php"><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></a></p>
    </div>
  </div>
</div>  <hr>


<div class="w3-card w3-margin">
  <div class="contactus">
  <img src="maincontactUs.jpg" style="width:100%">
  <div class="w3-container w3-bisque">
    <h4><b>CONTACT US</b></h4>
    <p>Address : Kampus Utama, Jalan Genting Kelang, 53300 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur
    </p>
    Phone : 016-6430676
  </div><hr> 
</div></div>

</div>    


  

<footer class="footer-distributed">

  <div class="footer-left">

    <p class="footer-links">
      <a class="link-1" href="main.php">Home</a>

      <a href="aboutus.html">About Us</a>

      <a href="v_allactivity.php">Activity</a>

      <a href="profile.php">Profile</a>

      <a href="history.php">History</a>
      
      <a href="announcement.php">Announcement</a>

    </p>

    <p>CHINESE LANGUAGE SOCIETY &copy; 2022</p>
  </div>

</footer>

</body>
</html>

    <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">

    <script src="main.js" type="text/javascript"  defer> </script>
</head>





