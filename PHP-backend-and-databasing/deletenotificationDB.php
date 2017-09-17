<?php 
//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//delete notification
$notificationInfo = trim($_POST['notificationInfo']);
$urlVal = trim($_POST['urlVal']);  //included for validation
$dateVal = trim($_POST['dateVal']); //included for double validation
$delete = "DELETE FROM USERNOTIFICATIONS WHERE NOTIFICATION= '$notificationInfo' AND REDIRECTLINK = '$urlVal' AND DATE = '$dateVal'";
mysqli_query($connect, $delete);

// close connection
mysqli_close($connect);
?> 