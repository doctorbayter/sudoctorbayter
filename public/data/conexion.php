<?php
$servername = "localhost"; //"jokibay87574.ipagemysql.com";
$username = "root"; //"jokybay4605";
$password = ""; //"bmJSmLZsma8RoR5uMr";
$dbname = "data_bayter"; //"doctor_bayter";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>