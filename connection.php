<?php
$host = "localhost";
$db_name = "dbname";
$username = "root";
$password = "dbpass";
 
try {
	$conn = mysqli_connect($host, $username, $password, $db_name);
}
 
//to handle connection error
catch(Exception $exception ){
    echo "Connection error: " . $exception->getMessage();
}
?>
