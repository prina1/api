<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "teacher";


//creating connection 
$connection = new mysqli('localhost', 'root', '','teacher');

//checking connection 
if($connection->connect_error !=0) {
    die("Connection failed:" .$connection->connect_error);
}

//selecting database 
$connection -> select_db($database);
echo "Database connected sucessfully";
echo "<pre>";
print_r($connection);

?>