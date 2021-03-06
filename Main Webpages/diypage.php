<?php session_start(); ?>
<?php if(isset($_GET['logoff']))
{
	//Log Off
	session_destroy();
	header("Location: index.php");
}
?>
<?php //search
$connect = new mysqli("XX.DATABASE.ADDESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Get articlelink
if (isset($_GET['article']))
{

    $articleName = "" . trim($_GET['article']);
    $article_info = "SELECT * FROM ARTICLES WHERE ARTICLETITLE = '$articleName'"; 
    $result = mysqli_query($connect, $article_info);
    $row = mysqli_fetch_assoc($result);
        $row_cnt = $result->num_rows;
        if ($row_cnt == 0)
        {
                $articleTitle = 'This article does not exist!';
        }
        else
        {
                $articleTitle = $row['ARTICLETITLE'];
                $articleAuthor = $row['AUTHOR'];
                $articlePosted = $row['POSTED'];
                $articleTag = $row['TAG'];
                $articleDesc = $row['SHORTDESC'];
                $articleIMGURL = $row['FEATIMGNAME'];
                $articleYTURL = $row['YOUTUBELINK'];
                $articleContent = $row['CONTENT'];
                $articleIMGOne = $row['IMGOne'];
                $articleCapOne = $row['CapOne'];
                $articleIMGTwo = $row['IMGTwo'];
                $articleCapTwo = $row['CapTwo'];
                $articleIMGThree = $row['IMGThree'];
                $articleCapThree = $row['CapThree'];
                $articleIMGFour = $row['IMGFour'];
                $articleCapFour = $row['CapFour'];
                $articleIMGFive = $row['IMGFive'];
                $articleCapFive = $row['CapFive'];
                $articleIMGSix = $row['IMGSix'];
                $articleCapSix = $row['CapSix'];
                $articleIMGSeven = $row['IMGSeven'];
                $articleCapSeven = $row['CapSeven'];
                $articleIMGEight = $row['IMGEight'];
                $articleCapEight = $row['CapEight'];
                $articleIMGNine = $row['IMGNine'];
                $articleCapNine = $row['CapNine'];
                $articleIMGTen = $row['IMGTen'];
                $articleCapTen = $row['CapTen'];
                $articleIntro = $row['INTRO'];
                $articleTime = $row['TIME'];
                $articleMaterials = $row['MATERIALS'];
                $articleSources = $row['SOURCES'];
        }
}

//Get comments from database of currently viewed article
$query3 = "SELECT COMMENTBYUSER,ARTICLETITLE,DATEPOSTED,CONTENT FROM COMMENTS WHERE ARTICLETITLE = '$articleTitle'";
$result3 = mysqli_query($connect,$query3);
$commentArray = array();
$row_cnt3 = $result3->num_rows;
$numComments = 0;
        
//Place all comments into one array
while ($row3 = $result3->fetch_assoc()) 
{  
    array_push($commentArray, $row3["COMMENTBYUSER"], $row3["ARTICLETITLE"], $row3["DATEPOSTED"], $row3["CONTENT"]); 
    $numComments++;
}  

?>
<?php 
echo '<!DOCTYPE html> 
<html lang="en">

<head> 
	<meta charset ="utf-8"> 
	<title>' . $articleTitle . ' - ideablr</title> 
	<link rel="shortcut icon" href="favicon.ico" /> 
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<style>
	@import url("style.css");
 
 /*Editor\'s picks font*/	
h3   
{
	font-family: "Arial Black", Gadget, sans-serif;  
	font-weight: normal;  
	text-align: center;  
	color: #181933;  
	font-size: 1.5em;
}

/*Home search*/
div.begin
{
	position: static;
	background-position: center;
	background-size: cover;
	text-align: center;
    padding-top: 100px;
    padding-bottom: 100px;
	box-shadow: 5px 10px 8px #1e2234;
	width: 60%;
        height: 60%;
}

/*editor\'s picks box*/
div.editors
{
	text-align: left;
    padding: 1%;
	box-shadow: 5px 10px 8px #1e2234;
	width: 57%;
	background-color: rgba(100, 100, 0, 0.2);
        margin: auto;
        font: 16px Helvetica, Sans-Serif; 
        color: #404880;
        padding-top: 20px;
        white-space: initial;
}

pre {
 white-space: pre-wrap;       /* css-3 */
 white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
 white-space: -pre-wrap;      /* Opera 4-6 */
 white-space: -o-pre-wrap;    /* Opera 7 */
 word-wrap: break-word;       /* Internet Explorer 5.5+ */
 font-family: Helvetica;
 padding-top: 20px;
}

/*table */
ul.img-list {
  list-style-type: none;
  margin: 0;
  padding: 0;
  text-align: center;
}

ul.img-list li {
  display: inline-block;
  margin: 0 1em 1em 0;
  position: relative;
  z-index: 0;
}

.text {
   color: white; 
   font: bold 50px/55px Helvetica, Sans-Serif; 
   background: rgb(0, 0, 0); /* fallback color */
   background: rgba(0, 0, 0, 0.7);
   padding: 20px 0px 20px 0px; 
   width: 40%;
	box-shadow: 2px 2px 8px #1e2234;
	text-align: left;
	padding-left: 20px;
	margin-left: 15%;
        margin-top: 650px;
        float: left;
}

.text2 {
   color: white; 
   font: 18px Helvetica, Sans-Serif; 
   background: rgb(0, 0, 0); /* fallback color */
   background: rgba(0, 0, 0, 0.7);
   padding: 20px 0px 20px 0px; 
   width: 30%;
	top: 0;
	box-shadow: 2px 2px 8px #1e2234;
	text-align: left;
	padding-left: 20px;
	margin-right: 30%;
        margin-top: 0%;
   float: right;
   transform: translateY(-20%);
}

#profilepic {
    display: block;
    margin: auto;
    background: #fff;
    -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.4);
    -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.4);
    box-shadow: 0 1px 3px rgba(0,0,0,0.4);
    border-radius: 50%;
}
#profilepic {
    display: block;
    margin: auto;
    background: #fff;
    -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.4);
    -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.4);
    box-shadow: 0 1px 3px rgba(0,0,0,0.4);
    border-radius: 50%;
}

