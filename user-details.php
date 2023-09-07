<?php
session_start();
$userId = $_SESSION['userId'];

include_once("database.php");
$db = $conn;

define('profile', 'users');

if(!$userId){
  header("location:indexf.php");
}

function getUserbyId(){
    
    global $db;
    $userId = $_SESSION['userId'];
    $data = [];

    $query = "SELECT fname, lname FROM ".profile;
    $query .= " WHERE emailAddress = '$userId'";

    $result = $db->query($query);
    
    if($result->num_rows > 0) {
      $data = $result->fetch_assoc(); 
    } else {
       header("location:indexf.php");
    }

    return $data;
}