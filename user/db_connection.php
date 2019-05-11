<?php

$servername = "localhost";

$username = "root";

$password = "arifa";

$db = "hack";



// Create connection

$dbconn = mysqli_connect($servername, $username, $password, $db);



// Check connection

if (!$dbconn) {

   die("Connection failed: " . mysqli_connect_error());

}

//echo "Connected successfully";



?>