/*MAKE TITLE RESPONSIVE*/
@media screen and (max-width: 1700px)
{
        .text {
                 font: bold 40px/45px Helvetica, Sans-Serif;
                 margin-top: 600px;
        }
        .text2 {
                 
        }
}
@media screen and (max-width: 1595px)
{
        .text {
                 font: bold 40px/45px Helvetica, Sans-Serif;
                 margin-top: 550px;
        }
        .text2 {
                
        }
}
@media screen and (max-width: 1366px)
{
        .text {
                 font: bold 40px/45px Helvetica, Sans-Serif;
                 margin-top: 520px;
        }
        .text2 {
                font: 14px Helvetica, Sans-Serif; 
        }
}
@media screen and (max-width: 1290px)
{
        .text {
                 font: bold 30px/35px Helvetica, Sans-Serif;
                 margin-top: 510px;
        }
        .text2 {
        }
}
@media screen and (max-width: 1175px)
{
        .text {
                 font: bold 30px/35px Helvetica, Sans-Serif;
                 margin-top: 485px;
        }
        .text2 {
                font: 12px Helvetica, Sans-Serif; 
        }
}
@media screen and (max-width: 1100px)
{
        .text {
                 font: bold 30px/35px Helvetica, Sans-Serif;
                 margin-top: 465px;
        }
        .text2 {
        }
        pre {
                padding-top:25px;
        }
}
@media screen and (max-width: 1000px)
{
        .text {
                 font: bold 20px/25px Helvetica, Sans-Serif;
                 margin-top: 430px;
        }
        .text2 {
                font: 10px Helvetica, Sans-Serif; 
        }
        pre {
                
        }
}
@media screen and (max-width: 900px)
{
        .text {
                 font: bold 20px/25px Helvetica, Sans-Serif
                 margin-top: 430px;
        }
        .text2 {
                font: 10px Helvetica, Sans-Serif; 
                margin-right: 33%;
        }
        pre {
                padding-top:35px;
        }
}

div.tilebox {
	box-shadow: 2px 2px 8px #1e2234;
	margin: 5px;
	width: 320px;
	height: 320px;
	background-image: url("images/filler.jpg");
    background-size: 320px 320px;
}

table.tile {
	width: 80%;
	margin: auto;
}
.wordbox {	
	position: absolute; 
    margin: left; 
    width: 80%; 
}




.text-content {
  background: rgba(254, 240, 243,0.7);
  color: #181933;
  font-weight: bold;
	width: 310px;
	height: 225px;
  opacity: 0;
  padding: 5px;
  -webkit-transition: opacity 500ms;
  -moz-transition: opacity 500ms;
  -o-transition: opacity 500ms;
  transition: opacity 500ms;
}

.text:hover.text-content{
	opacity: 1;
}

