<?php 
//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//Get values from page
$logUser = trim($_POST['logUser']);
$currentarticle = trim($_POST['currentArticle']);

$del_fav ="DELETE FROM USERFAVORITES WHERE USERNAME = '$logUser' AND FAVEDARTICLE = '$currentarticle'";
$q = mysqli_query($connect, $del_fav);

// close connection
mysqli_close($connect);
?> 