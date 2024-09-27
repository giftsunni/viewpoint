<?php
require 'constants.php';
// CONNECT TO DATABASE
$conn = new mysqli("localhost", "root", "", "blognew" );
// if (mysqli_errno($conn)) {
//     die(mysqli_error($conn));
// }
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function cleanInput($data){
  GLOBAL $conn;
  $data = trim($data);
  $data = strip_tags($data);
  $data = htmlentities($data);
  $data = $conn->real_escape_string($data);

  return $data;
}