.text-content:hover{
	opacity: 1;
	background-color: white;
}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  max-height: 600px;
  position: relative;
  margin: auto;
  overflow:hidden;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.caption {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
  background: rgba(0, 0, 0, 0.7);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor:pointer;
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
.commentBox
{
border: none;
padding: 5px;
font: 16px;
width: 100%;
height: 300px;
overflow: auto;

}

.commentInside
{
    background-color: #f7f7ff;
    margin-bottom: 10px;
    border-radius: 10px;
    padding: 5px;
}
.commentLine
{
    padding-bottom: 10px;
}

.commenterName
{
        font-size: 18px;
        color: #315cd8;
        font-weight: bold;
}

.commenterTime
{
        font-size: 12px;
        color: #656c7a;
}

.insertComment
{
        width:82%; 
        margin-left: 5px;
         z-index:5;
        margin-bottom: 2px;
}

.insertCommentForm
{
        margin-bottom: 10px;
         z-index:5;
}
.insertCommentButton
{
        width:10%;
        margin-top:3px;
        float:right;
        margin-right: 3%;
        padding: 1% 2% 1% 2%;
        color: #ffffff;
        border: 1px solid #315cd8;
        border-radius: 5px;
    text-shadow: 0px 1px 1px #ffffff;
    border-bottom: 2px solid #acc3fd;
    background-color: #315cd8;
    background: -webkit-gradient(linear, left top, left bottom, from(#acc3fd), to(#315cd8));
    margin-bottom: 10px;
     z-index:5;
}

button.insertCommentButton:hover, button.insertCommentButton:active 
{
    background: -webkit-gradient(linear, left top, left bottom, from(#315cd8), to(#acc3fd));
}

button.buttonfloat
{
    -webkit-transition: .25s ease-in-out;
    -moz-transition: .25s ease-in-out;
    -o-transition: .25s ease-in-out;
    transition: .25s ease-in-out;
}
button.buttonfloat:hover, button.insertCommentButton:active
{
    -webkit-transform: translate(0,-.4em);
    -moz-transform: translate(0,-.4em);
    -o-transform: translate(0,-.4em);
    -ms-transform: translate(0,-.4em);
}
div#icons {
        text-align: right;
        float: right;
}
 .row { vertical-align: top; height:auto !important; }
 .list {display:none; }
 .show {display: none; }
 .hide:target + .show {display: inline; }
 .hide:target {display: none; }
 .hide:target ~ .list {display:inline; }
 @media print { .hide, .show { display: none; } }
 
 a.hide:link {
         color:#404880;
 }
 a.hide:hover {
         color:#404880;
         text-decoration:none;
 }
 a.hide:visited {
         color:#404880;
 }
 a.show:link {
         color:#404880;
 }
 a.show:hover {
         color:#404880;
         text-decoration:none;
 }
 a.show:visited {
         color:#404880;
 }
 
 hr {
    border: 0;
    border-bottom: 1px dashed #ccc;
    background: #999;
    margin-top:-20px;
}

div.stars {
  width: 350px;
  display: inline-block;
  float:right;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 7px;
  font-size: 32px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: "\f005";
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: "\f006";
  font-family: FontAwesome;
}
'; ?>
<?php if (isset($_SESSION['username'])): //This is the responsive design of the footer when logged in?>
<?php echo 
		'@media screen and (max-width: 1020px)
		{
			ul.footlist li:first-child {
				float: left;
						
			}
			.foot {
				transform: translateX(0%);
				margin: auto;
			}
			ul.footlist li:last-child {
				float: right;
				transform: translateY(35%);
			}
				}
		@media screen and (max-width: 999px)
		{
			ul.footlist li:first-child {
				float: left;
						
			}
			.foot {
				transform: translateX(3%);
				margin: auto;
			}
			ul.footlist li:last-child {
				float: right;
				transform: translateY(40%);
			}
			
		}
		@media screen and (max-width: 865px)
		{
			ul.footlist li:first-child {
				float: left;
				padding-left: 38%;
				padding-right: 10%;
			}
			.foot {
				transform: translateX(-13%);
				margin: auto;
				padding-bottom: 10%;
				padding-left: 20%;
				width: 90%;
			}
			.foot img {
				width: 5%;
			}
			ul.footlist li:last-child {
				float: none;
				transform: translateY(-40%);
				padding-left: 8%;
			}
			.footleft {
				width: 80%;
			}
			#body {
				padding-bottom:100%;
			}
		}
		
		@media screen and (max-width: 700px)
		{
			ul.footlist li:first-child {
				float: left;
				padding-left: 35%;
				padding-right: 10%;
			}
			.foot {
				transform: translateX(-13%);
				margin: auto;
				padding-bottom: 20%;
				padding-left: 20%;
				width: 90%;
			}
			.foot img {
				width: 6%;
			}
			ul.footlist li:last-child {
				float: none;
				transform: translateY(-100%);
				padding-left: 12%;
			}
			.footleft {
				width: 70%;
			}
		}
		
		@media screen and (max-width: 600px)
		{
			ul.footlist li:first-child {
				float: left;
				padding-left: 32%;
				padding-right: 10%;
			}
			.foot {
				transform: translateX(-13%);
				margin: auto;
				padding-bottom: 15%;
				padding-left: 20%;
				width: 90%;
			}
			.foot img {
				width: 7%;
			}
			ul.footlist li:last-child {
				float: none;
				transform: translateY(-70%);
				padding-left: 20%;
			}
			.footleft {
				width: 60%;
			}
		}
		
		
		@media screen and (max-width: 450px)
		{
			ul.footlist li:first-child {
				float: left;
				padding-left: 28%;
				padding-right: 10%;
			}
			.foot {
				transform: translateX(-13%);
				margin: auto;
				padding-bottom: 15%;
				padding-left: 20%;
				width: 90%;
			}
			.foot img {
				width: 5%;
			}
			ul.footlist li:last-child {
				float: none;
				transform: translateY(-50%);
				padding-left: 33%;
			}
			.footleft {
				width: 50%;
			}
		}
        ';?>
<?php else: //responsive design of footer when NOT logged in?>
<?php echo'
		@media screen and (max-width: 1021px)
		{
			ul.footlist li:first-child {
				float: left;
						
			}
			.foot {
				transform: translateX(2%);
				margin: auto;
			}
			ul.footlist li:last-child {
				float: right;
				transform: translateY(20%);
			}
			
		}
		@media screen and (max-width: 865px)
		{
			ul.footlist li:first-child {
				float: left;
				padding-left: 38%;
				padding-right: 10%;
			}
			.foot {
				transform: translateX(-13%);
				margin: auto;
				padding-bottom: 10%;
				padding-left: 20%;
				width: 90%;
			}
			.foot img {
				width: 5%;
			}
			ul.footlist li:last-child {
				float: none;
				transform: translateY(-40%);
				padding-left: 8%;
			}
			.footleft {
				width: 80%;
			}
			#body {
				padding-bottom:100%;
			}
		}
		
		@media screen and (max-width: 700px)
		{
			ul.footlist li:first-child {
				float: left;
				padding-left: 35%;
				padding-right: 10%;
			}
			.foot {
				transform: translateX(-13%);
				margin: auto;
				padding-bottom: 20%;
				padding-left: 20%;
				width: 90%;
			}
			.foot img {
				width: 6%;
			}
			ul.footlist li:last-child {
				float: none;
				transform: translateY(-100%);
				padding-left: 12%;
			}
			.footleft {
				width: 70%;
			}
		}
		
		@media screen and (max-width: 600px)
		{
			ul.footlist li:first-child {
				float: left;
				padding-left: 32%;
				padding-right: 10%;
			}
			.foot {
				transform: translateX(-13%);
				margin: auto;
				padding-bottom: 15%;
				padding-left: 20%;
				width: 90%;
			}
			.foot img {
				width: 7%;
			}
			ul.footlist li:last-child {
				float: none;
				transform: translateY(-70%);
				padding-left: 20%;
			}
			.footleft {
				width: 60%;
			}
		}
		
		
		@media screen and (max-width: 450px)
		{
			ul.footlist li:first-child {
				float: left;
				padding-left: 28%;
				padding-right: 10%;
			}
			.foot {
				transform: translateX(-13%);
				margin: auto;
				padding-bottom: 15%;
				padding-left: 20%;
				width: 90%;
			}
			.foot img {
				width: 5%;
			}
			ul.footlist li:last-child {
				float: none;
				transform: translateY(-50%);
				padding-left: 33%;
			}
			.footleft {
				width: 50%;
			}
                        
	}';?> 
<?php endif; ?>
<?php echo '
</style> 
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<body> 

<!--START OF NAV -->
<div id="container">
<header>
	<h1 class="head"><!--NAVBAR BEGINS-->   
    <nav>
        <ul class="title" id="title">
        	<a href="index.php"><img id="pinkhead" class="left" src="images/ilogo.png" alt="" width="13%" height=""><!--logo --></a>
                <div class="right">
                    <li class="title"><a class="title" id="title" href="crafts.php">ARTS & CRAFTS</a></li>
                    <li class="title"><a class="title" href="food.php">FOOD</a></li>
                    <li class="title"><a class="title" href="technology.php">TECHNOLOGY</a></li>
                    <li class="title"><a class="title" href="other.php">OTHER</a></li>
                    <li class="icon"><a class="icona" href="javascript:void(0);" onclick="myFunction()"><strong>☰</strong></a></li>
        		 </div>
		</ul>
                '; ?>
<?php if (!isset($_SESSION['username'])): //if NOT logged in, show login/signupicon?>
<?php echo '
        <div class="dropdown">
        <div class="dropbtn"><img class="profileicon" src="images/loginicon.png" alt="" width="30px" /></div>
        <div class="dropdown-content">
        <a href="login.html">Login</a>
        <a href="signup.html">Sign Up</a>
        
            </div>
            </div>
	'?>
<?php else: // logged in - show user profile icon?>
<?php $name = $_SESSION["username"];
echo '
        <div class="dropdown">
        <div class="dropbtn"><img class="profileicon" src="images/userprofile.png" alt="" width="30px" /></div>
        <div class="dropdown-content">
        <a id="namer" href="profile.php?user=' . $name . '">'. $name.'</a>';
        $user = $_SESSION['username'];
                            $querynot = "SELECT * FROM USERNOTIFICATIONS WHERE FORUSER = '$user'";
                            $resultnot = mysqli_query($connect,$querynot);
                            $notificationlist = array();
                            $numNotifications = 0;
                            while ($rownot = $resultnot->fetch_assoc()) 
                            {  
                                array_push($notificationlist, $rownot["NOTIFICATION"], $rownot["REDIRECTLINK"], $rownot["DATE"]); 
                                //Date is included also to validate for deletion
                                $numNotifications++;
                            }
                            echo '
        <a id="myBtn" href="#">News (' . $numNotifications . ')</a>
        <a href="?logoff">Logout</a>
        
            </div>
            </div>
    '?>
<?php endif; ?>
	<?php echo'
        </nav>
    </h1>
    <h2 class="head2">ideablr: share your ideas<br/>a diy social media
    </h2><!--These words don\'t appear. They serve 2 purposes: 
    1.) so that the site has keywords that are searchable to search engines and 
    2.) so that the relatively positioned home search has something to be located relatively to. 
    (EDIT: also this was made back when i was a little more trash at HTML and CSS, pretty sure if we were to start this over again, this wouldnt exist. now my skills are less trashy, but im not going to redo the entire thing because that will drive me crazy. i really wished i had named my classes and ids a little better. smh past me.)-->
