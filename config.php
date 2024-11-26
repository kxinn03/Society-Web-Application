<?php
        $servername = "localhost";
        $username = "wong";
        $password = "0627@Xinyee";
        $dbname = "wong";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
?>