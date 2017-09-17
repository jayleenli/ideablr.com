<?php 
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$profileImageName = basename($_FILES["photo"]["name"]);

session_start(); 
$logUser = $_SESSION["username"];
$target_dir = "profile_images/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

//Check file size, 50kb max
if ($_FILES["photo"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

//Check if file is an image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0; 
    }
}

//Test to see if profile pic already exists, if so, edit the photo
$detect_profilepic ="SELECT * FROM USERPROFILEPICS WHERE USERNAME = '$logUser'";
$q = mysqli_query($connect, $detect_profilepic);
$row_cnt_prof = $q->num_rows;
if ($row_cnt_prof >=1)
{
        //if profile pic already exists
        $delete = "DELETE FROM USERPROFILEPICS WHERE USERNAME = '$logUser'";
        mysqli_query($connect, $delete);
}

$article_info = "INSERT INTO USERPROFILEPICS (USERNAME, PROFILEPIC) VALUES ('$logUser','$profileImageName')";
mysqli_query($connect, $article_info);

//Check for errors
if ($uploadOk == 0) {
    header('Location: profile.php?upload=false');
}

//if everything is ok, try to upload file
else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
    {
        header('Location: profile.php?user=' . $logUser);
    } 
    else 
    {
        header('Location: profile.php?upload=false');
    }
}

mysqli_close($connect);
?> 