</header><!--NAVBAR ENDS--> 

<section>
<div id="body">

<!--POPUP THINGY-->
                    <!-- Trigger/Open The Modal -->
                        
                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                        
                          <!-- Modal content -->
                          <div class="modal-content">
                            <span class="close">&times;</span>
                            <!--Stuff inside popup-->';
                            echo'<div class="newstitle">You Have ' . $numNotifications . ' Notification(s)</div><br/><br/>';
                            for ($x = 0; $x < $numNotifications; $x++)
                            {
                                echo '<div onclick="location.href=\'' . substr($notificationlist[$x*3+1],0,440) .'\'"; class="newsbox">
                                <div class="closenews" onclick="deleteNotification(\''. $notificationlist[$x*3]. '\',\''. substr($notificationlist[$x*3+1],0,440) . '\',\'' . $notificationlist[$x*3+2] . '\');">&times;</div>' . 
                                    $notificationlist[$x*3] . '<br/>On ' . $notificationlist[$x*3+2] . '
                                    </div>';
                            }
                                    
                          echo'</div>
                          </div>
                            <!--End of Stuff-->

<!--FEATURED IMAGE-->
        <div id="articletitle" class="text">' . $articleTitle . ' </div>
	<center>
        <div class ="begin" style="background-image: url(article_images/' . $articleIMGURL . ');" width: 50%" align="center">
		<br/><br/><div style="padding: 20%"></div>
    </div></center>
    <div class="text2">
    <font size="1" color="gray">Written by </font><strong onMouseOver="this.style.color=\'#819ac1\'" 
    onMouseOut="this.style.color=\'#ffffff\'" style="cursor: pointer" onclick="location.href=\'profile.php?user=' . $articleAuthor . '\'";>' . $articleAuthor . '</a></strong><font size="1" color="gray"> on </font><strong>' . $articlePosted.  ' </strong>
    </div>
    
