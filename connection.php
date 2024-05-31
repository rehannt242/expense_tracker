<?php
$envm = parse_ini_file(".env");

$conn = mysqli_connect($envm["servername"], $envm["username"], $envm["password"],$envm["dbname"]);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";

