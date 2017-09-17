<?php 
//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//delete post
$currentarticle = trim($_POST['currentArticle']);
$logUser = trim($_POST['logUser']);
$comToDelete = trim($_POST['comToDelete']);
$delete = "DELETE FROM COMMENTS WHERE ARTICLETITLE = '$currentarticle' AND COMMENTBYUSER = '$logUser' AND CONTENT = '$comToDelete'";
mysqli_query($connect, $delete);

// close connection
mysqli_close($connect);
?> 