<!--TITLE/AUTHOR/FEAT PIC ENDS-->
<br/>
<!--ARTICLE -->
    <div class="editors">
    <!--Rating System via cssScript-->
        <div class="stars">
          <form>';
$articleRating_info = "SELECT * FROM ARTICLERATINGS WHERE ARTICLETITLE = '$articleName'"; 
$articleRatingResult = mysqli_query($connect, $articleRating_info);
$Ratingrow = mysqli_fetch_assoc($articleRatingResult);
$rowRating_cnt = $Ratingrow->num_rows;
if ($Ratingrow['NUMVOTES'] == "") 
{$numvotes = 0;}
else {$numvotes = $Ratingrow['NUMVOTES'];}
$articleRating = ceil($Ratingrow['RATING']);

            echo'<input class="star star-5" id="star-5" type="radio" name="star" '; if (isset($_SESSION['username'])) {echo 'onclick="rateArticle(5);"';} else{echo 'onclick="showRatingMessage();"';} if ($articleRating ==5){echo 'checked';} echo '/>
            <label class="star star-5" for="star-5"></label>
            <input class="star star-4" id="star-4" type="radio" name="star" '; if (isset($_SESSION['username'])) {echo 'onclick="rateArticle(4);"';} else{echo 'onclick="showRatingMessage();"';}if ($articleRating ==4){echo 'checked';} echo '/>
            <label class="star star-4" for="star-4"></label>
            <input class="star star-3" id="star-3" type="radio" name="star" '; if (isset($_SESSION['username'])) {echo 'onclick="rateArticle(3);"';} else{echo 'onclick="showRatingMessage();"';}if ($articleRating ==3){echo 'checked';} echo '/>
            <label class="star star-3" for="star-3"></label>
            <input class="star star-2" id="star-2" type="radio" name="star" '; if (isset($_SESSION['username'])) {echo 'onclick="rateArticle(2);"';} else{echo 'onclick="showRatingMessage();"';}if ($articleRating ==2){echo 'checked';} echo '/>
            <label class="star star-2" for="star-2"></label>
            <input class="star star-1" id="star-1" type="radio" name="star" '; if (isset($_SESSION['username'])) {echo 'onclick="rateArticle(1);"';} else{echo 'onclick="showRatingMessage();"';}if ($articleRating ==1){echo 'checked';} echo '/>
            <label class="star star-1" for="star-1"></label>
  </form>
  <br/><br/><br/>
  <div id="numberOfVotes" style="float:right;display: inline-block;position:relative; right:10px;"><span id="intVotes">' . $numvotes .'</span> Votes</div>
