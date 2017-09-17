<?php 
//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//delete post
$currentProfile = trim($_POST['currentprofile']);
$logUser = trim($_POST['logUser']);
$comToDelete = trim($_POST['comToDelete']);
$delete = "DELETE FROM USERPROFILECOMMENTS WHERE  COMMENTFORUSER = '$currentProfile' AND COMMENTBYUSER = '$logUser' AND COMMENT = '$comToDelete'";
mysqli_query($connect, $delete);

// close connection
mysqli_close($connect);
?> 