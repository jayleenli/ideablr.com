<?php 
//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//Get values from edit profile page
$logUser = trim($_POST['logUser']);
$articleTitle = trim($_POST['articleTitle']);
$datePosted = $_POST['datePosted'];
$newArticleComment = $_POST['newArtComment'];

$comment_info = "INSERT INTO COMMENTS (COMMENTBYUSER, ARTICLETITLE, DATEPOSTED, CONTENT) VALUES ('$logUser','$articleTitle','$datePosted', '$newArticleComment')";
mysqli_query($connect, $comment_info);

//Send Notification
$query = "SELECT AUTHOR FROM ARTICLES WHERE ARTICLETITLE = '$articleTitle'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($result);
$forUser = $row["AUTHOR"];
$redirect = "http://ideablr.com/diypage.php?article=" . $articleTitle;
$notification = $logUser . " commented on your article: " . $newArticleComment;

$notification_info = "INSERT INTO USERNOTIFICATIONS (FORUSER, FROMUSER, DATE, NOTIFICATION, REDIRECTLINK) VALUES ('$forUser','$logUser','$datePosted', '$notification', '$redirect')";
mysqli_query($connect, $notification_info);

// close connection
mysqli_close($connect);
?> 