</div>
<br/><br/>
';?>
<?php echo '<br/><pre><br/>';
      echo '<br/><br/><img src="images/lightbulb.png" alt="" width="3%" height="" style="transform:translateY(10px);transform:translateX(0px)"><em style="position:relative; left:0%;">'. $articleDesc. '</em></pre>';?>
<?php if (isset($articleYTURL))
{
        if ($articleYTURL !="NULL" AND $articleYTURL !="")
        {
                echo '<center><iframe width="560" height="315" src="' . $articleYTURL . '" frameborder="0" allowfullscreen></iframe></center>';
        }
}
else
{
}
?>

<?php if (isset($articleIntro))
{
        if ($articleIntro !="NULL" AND $articleIntro !="")
        {
                echo '
                <h1>Introduction</h1><hr>
                
                <pre>' . $articleIntro . '</pre><br/>';
        }
}
else
{
}
?>
<?php echo ' 
<h1>Estimated Time to Complete</h1><hr>
<pre>';?><?php echo $articleTime; ?>
       <?php echo ' 
</pre><br/>
<div class="row">
<h1>Materials</h1><hr>
<pre>';?><?php echo $articleMaterials; ?>
       <?php echo ' 
</pre><br/>
<h1>Instructions</h1><hr>
<pre>';?><?php echo $articleContent; ?>
       <?php echo ' </pre><br/><br/>
';?>
<?php if (isset($articleSources))
{
        if ($articleSources !="NULL" AND $articleSources !="")
        {
               echo '
                <div class="row">
                <a href="#hide1" class="hide" id="hide1"><h1>+ Sources</h1></a>
                <a href="#show1" class="show" id="show1"><h1>- Sources</h1></a><hr>
                <div class="list">
                <pre>' . $articleSources . '</pre></div></div><br/>';
        }
}
else
{
}
?>
<?php if (isset($articleIMGOne))
{
        if ($articleIMGOne !="NULL" AND $articleIMGOne !="")
        {
                echo '
                <!--SLIDESHOW--><h1>Picture Slideshow</h1>
                <div class="slideshow-container">
                          <div class="mySlides fade">
                            <div class="numbertext"></div>
                            <img src="' . $articleIMGOne . '" style="width:100%">
                            <div class="caption">' . $articleCapOne . '</div>
                  </div>
                            
                            ';
                  if ($articleIMGTwo !="NULL" AND $articleIMGTwo !="")
                  {
                   echo '
                   <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="' . $articleIMGTwo . '" style="width:100%">
                    <div class="caption">' . $articleCapTwo . '</div>
                  </div>
                            
                            ';
                   }
                   
                   if ($articleIMGThree !="NULL" AND $articleIMGThree !="")
                  {
                   echo '
                   <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="' . $articleIMGThree . '" style="width:100%">
                    <div class="caption">' . $articleCapThree . '</div>
                  </div>
                            
                            ';
                   }
                   
                   if ($articleIMGFour !="NULL" AND $articleIMGFour !="")
                  {
                   echo '
                   <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="' . $articleIMGFour . '" style="width:100%">
                    <div class="caption">' . $articleCapFour . '</div>
                  </div>
                            
                            ';
                   }
                   
                   if ($articleIMGFive !="NULL" AND $articleIMGFive !="")
                  {
                   echo '
                   <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="' . $articleIMGFive . '" style="width:100%">
                    <div class="caption">' . $articleCapFive . '</div>
                  </div>
                            
                            ';
                   }
                   if ($articleIMGSix !="NULL" AND $articleIMGSix !="")
                  {
                   echo '
                   <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="' . $articleIMGSix . '" style="width:100%">
                    <div class="caption">' . $articleCapSix . '</div>
                  </div>
                            
                            ';
                   }
                   if ($articleIMGSeven !="NULL" AND $articleIMGSeven !="")
                  {
                   echo '
                   <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="' . $articleIMGSeven . '" style="width:100%">
                    <div class="caption">' . $articleCapSeven . '</div>
                  </div>
                            
                            ';
                   }
                   if ($articleIMGEight !="NULL" AND $articleIMGEight !="")
                  {
                   echo '
                   <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="' . $articleIMGEight . '" style="width:100%">
                    <div class="caption">' . $articleCapEight . '</div>
                  </div>
                            
                            ';
                   }
                   if ($articleIMGNine !="NULL" AND $articleIMGNine !="")
                  {
                   echo '
                   <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="' . $articleIMGNine . '" style="width:100%">
                    <div class="caption">' . $articleCapNine . '</div>
                  </div>
                            
                            ';
                   }
                   if ($articleIMGTen !="NULL" AND $articleIMGTen !="")
                  {
                   echo '
                   <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="' . $articleIMGTen . '" style="width:100%">
                    <div class="caption">' . $articleCapTen . '</div>
                  </div>
                            
                            ';
                   }
                   
                 echo '
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>
                <!--END OF SHOW-->
                            
                            ';
        }
}
else
{}
?>
    <?php 
    $full_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo '
    <!--Social Media Sharing using AddThis-->';?>
