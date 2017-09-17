<?php 
//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//Get values from edit profile page
$username = $_POST['username'];
$username = trim($username);
$dropdown_val = $_POST['dropdownVal'];
$bio_val = $_POST['bioVal'];

$query = "DELETE FROM USERPROFILE WHERE USERNAME='$username'";
mysqli_query($connect,$query);

$profile_info = "INSERT INTO USERPROFILE (USERNAME, BIO, FAVTAG) VALUES ('$username','$bio_val','$dropdown_val')";
mysqli_query($connect, $profile_info);

// close connection
mysqli_close($connect);
?> 