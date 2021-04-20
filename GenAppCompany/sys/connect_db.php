<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'tourgide_db');
$base_url = "";//"http://localhost:81/project_demo/" ;
 //database name

function getDB(){
  $servername = DB_SERVER;
  $username = DB_USERNAME;
  $password = DB_PASSWORD;
  $dbname = DB_DATABASE;
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET character_set_results=utf8"); // สำหรับแปลงค่าภาษาไทยให้ db อ่านได้
$conn->query("SET character_set_client=utf8");  // สำหรับแปลงค่าภาษาไทยให้ db อ่านได้
$conn->query("set names utf8");
//echo "Connected successfully";
return $conn;
}

?>
