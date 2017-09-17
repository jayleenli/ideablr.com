<?php 
//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//Get values from edit profile page
$logUser = trim($_POST['logUser']);
$proUser = trim($_POST['proUser']);
$datePosted = $_POST['datePosted'];
$newProComment = $_POST['newProComment'];

$comment_info = "INSERT INTO USERPROFILECOMMENTS (COMMENTBYUSER, COMMENTFORUSER, DATE, COMMENT) VALUES ('$logUser','$proUser','$datePosted', '$newProComment')";
mysqli_query($connect, $comment_info);

//Send Notification
$redirect = "http://ideablr.com/profile.php?user=" . $proUser;
$notification = $logUser . " commented on your profile: " . $newProComment;

$notification_info = "INSERT INTO USERNOTIFICATIONS (FORUSER, FROMUSER, DATE, NOTIFICATION, REDIRECTLINK) VALUES ('$proUser','$logUser','$datePosted', '$notification', '$redirect')";
mysqli_query($connect, $notification_info);

// close connection
mysqli_close($connect);

?> 