<?php 
//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Gets rid of escape characters to prevent SQL injection 
$first_name = mysqli_real_escape_string($connect, $_POST['Fname']);
$last_name = mysqli_real_escape_string($connect, $_POST['Lname']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$username = mysqli_real_escape_string($connect, $_POST['Uname']);
$pass = mysqli_real_escape_string($connect, $_POST['psw']);

$query = "SELECT * FROM USERLIST WHERE USERNAME = '$username'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($result);
$row_cnt = $result->num_rows;
if ($row_cnt >0)
{
       header('Location: signup.html?usernametaken=true'); //if username is taken
}
else {
//Information that is inserted into the Userlist table
$user_info = "INSERT INTO USERLIST (FIRSTNAME, LASTNAME, EMAIL, USERNAME, PASS) VALUES ('$first_name', '$last_name', '$email', '$username', '$pass')";

if(mysqli_query($connect, $user_info))
{
   	header('Location: login.html?newAccount=made');
	exit;
} else{
    echo "ERROR: Could not able to execute $user_info. " . mysqli_error($connect);
}
}
// close connection
mysqli_close($connect);
?> 