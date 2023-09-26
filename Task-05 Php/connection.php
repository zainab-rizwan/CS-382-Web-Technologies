
<?php
session_start();
$servername= "localhost";
$user="root";
$password="";
$db="donations";

$conn= new mysqli($servername, $user, $password, $db) or die ("You are not connected");
?>