<?php 
$articleName = "" . trim($_GET['article']);
$usernameforFav = $_SESSION['username'];
$detect_fav ="SELECT * FROM USERFAVORITES WHERE USERNAME = '$usernameforFav' AND FAVEDARTICLE = '$articleName'";
$q = mysqli_query($connect, $detect_fav);
$row_cnt_article = $q->num_rows;

if (isset($_SESSION['username'])){
    echo'
    <div style="display:inline;float:left;height:28px;"><button id="favoriteButton" ';
    
    if ($row_cnt_article >=1)
    {
            echo 'onclick="deleteFavorite();" ';
    }
    else
    {
            echo 'onclick="addFavorite();" ';
    }
    
    echo 'tabindex="1" class="buttonfloat" style="background-color: rgb(168,190,248); 
    border: 1px solid transparent;border-radius: 8px;padding-left:5px;padding-right:5px;padding-top:2px;padding-bottom:2px;cursor: pointer;position:relative;top:0px;height:30px;">
    <span class="at-icon-wrapper" style="line-height: 20px; height: 22px; width: 20px;">
    <img src="images/FavoriteIcon.png" viewBox="0 0 32 32" class="at-icon at-icon-facebook" 
    style="fill: rgb(255, 255, 255); width: 18px; height: 18px; position: relative;top:4px;left:-1px;"> </img>
    </span>
    <span id="favoritetext" style="padding-right: 8px;position:relative; left:1px;top:-6px;font-size: 10.5px; line-height: 20px; height: 20px; color: rgb(255, 255, 255);">'; 
if ($row_cnt_article >=1)
{
        //if favorite already exists
        echo 'Favorited!';
}
else
{
        echo 'Favorite'; 
}
    echo '</span></button>
    </div>';
    }
else
{
    echo '<div style="display:inline;float:left;height:28px;"><button onclick="goToLogin();" tabindex="1" class="buttonfloat" style="background-color: rgb(168,190,248); 
    border: 1px solid transparent;border-radius: 8px;padding-left:5px;padding-right:5px;padding-top:2px;padding-bottom:2px;cursor: pointer;position:relative;top:0px;height:30px;">
    <span class="at-icon-wrapper" style="line-height: 20px; height: 22px; width: 20px;">
    <img src="images/FavoriteIcon.png" viewBox="0 0 32 32" class="at-icon at-icon-facebook" 
    style="fill: rgb(255, 255, 255); width: 18px; height: 18px; position: relative;top:4px;left:-1px;"> </img>
    </span>
    <span style="padding-right: 8px;position:relative; left:1px;top: -6px;font-size: 10.5px; line-height: 20px; height: 20px; color: rgb(255, 255, 255);">
    Login to favorite!</span></button>
    </div>';
}
?>
    
    <?php echo '
    <div style="display: inline;float:left;"><div class="addthis_inline_share_toolbox"></div></div><br/>';
    ?>
    <?php if ($_SESSION['username'] == $articleAuthor): ?>	
    <?php //if the article is the users, display the edit and delete buttons
    echo '<div id="icons">
    <img style="cursor: pointer" title="Edit" onclick="editPost();" src="images/edit.png" height="25" width="25"> </img> 
    <img style="cursor: pointer" title="Delete" onclick="deletePost();" src="images/delete.png" height="25" width="25"> </img>
    </div> <br/><br/><br/><br/>';?>
    <?php endif; ?>
