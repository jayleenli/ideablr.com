<?php session_start(); ?>
<?php if(isset($_GET['logoff']))
{
	//Log Off
	session_destroy();
	header("Location: index.php");
}
?>
<?php 
$connect = new mysqli("XX.DATABASE.ADDESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
        if (!isset($_SESSION['username']))
        {
                //Not logged in, block access
                header('Location: blockaccess.php');
        }
        if (isset($_GET['edit'])) 
        {
            $editArticle =  $_GET['edit'];
            $article_info = "SELECT * FROM ARTICLES WHERE ARTICLETITLE = '$editArticle'"; 
            $result = mysqli_query($connect, $article_info);
            $row = mysqli_fetch_assoc($result);
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
                if ($_SESSION['username'] != $articleAuthor)
                {
                    //Stop loophole
                    header('Location: blockaccess.php');
                }
        }
        else
        {
            //Not editing
        }
?>
<?php 
echo '<!DOCTYPE html> 
<html lang="en">
<head> 
	<meta charset ="utf-8"> 
	<title>Create! - ideablr</title> 
	<link rel="shortcut icon" href="favicon.ico" /> 
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<style>
	@import url("style.css");
        /*FORM*/
        form {
                border: none;
                width: 60%;
                margin: auto;
                background-color: rgba(68, 171, 37, 0.2);
        }
        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        textarea.styled {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
                font-family: Tahoma;
        }
        textarea.styledlink {
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-family: Tahoma;
        }
        div.block {
            margin: 8px 0;
        }
        /*SUBMIT BUTTON*/
        .butt {
                background-color: rgba(24, 25,51, 0.7);
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .container {
            padding: 16px;
        }
        
        div.formtitle {
                text-align:center;
                width:100%;
                font-family:Tahoma, Geneva, sans-serif;
                font-weight:bold;
                color: #404880;
                font-size:24px;
        }
        
        label.col-2 { 
                width: 50%;
                float: left; 
                margin-top:10px;
        }
        span { 
                display: block;
                font-size: 13px; 
                color:#181933;
                font-style:italic;
        }
        input.col-2 { 
                padding: 5px;
        }
        /*Loading animation by Wifeo from cssload.net*/
.cssload-fond{
	position:relative;
	margin: auto;
}

.cssload-container-general
{
	animation:cssload-animball_two 2.8s infinite;
		-o-animation:cssload-animball_two 2.8s infinite;
		-ms-animation:cssload-animball_two 2.8s infinite;
		-webkit-animation:cssload-animball_two 2.8s infinite;
		-moz-animation:cssload-animball_two 2.8s infinite;
	width:259px; height:259px;
}
.cssload-internal
{
	width:259px; height:259px; position:absolute;
}
.cssload-ballcolor
{
	width: 118px;
	height: 118px;
	border-radius: 50%;
}
.cssload-ball_1, .cssload-ball_2, .cssload-ball_3, .cssload-ball_4
{
	position: absolute;
	animation:cssload-animball_one 2.8s infinite ease;
		-o-animation:cssload-animball_one 2.8s infinite ease;
		-ms-animation:cssload-animball_one 2.8s infinite ease;
		-webkit-animation:cssload-animball_one 2.8s infinite ease;
		-moz-animation:cssload-animball_one 2.8s infinite ease;
}
.cssload-ball_1
{
	background-color:rgb(49,91,216);
	top:0; left:0;
}
.cssload-ball_2
{
	background-color:rgb(95,79,161);
	top:0; left:141px;
}
.cssload-ball_3
{
	background-color:rgba(0,160,150,0.98);
	top:141px; left:0;
}
.cssload-ball_4
{
	background-color:rgb(54,247,24);
	top:141px; left:141px;
}
@keyframes cssload-animball_one
{
	0%{ position: absolute;}
	50%{top:71px; left:71px; position: absolute;opacity:0.5;}
	100%{ position: absolute;}
}

@-o-keyframes cssload-animball_one
{
	0%{ position: absolute;}
	50%{top:71px; left:71px; position: absolute;opacity:0.5;}
	100%{ position: absolute;}
}
@-ms-keyframes cssload-animball_one
{
	0%{ position: absolute;}
	50%{top:71px; left:71px; position: absolute;opacity:0.5;}
	100%{ position: absolute;}
}
@-webkit-keyframes cssload-animball_one
{
	0%{ position: absolute;}
	50%{top:71px; left:71px; position: absolute;opacity:0.5;}
	100%{ position: absolute;}
}
@-moz-keyframes cssload-animball_one
{
	0%{ position: absolute;}
	50%{top:71px; left:71px; position: absolute;opacity:0.5;}
	100%{ position: absolute;}
}
@keyframes cssload-animball_two
{
	0%{transform:rotate(0deg) scale(1);}
	50%{transform:rotate(360deg) scale(1.3);}
	100%{transform:rotate(720deg) scale(1);}
}
@-o-keyframes cssload-animball_two
{
	0%{-o-transform:rotate(0deg) scale(1);}
	50%{-o-transform:rotate(360deg) scale(1.3);}
	100%{-o-transform:rotate(720deg) scale(1);}
}
@-ms-keyframes cssload-animball_two
{
	0%{-ms-transform:rotate(0deg) scale(1);}
	50%{-ms-transform:rotate(360deg) scale(1.3);}
	100%{-ms-transform:rotate(720deg) scale(1);}
}
@-webkit-keyframes cssload-animball_two
{
	0%{-webkit-transform:rotate(0deg) scale(1);}
	50%{-webkit-transform:rotate(360deg) scale(1.3);}
	100%{-webkit-transform:rotate(720deg) scale(1);}
}
@-moz-keyframes cssload-animball_two
{
	0%{-moz-transform:rotate(0deg) scale(1);}
	50%{-moz-transform:rotate(360deg) scale(1.3);}
	100%{-moz-transform:rotate(720deg) scale(1);}
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
<body> 
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

<br/>
<br/>
<!--START OF FORM-->
<form onsubmit="carryData();" action="useruploadDB.php" method="post" enctype="multipart/form-data">
  <div class="container">
  	<fieldset>
		<legend><strong><div class="formtitle">Share Your Ideas!</div><br/></strong></legend><br/>
		<font color="red"><center id="uploadErrorMessage"></center></font>
                
		<label><font color="#181933"><b>Title of Guide</b></font><font color="red"> *</font> <font color="#181933" size="2"><em> <br/>(Keep it short and simple. Limit 25 characters.)</em></font></label><br/>
		<input type="text" placeholder="Title" name="title" maxlength="25" required><br/><br/><br/>
		
		<label><font color="#181933"><b>Catagory</b></font><font color="red"> *</font></label><br/>
		<div class="block"><select name="tag">
			<option value="crafts">Arts/Crafts</option>
			<option value="food">Food</option>
			<option value="technology">Technology</option>
			<option value="other">Other</option>
		</select></div><br/>
		<br/>
		<label><font color="#181933"><b>Featured Image</b></font><font color="red"> *</font> <font color="#181933" size="2"><em> (Please upload a square image. Limit 500kb)</em></font>  <br/> <div class="block"><input id="photo" type="file" name="photo" size="28" required>  </div></label><br/><br/>
		
		<label><font color="#181933"><b>Short Description</b></font><font color="red"> *</font></label><br/>
			<textarea maxlength="250" rows="2" class="styled"  name="shortdescription" placeholder="This is the text that will be previewed on the front page. Limit 250 characters."required></textarea><br/><br/><br/>
                        
                <label><font color="#181933"><b>Introduction (optional)</b></font><font color="red"></font></label><br/>
			<textarea rows="5" class="styled"  name="introduction" placeholder="Introduce your DIY! What inspired it? Does it have a history?"></textarea><br/><br/><br/>
		
                <label><font color="#181933"><b>Estimated Time to Complete</b></font><font color="red"> *</font></label><br/>
			<textarea rows="1" class="styled"  name="completiontime"  required></textarea><br/><br/>
                
                <label><font color="#181933"><b>Materials</b></font><font color="red"> *</font><font color="#181933" size="2"><em> (or ingredients, in the case of food)</em></font></label><br/>
			<textarea rows="7" class="styled"  name="materials" placeholder="If necessary, include a list of recommended merchants to buy the materials from." required></textarea><br/><br/>
                
		<label><font color="#181933"><b>Instructions</b></font><font color="red"> *</font></label><br/>
			<textarea rows="20" class="styled"  name="content" placeholder="Enter your DIY guide here. " required></textarea><br/><br/><br/>
                
                <label><font color="#181933"><b>Sources (optional)</b></font></label><br/>
			<textarea rows="2" class="styled"  name="sources" ></textarea><br/><br/>
                        
                        <label><font color="#181933"><b>Youtube Video (optional)</b></font></label><br/>
			<textarea rows="1" class="styled"  name="video" placeholder="Copy and paste a YouTube video link to your tutorial here"></textarea><br/><br/><br/>
                        
                        <label><font color="#181933"><b>Up to 10 Additional Images (optional)</b></font></label><br/>
                                <label class="col-2">
                                        <span>Image 1</span>
                                        <input class="col-2" type="text" name="img1" placeholder="image link"/>
                                </label>
                                <label class="col-2">
                                        <span>-</span>
                                        <input class="col-2" type="text" name="img1cap" placeholder="caption" maxlength="70"/>
                                </label><br/>
                                <label class="col-2">
                                        <span>Image 2</span>
                                        <input class="col-2" type="text" name="img2" placeholder="image link"/>
                                </label>
                                <label class="col-2">
                                        <span>-</span>
                                        <input class="col-2" type="text" name="img2cap" placeholder="caption" maxlength="70"/>
                                </label><br/>
                                <label class="col-2">
                                        <span>Image 3</span>
                                        <input class="col-2" type="text" name="img3" placeholder="image link"/>
                                </label>
                                <label class="col-2">
                                        <span>-</span>
                                        <input class="col-2" type="text" name="img3cap" placeholder="caption" maxlength="70"/>
                                </label><br/>
                                <label class="col-2">
                                        <span>Image 4</span>
                                        <input class="col-2" type="text" name="img4" placeholder="image link"/>
                                </label>
                                <label class="col-2">
                                        <span>-</span>
                                        <input class="col-2" type="text" name="img4cap" placeholder="caption" maxlength="70"/>
                                </label><br/>
                                <label class="col-2">
                                        <span>Image 5</span>
                                        <input class="col-2" type="text" name="img5" placeholder="image link"/>
                                </label>
                                <label class="col-2">
                                        <span>-</span>
                                        <input class="col-2" type="text" name="img5cap" placeholder="caption" maxlength="70"/>
                                </label><br/>
                                <label class="col-2">
                                        <span>Image 6</span>
                                        <input class="col-2" type="text" name="img6" placeholder="image link"/>
                                </label>
                                <label class="col-2">
                                        <span>-</span>
                                        <input class="col-2" type="text" name="img6cap" placeholder="caption" maxlength="70"/>
                                </label><br/>
                                <label class="col-2">
                                        <span>Image 7</span>
                                        <input class="col-2" type="text" name="img7" placeholder="image link"/>
                                </label>
                                <label class="col-2">
                                        <span>-</span>
                                        <input class="col-2" type="text" name="img7cap" placeholder="caption" maxlength="70"/>
                                </label><br/>
                                <label class="col-2">
                                        <span>Image 8</span>
                                        <input class="col-2" type="text" name="img8" placeholder="image link"/>
                                </label>
                                <label class="col-2">
                                        <span>-</span>
                                        <input class="col-2" type="text" name="img8cap" placeholder="caption" maxlength="70"/>
                                </label><br/>
                                <label class="col-2">
                                        <span>Image 9</span>
                                        <input class="col-2" type="text" name="img9" placeholder="image link"/>
                                </label>
                                <label class="col-2">
                                        <span>-</span>
                                        <input class="col-2" type="text" name="img9cap" placeholder="caption" maxlength="70"/>
                                </label><br/>
                                <label class="col-2">
                                        <span>Image 10</span>
                                        <input class="col-2" type="text" name="img10" placeholder="image link"/>
                                </label>
                                <label class="col-2">
                                        <span>-</span>
                                        <input class="col-2" type="text" name="img10cap" placeholder="caption" maxlength="70"/>
                                </label>
                                <br/><br/><br/>		
    <button type="submit" id="postguide" class="butt" onclick="carryData();">Post Guide</button>
	</fieldset></div>
</form>
</div>
<div id="loader" style="z-index: 9999;position:fixed;top: 30%;left:38%;"> </div>
</section>
<!--END OF FORM -->
<!--FOOTER-->
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
                    <br/><a href="index.php" onMouseOver="this.style.color=\'#b2fb9c\'"onMouseOut="this.style.color=\'gray\'">Home</a> - 
                    <a href="about.php" onMouseOver="this.style.color=\'#b2fb9c\'"onMouseOut="this.style.color=\'gray\'">About Us</a> - 
                    <a href="contact.php" onMouseOver="this.style.color=\'#b2fb9c\'"onMouseOut="this.style.color=\'gray\'">Contact Us</a>
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
<script type="text/javascript">
        $("#postguide").click(function()
        {
                $("#loader").html("<!--Loading animation by Wifeo from cssload.net--><div align=\"center\" style=\"color: rgb(64, 72, 128);font-family:Trebuchet MS;font-weight: bold;opacity: 0.9;font-size: -webkit-xxx-large;background-color: white;\">Loading...</div><br/><br/><div align=\"center\" class=\"cssload-fond\"><div class=\"cssload-container-general\"><div class=\"cssload-internal\"><div class=\"cssload-ballcolor cssload-ball_1\"> </div></div><div class=\"cssload-internal\"><div class=\"cssload-ballcolor cssload-ball_2\"> </div></div><div class=\"cssload-internal\"><div class=\"cssload-ballcolor cssload-ball_3\"> </div></div><div class=\"cssload-internal\"><div class=\"cssload-ballcolor cssload-ball_4\"> </div></div></div></div>");
        });
</script>';?>
<?php 
        if (isset($_GET['edit'])) 
        {
            echo '<script type="text/javascript">
                $("[name=title]").val(' . json_encode($articleTitle)  . ');
                $("[name=tag]").val(' . json_encode($articleTag)  . ');
                $("[name=shortdescription]").val(' . json_encode($articleDesc)  . ');
                $("[name=video]").val(' . json_encode($articleYTURL)  . ');
                $("[name=content]").val(' . json_encode($articleContent)  . ');
                $("[name=img1]").val(' . json_encode($articleIMGOne)  . ');
                $("[name=img1cap]").val(' . json_encode($articleCapOne)  . ');
                $("[name=img2]").val(' . json_encode($articleIMGTwo)  . ');
                $("[name=img2cap]").val(' . json_encode($articleCapTwo)  . ');
                $("[name=img3]").val(' . json_encode($articleIMGThree)  . ');
                $("[name=img3cap]").val(' . json_encode($articleCapThree)  . ');
                $("[name=img4]").val(' . json_encode($articleIMGFour)  . ');
                $("[name=img4cap]").val(' . json_encode($articleCapFour)  . ');
                $("[name=img5]").val(' . json_encode($articleIMGFive)  . ');
                $("[name=img5cap]").val(' . json_encode($articleCapFive)  . ');
                $("[name=img6]").val(' . json_encode($articleIMGSix)  . ');
                $("[name=img6cap]").val(' . json_encode($articleCapSix) . ');
                $("[name=img7]").val(' . json_encode($articleIMGSeven)  . ');
                $("[name=img7cap]").val(' . json_encode($articleCapSeven)  . ');
                $("[name=img8]").val(' . json_encode($articleIMGEight)  . ');
                $("[name=img8cap]").val(' . json_encode($articleCapEight)  . ');
                $("[name=img9]").val(' . json_encode($articleIMGNine)  . ');
                $("[name=img9cap]").val(' . json_encode($articleCapNine)  . ');
                $("[name=img10]").val(' . json_encode($articleIMGTen)  . ');
                $("[name=img10cap]").val(' . json_encode($articleCapTen)  . ');
                $("[name=introduction]").val(' . json_encode($articleIntro)  . ');
                $("[name=completiontime]").val(' . json_encode($articleTime)  . ');
                $("[name=materials]").val(' . json_encode($articleMaterials)  . ');
                $("[name=sources]").val(' . json_encode($articleSources)  . ');
                </script>';
        }
        else
        {
            //Not editing
        }
        if (isset($_GET['upload'])) 
        {
                $uploadvar = $_GET['upload'];
                echo '<script type="text/javascript">'; 
                if ($uploadvar == "false")
                {
                        echo '$("#uploadErrorMessage").text("There was an error in your upload. Please try again.");';
                }
                
                echo '</script>';
        }
?>
<?php echo '
</body>
</html>';
mysqli_close($connect);
?>