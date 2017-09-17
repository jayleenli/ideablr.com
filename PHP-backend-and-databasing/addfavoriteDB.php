<?php 
//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//Get values from edit profile page
$logUser = trim($_POST['logUser']);
$currentarticle = trim($_POST['currentArticle']);
$datePosted = $_POST['datePosted'];

//Test to see if article already exists, if so, delete and reupload (edit)
$detect_fav ="SELECT * FROM USERFAVORITES WHERE USERNAME = '$logUser' AND FAVEDARTICLE = '$currentarticle'";
$q = mysqli_query($connect, $detect_fav);
$row_cnt_article = $q->num_rows;
if ($row_cnt_article >=1)
{
        //if favorite already exists
}
else
{
$fav_info = "INSERT INTO USERFAVORITES (USERNAME, FAVEDARTICLE) VALUES ('$logUser','$currentarticle')";
mysqli_query($connect, $fav_info);
}

//Send Notification
$query = "SELECT AUTHOR FROM ARTICLES WHERE ARTICLETITLE = '$currentarticle'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($result);
$forUser = $row["AUTHOR"];
$redirect = "http://ideablr.com/diypage.php?article=" . $currentarticle;
$notification = $logUser . " favorited on your article \"" . $currentarticle ."\"!";

$notification_info = "INSERT INTO USERNOTIFICATIONS (FORUSER, FROMUSER, DATE, NOTIFICATION, REDIRECTLINK) VALUES ('$forUser','$logUser','$datePosted', '$notification', '$redirect')";
mysqli_query($connect, $notification_info);

// close connection
mysqli_close($connect);
?> 