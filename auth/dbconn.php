<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn)
  {
  die("Failed to connect to MySQL: " . mysql_error());
  }
  
$db = mysql_select_db('test');
if(!$db)
die("Database selescetion failed" . mysql_errno());
