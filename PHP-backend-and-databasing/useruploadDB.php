<?php 
$connect = new mysqli("XX.DATABASE.ADDRESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Gets rid of escape characters to prevent SQL injection 
$title = mysqli_real_escape_string($connect, $_POST['title']);

date_default_timezone_set("America/Chicago");
$mydate=getdate(date("U"));
$hours = $mydate[hours];
$MORA = "AM";
if ($hours > 12)
{
        $hours = $hours - 12;
        $MORA = "PM";
}
else {}
$minutes = $mydate[minutes];
$stringminutes = "" . (string)$minutes;
if ($minutes < 10)
{
        $stringminutes = "0" . $stringminutes;
}
$datePosted = substr($mydate[month], 0 ,3) . " " . $mydate[mday] . ", " . $mydate[year] . " at " . $hours . ":" . $stringminutes . " " . $MORA;

$tag = mysqli_real_escape_string($connect, $_POST['tag']);
$shortdescription = mysqli_real_escape_string($connect, $_POST['shortdescription']);
$introduction = mysqli_real_escape_string($connect, $_POST['introduction']);
$completionTime = mysqli_real_escape_string($connect, $_POST['completiontime']);
$materials = mysqli_real_escape_string($connect, $_POST['materials']);
$content = mysqli_real_escape_string($connect, $_POST['content']);
$sources = mysqli_real_escape_string($connect, $_POST['sources']);
$YT = mysqli_real_escape_string($connect, $_POST['video']);
$image1 = mysqli_real_escape_string($connect, $_POST['img1']);
$image2 = mysqli_real_escape_string($connect, $_POST['img2']);
$image3 = mysqli_real_escape_string($connect, $_POST['img3']);
$image4 = mysqli_real_escape_string($connect, $_POST['img4']);
$image5 = mysqli_real_escape_string($connect, $_POST['img5']);
$caption1 = mysqli_real_escape_string($connect, $_POST['img1cap']);
$caption2 = mysqli_real_escape_string($connect, $_POST['img2cap']);
$caption3 = mysqli_real_escape_string($connect, $_POST['img3cap']);
$caption4 = mysqli_real_escape_string($connect, $_POST['img4cap']);
$caption5 = mysqli_real_escape_string($connect, $_POST['img5cap']);
$image6 = mysqli_real_escape_string($connect, $_POST['img6']);
$image7 = mysqli_real_escape_string($connect, $_POST['img7']);
$image8 = mysqli_real_escape_string($connect, $_POST['img8']);
$image9 = mysqli_real_escape_string($connect, $_POST['img9']);
$image10 = mysqli_real_escape_string($connect, $_POST['img10']);
$caption6 = mysqli_real_escape_string($connect, $_POST['img6cap']);
$caption7 = mysqli_real_escape_string($connect, $_POST['img7cap']);
$caption8 = mysqli_real_escape_string($connect, $_POST['img8cap']);
$caption9 = mysqli_real_escape_string($connect, $_POST['img9cap']);
$caption10 = mysqli_real_escape_string($connect, $_POST['img10cap']);

//Check optional form input
if(!(empty($_POST['introduction']))) {}
else { $introduction = "";}
if(!(empty($_POST['sources']))) {}
else { $sources = "";}
//Change Youtubelink into embed link, so user doesn't have to find an embed link
if(!(empty($_POST['video']))) {
        $YTloc = strpos($YT,"=");
        $YTrest = substr($YT,$YTloc+1);
        $YTLink = "https://www.youtube.com/embed/" . $YTrest;
}
else { $YTLink = ""; }

//Check if the additional images exist
if(!(empty($_POST['img1']))) {}
else { $image1 = ""; $caption1 = ""; }
if(!(empty($_POST['img2']))) {}
else { $image2 = ""; $caption2 = "";}
if(!(empty($_POST['img3']))) {}
else { $image3 = ""; $caption3 = "";}
if(!(empty($_POST['img4']))) {}
else { $image4 = ""; $caption4 = "";}
if(!(empty($_POST['img5']))) {}
else { $image5 = ""; $caption5 = "";}
if(!(empty($_POST['img6']))) {}
else { $image6 = ""; $caption6 = "";}
if(!(empty($_POST['img7']))) {}
else { $image7 = ""; $caption7 = "";}
if(!(empty($_POST['img8']))) {}
else { $image8 = ""; $caption8 = "";}
if(!(empty($_POST['img9']))) {}
else { $image9 = ""; $caption9 = "";}
if(!(empty($_POST['img10']))) {}
else { $image10 = ""; $caption10 = "";}

//Check for empty captions
if(!(empty($_POST['img1cap']))) {}
else { $caption1 = "";}
if(!(empty($_POST['img2cap']))) {}
else { $caption2 = "";}
if(!(empty($_POST['img3cap']))) {}
else { $caption3 = "";}
if(!(empty($_POST['img4cap']))) {}
else { $caption4 = "";}
if(!(empty($_POST['img5cap']))) {}
else { $caption5 = "";}
if(!(empty($_POST['img6cap']))) {}
else { $caption6 = "";}
if(!(empty($_POST['img7cap']))) {}
else { $caption7 = "";}
if(!(empty($_POST['img8cap']))) {}
else { $caption8 = "";}
if(!(empty($_POST['img9cap']))) {}
else { $caption9 = "";}
if(!(empty($_POST['img10cap']))) {}
else { $caption10 = "";}

$featimageNM = basename($_FILES["photo"]["name"]);

session_start(); 
$logUser = $_SESSION["username"];
$target_dir = "article_images/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

//Check file size, 50kb max
if ($_FILES["photo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
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

//Test to see if article already exists, if so, delete and reupload (edit)
$detect_article ="SELECT * FROM ARTICLES WHERE ARTICLETITLE = '$title'";
$q = mysqli_query($connect, $detect_article);
$row_cnt_article = $q->num_rows;
if ($row_cnt_article >=1)
{
        //if article already exists
        $delete = "DELETE FROM ARTICLES WHERE ARTICLETITLE = '$title'";
        mysqli_query($connect, $delete);
}

$article_info = "INSERT INTO ARTICLES (ARTICLETITLE, AUTHOR, POSTED, TAG, SHORTDESC, FEATIMGNAME, YOUTUBELINK, CONTENT, IMGOne, CapOne, IMGTwo, CapTwo, IMGThree, CapThree, IMGFour, CapFour, IMGFive, CapFive, IMGSix, CapSix, IMGSeven, CapSeven, IMGEight, CapEight, IMGNine, CapNine, IMGTen, CapTen, INTRO, TIME, MATERIALS, SOURCES) VALUES ('$title','$logUser','$datePosted', '$tag', '$shortdescription', '$featimageNM','$YTLink', '$content', '$image1','$caption1', '$image2', '$caption2', '$image3', '$caption3', '$image4', '$caption4', '$image5', '$caption5', '$image6','$caption6', '$image7', '$caption7', '$image8', '$caption8', '$image9', '$caption9', '$image10', '$caption10', '$introduction', '$completionTime', '$materials','$sources' )";
mysqli_query($connect, $article_info);

//Check for errors
if ($uploadOk == 0) {
    header('Location: uploadform.php?upload=false');
}

//if everything is ok, try to upload file
else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
    {
        header('Location: diypage.php?article=' . $title);
    } 
    else 
    {
        header('Location: uploadform.php?upload=false');
    }
}

mysqli_close($connect);
?> 