<?php 
//Comments Section
echo '
<!--Comments Sections--><br/><br/><fieldset>
<legend><strong><div>COMMENTS</div></strong></legend>';?>
<?php if (!isset($_SESSION['username'])): ?>
<?php echo '
<div style="padding-bottom: 10px;">Please <a href="login.html">login</a> or <a href="signup.html">signup</a> to post a comment.<br/> </div>';
?>
<?php else: ?>
<?php echo '
<form class="insertCommentForm"> 
<textarea id="insertComment" class="insertComment" placeholder="Enter a comment..." ></textarea>
<button type="button" onclick="commentOnPage()" class="insertCommentButton" id="insertCommentButton">Post</button>
</form>
';?>
<?php endif;?>
<?php 
	//Print Comments by most recent
	for ($x = $numComments-1; $x >= 0; $x--) 
	{
//Get profile picture for the comment 
                                                //Get profile picture for the comment 
                                                $commentuserProf = trim($commentArray[$x*4]);
                                                $selecttheProfilePic = "SELECT PROFILEPIC FROM USERPROFILEPICS WHERE USERNAME = '$commentuserProf'";
                                                $resultProfilePic = mysqli_query($connect,$selecttheProfilePic);
                                                $rowfindProf = mysqli_fetch_assoc($resultProfilePic);
                                                $row_cntProf = $resultProfilePic->num_rows;
                                                $commentprofilePicDirectory = "avatar.png";
                                                if ($row_cntProf >0)
                                                {
                                                        $commentprofilePicDirectory = $rowfindProf["PROFILEPIC"];
                                                }
                                                echo '<div class="commentInside">
                                                <img onclick="location.href=\'profile.php?user=' . $commentArray[$x*4] . '\'"; style="cursor: pointer;display:inline;position:relative; float:left;top:3px;" id="profilepic" src="profile_images/' . $commentprofilePicDirectory . '" alt="default avatar" height="45" width="45">
						<div style="padding:3px;margin-left:50px;"><span onMouseOver="this.style.color=\'#779aff\'" onMouseOut="this.style.color=\'#315cd8\'" class="commenterName" id="commenterName" style="cursor: pointer" onclick="location.href=\'profile.php?user=' . $commentArray[$x*4] . '\'";>
                                                '. $commentArray[$x*4] . '</span>
						<span class="commenterTime" id="commenterTime">' . $commentArray[$x*4+2]  . '</span>'; 
                                                if ($_SESSION['username'] == $commentArray[$x*4])
                                                {
                                                        echo '<span> <img style="cursor: pointer; float:right;" title="Delete comment" onclick="deleteComment(\''. $commentArray[$x*4+3]. '\');" src="images/delete.png" height="15" width="15"></span>';
                                                }
						echo '<div class="commentLine">' . $commentArray[$x*4+3].'</div></div>
						</div>';
	}        
?>
<?php echo '
</fieldset>                  

   </div>
</div>
</section>
<!--END OF EDITORS -->


<!-- footer -->
<footer>
	<table class="tablefooter">
        <tr>
            <td class="tablefooter">
			<ul class="footlist"> ';?>
            <?php if (!isset($_SESSION['username'])): ?>
            <?php echo '<li>
                <p class="startcrafting">
                    START A NEW DIY! </p> <br/><br/><br/>
                    <button onclick="location.href=\'login.html\'" type="button" class="button">Login</button>
                    <button onclick="location.href=\'signup.html\'" type="button" class="button">Sign Up</button>
                </li> '; ?>
            <?php else: ?>
            <?php echo '<li>
                <p class="startcrafting">
                    SHARE AN IDEA! </p> <br/><br/><br/>
                    <button onclick="location.href=\'uploadform.php\'" type="button" class="button">Create DIY</button>
                    </li>'; ?>
            <?php endif;?>
            <?php echo' 
            <li>
                <p class="foot">
                    <br/><a href="index.php" onMouseOver="this.style.color=\'#b2fb9c\'"
   onMouseOut="this.style.color=\'gray\'">Home</a> - <a href="about.php" onMouseOver="this.style.color=\'#b2fb9c\'"
   onMouseOut="this.style.color=\'gray\'">About Us</a> - <a href="contact.php" onMouseOver="this.style.color=\'#b2fb9c\'"
   onMouseOut="this.style.color=\'gray\'">Contact Us</a>
                    <br/><br/>
                    <a href="https://www.facebook.com/ideablr/"><img src="images/iconface.png" alt="" width="4%" height=""></a>
                    <a href="https://twitter.com/ideablr"><img src="images/icontwitter.png" alt="" width="4%" height=""></a>
                    <a href="mailto:staff@ideablr.com"><img src="images/iconmail.png" alt="" width="4%" height=""></a><br/>
                </p>
				</li>
				<li>
				
                    <img onclick="location.href=\'http://www.bpa.org/\'" class="footleft" style="cursor:pointer;" src="images/bpalogo.png" alt="" width="15%" height="">
                
				</li>
			</ul>
            </td>
        </tr>
		
    </table>
    
</footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="index.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58819ffea1a00e9d"></script> 
<script src="diypage.js"></script>';?>
<?php if (isset($articleIMGOne))
{
 echo '<script>
        var slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1} 
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none"; 
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block"; 
          dots[slideIndex-1].className += " active";
        }
        
        //Show message to users who try to vote without logging in
        function showRatingMessage() {
                $("#numberOfVotes").html("Please <a href=\"login.html\">Login</a> to rate!");
        }
        
        function updatetheNumofVotes(){
                var currentVotes = parseInt($("#intVotes").text());
                $("#intVotes").text(currentVotes+1);
        }
      
</script>';
}?>
<?php echo'
</body>

</html>';
mysqli_close($connect);
