<?php 
//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//delete post
$currentarticle = trim($_POST['currentArticle']);
$delete = "DELETE FROM ARTICLES WHERE ARTICLETITLE = '$currentarticle'";
mysqli_query($connect, $delete);

header('Location: articledeleted.php');

// close connection
mysqli_close($connect);
?> 