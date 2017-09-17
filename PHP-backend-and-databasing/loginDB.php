<?php
session_start();

//connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Gets rid of escape characters to prevent SQL injection 
$username = mysqli_real_escape_string($connect, $_POST['Uname']);
$pass = mysqli_real_escape_string($connect, $_POST['psw']);

//Check to see if the information entered matches any in the database
	$query = "SELECT USERNAME,PASS FROM USERLIST WHERE USERNAME ='$username'";
	$result = mysqli_query($connect,$query);
	$row = mysqli_fetch_assoc($result);
	if ($row['USERNAME']==$username && $row['PASS'] == $pass) //if successful login
	{
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $pass;
		$usernamepass = "";
		if (isset($_POST['Unametext']))
		{
			$usernamepass = $_POST['Unametext'];
			$_SESSION["username"] = $usernamepass;
		}
		
		header('Location: index.php');
	}
	else //if unsuccessful login
        {
                header('Location: login.html?login=false');
        }
 
mysqli_close($connect);
?> 