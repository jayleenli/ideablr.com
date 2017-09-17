<?php session_start(); ?>
<?php if(isset($_GET['logoff']))
{
	//Log Off
	session_destroy();
	header("Location: index.php");
}?>
<?php 
//to get the name of the profile page requested
$user = str_replace("/profile.php?user=","","$_SERVER[REQUEST_URI]");

//Fetch profile information from mySQL database
//Connect to mySQL database
$connect = new mysqli("XX.DATABASE.ADDESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
if($connect === false){ die("ERROR: Could not connect. " . mysqli_connect_error());}
    
//Get information from database about current user
$query = "SELECT FIRSTNAME,LASTNAME FROM USERLIST WHERE USERNAME ='$user'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($result);
$row_cnt = $result->num_rows;
if ($row_cnt == 0)
{
	$realname = 'This username has not been created.';
}
else
{
	$realname = $row['FIRSTNAME'] . ' ' . $row['LASTNAME'];
}

//Get information from database of currently viewed profile
$query2 = "SELECT BIO,FAVTAG FROM USERPROFILE WHERE USERNAME = '$user'";
$result2 = mysqli_query($connect,$query2);
$row2 = mysqli_fetch_assoc($result2);
$row_cnt2 = $result2->num_rows;
if ($row_cnt2 >0)
{
	$biography = $row2['BIO'];
	$favortag = $row2['FAVTAG'];
}

//Get comments from database of currently viewed profile
$query3 = "SELECT COMMENTBYUSER,COMMENTFORUSER,DATE,COMMENT FROM USERPROFILECOMMENTS WHERE COMMENTFORUSER = '$user'";
$result3 = mysqli_query($connect,$query3);
$commentArray = array();
$row_cnt3 = $result3->num_rows;
$numComments = 0;
        
//Place all comments into one array
while ($row3 = $result3->fetch_assoc()) 
{  
    array_push($commentArray, $row3["COMMENTBYUSER"], $row3["COMMENTFORUSER"], $row3["DATE"], $row3["COMMENT"]); 
    $numComments++;
}  

//Get posts from database of currently viewed profile
$query4 = "SELECT ARTICLETITLE,AUTHOR,POSTED,TAG,SHORTDESC,FEATIMGNAME,CONTENT FROM ARTICLES WHERE AUTHOR = '$user'";
$result4 = mysqli_query($connect,$query4);
$postArray = array();
$row_cnt4 = $result4->num_rows;
$numPosts = 0;
        
//Place all posts into one array
while ($row4 = $result4->fetch_assoc()) 
{  
    array_push($postArray, $row4["ARTICLETITLE"], $row4["AUTHOR"], $row4["POSTED"], $row4["TAG"],$row4["SHORTDESC"],$row4["FEATIMGNAME"], $row4["CONTENT"]); 
    $numPosts++;
} 

//Get profile picture from database of currently viewed profile
$query5 = "SELECT PROFILEPIC FROM USERPROFILEPICS WHERE USERNAME = '$user'";
$result5 = mysqli_query($connect,$query5);
$row5 = mysqli_fetch_assoc($result5);
$row_cnt5 = $result5->num_rows;
$profilePicDirectory = "avatar.png";
if ($row_cnt5 >0)
{
        $profilePicDirectory = $row5["PROFILEPIC"];
}
?> 
<?php 
echo '<!DOCTYPE html> 
<html lang="en">
<head> 
	<meta charset ="utf-8"> 
	<title>'. $user.'\'s profile - ideablr</title> 
	<link rel="shortcut icon" href="favicon.ico" /> 
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<style>
    @import url("style.css");
    @import url("profile.css");
    
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

<br/>
<br/>
<body style="position: relative;"> 
<!--PROFILE SECTION -->
<link href="profile.css" rel="stylesheet">
<div class="container">
    <div class="row-profile">
			<div class="profile-sidebar">
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
                                        <div id="userphoto"><img id="profilepic" src="profile_images/' . $profilePicDirectory . '" alt="default avatar" height="150" width="150">';
                                        if ($_SESSION['username'] == $user)
                                        {
                                        echo '<img onclick="uploadProfilePicture();" id="camera" style="cursor:pointer" src="images/camera.png" alt="edit image" height="150" width="150"/></div>
                                        <form action="profilepicuploadDB.php" method="post" id="profileform" enctype="multipart/form-data"><input name="photo" type="file" id="photo" style="display: none;" /></form>';
                                        }
                                        else
                                        {
                                                echo '</div>';
                                        }
					echo '<div id="profile-name" class="profile-usertitle-name">'. $user . '</div>
					<div class="profile-usertitle-job"> '. $realname . '</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
                                
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li id="profile-overview" class="active">
							<a href="javascript:void(0)" onclick="openCity(\'about\')" onclick="refresh();">
							About </a>
						</li>
                                                <li id="profile-overview" class="active">
							<a href="javascript:void(0)" onclick="openCity(\'article\')" onclick="refresh();">
							Articles </a>
						</li>
                                                <!--<li id="profile-overview" class="active">
							<a href="javascript:void(0)" onclick="openCity(\'connect\')" onclick="refresh();">
							Connect </a>
						</li>-->
                                                <li id="profile-overview" class="active">
							<a href="javascript:void(0)" onclick="openCity(\'comment\')" onclick="refresh();">
							Comments </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
            <div class="profile-content">
            <!--Overview Page-->
            <!-- Activity Section -->
            
            <!-- ABOUT SECTION-->
            <div id="about" class="city">
            <div class="title"><image src="images/profileabout.png"> About</div>
            <div class="profile-userbuttons">';?>
<?php if ($_SESSION['username'] == $user){
        echo '<button id="editpage" onclick = editPage(); class="btn btn-message btn-profile">EDIT</button>';
}?>
<?php echo '
                </div></br>
            <hr style="margin-top:-10px">
            <p class="info">
            <label class="col-about"> <b>Name: </b> </label> '. $realname . '</br>
            <label class="col-about"> <b>Favorite Catagory:</b> </label> <span name="favtag" id="favtag" style="display:inline-block;">'?>
            <?php if (isset($favortag)) { echo $favortag;} else {echo 'None';}?> 
            <?php echo'</span> 
            <p class="info"><label class="col-about"> <b>Bio:</b> </label> <span name="bio" id="bio" style="width: 60%; display:inline-block;">'?>
            <?php if (isset($biography)) { echo $biography;} else {echo 'This user hasn\'t made a bio yet!';}?> 
            <?php 
            echo '</span> </p></br>
            
            <label class="col-about"> <b>User Stats:</b> </label> <br/>
            <p class="smallinfo">
            <label class="smallabout">Articles Written:</label>';
                    $query6 = "SELECT * FROM ARTICLES WHERE AUTHOR = '$user'";
                    $result6 = mysqli_query($connect,$query6);
                    $row6 = mysqli_fetch_assoc($result6);
                    $row_cnt6 = $result6->num_rows;
                    echo $row_cnt6;
            echo '<br/>
            <label class="smallabout">Articles Favorited:</label>';
                    $query7 = "SELECT * FROM USERFAVORITES WHERE USERNAME = '$user'";
                    $result7 = mysqli_query($connect,$query7);
                    $row7 = mysqli_fetch_assoc($result7);
                    $row_cnt7 = $result7->num_rows;
                    echo $row_cnt7;
            echo '<br/>
            <label class="smallabout">Comments Posted:</label>';
                    $query8 = "SELECT * FROM COMMENTS WHERE COMMENTBYUSER = '$user'";
                    $result8 = mysqli_query($connect,$query8);
                    $row8 = mysqli_fetch_assoc($result8);
                    $row_cnt8 = $result8->num_rows;
                    $commentsposted = intval($row_cnt8);
                    
                    $query9 = "SELECT * FROM USERPROFILECOMMENTS WHERE COMMENTBYUSER = '$user'";
                    $result9 = mysqli_query($connect,$query9);
                    $row9 = mysqli_fetch_assoc($result9);
                    $row_cnt9 = $result8->num_rows;
                    $commentsposted = intval($commentsposted) + intval($row_cnt9);
                    echo $commentsposted;
            echo '<br/>
            <label class="smallabout">Articles Rated:</label>';
                    $userToLookFor = "%" . $user . "%";
                    $query13 = "SELECT * FROM ARTICLERATINGS WHERE WHOVOTED LIKE'$userToLookFor'";
                    $result13 = mysqli_query($connect,$query13);
                    $row13 = mysqli_fetch_assoc($result13);
                    $row_cnt13 = $result13->num_rows;
                    echo $row_cnt13;
            echo '<br/>
            </p>
            </div>
            <!-- END OF ABOUT-->
            
            <!-- ARTICLES SECTION-->
            <div id="article" class="city" style="display:none">
            <div class="title"><image src="images/profilearticle.png"> Articles</br></div>
            <hr>
            <p class="info">
            <label class="col-about"> <b>Recent Favorites:</b> </label>
            <ul class="favoritelist"><!--SHOW UP TO SEVEN FAVORITES-->';
            
            //Put favorites into array, max at 7
            $query11 = "SELECT * FROM USERFAVORITES WHERE USERNAME = '$user'";
            $result11 = mysqli_query($connect,$query11);
            $articlefavprof = array();
            $numFavArticles = 0;
            while ($row11 = $result11->fetch_assoc()) 
	    {  
		array_push($articlefavprof, $row11["FAVEDARTICLE"]); 
		$numFavArticles++;
                if ($numFavArticles == 7)
                {
                        break;
                }
	    }
                   for ($y = 0; $y < $numFavArticles; $y++)
                   {
                           $selectedfav = $articlefavprof[$y];
                           $query12 = "SELECT FEATIMGNAME FROM ARTICLES WHERE ARTICLETITLE = '$selectedfav'";
                           $result12 = mysqli_query($connect,$query12);
                           $row12 = mysqli_fetch_assoc($result12);
                           $favArticleSource = $row12["FEATIMGNAME"];
                           echo '<li onclick="location.href= \'diypage.php?article=' . substr($articlefavprof[$y],0,440) .'\'";><a><img src="article_images/' . $favArticleSource .  '"  width="70px" height="70px"/></a></li>';
                   }
                   
                    echo'
            </ul></br>
            
            <label class="col-about"> <b>Recent Posts:</b> </label> 
            <ul class="articlelist">';
            //Put recent articles into array, max at 3
            $query10 = "SELECT * FROM ARTICLES WHERE AUTHOR = '$user'";
            $result10 = mysqli_query($connect,$query10);
            $articlelistprof = array();
            $numArticles = 0;
            while ($row10 = $result10->fetch_assoc()) 
	    {  
		array_push($articlelistprof, $row10["ARTICLETITLE"], $row10["SHORTDESC"], $row10["FEATIMGNAME"]); 
		$numArticles++;
                if ($numArticles == 3)
                {
                        break;
                }
	    }
                   for ($x = 0; $x < $numArticles; $x++)
                   {
                   echo '<li onclick="location.href= \'diypage.php?article=' . substr($articlelistprof[$x*3],0,440) .'\'";><img src="article_images/' . $articlelistprof[$x*3+2] . '" height="100px" width="100px"/>
                   <h1>' . $articlelistprof[$x*3] . '</h1>
                   <p>' . $articlelistprof[$x*3+1] .'</p></li>';
                   }
                   
                   
            echo '</ul>
            <br/>
            </div>
            <!-- END OF ARTICLES-->
            
            <!-- LINKS/CONNECT SECTION-->
            
            <!-- END OF CONNECT-->
            
            <!-- COMMENTS SECTION-->
            <div id="comment" class="city" style="display:none">
            <div class="title"><image src="images/profilecomment.png"> Comments</br></div> 
            '. $url . ' <br/> </h1> 
<div class="commentBox"> ';?>
<?php if (!isset($_SESSION['username'])): ?>
<?php echo '
<div style="padding-bottom: 10px;">Please <a href="login.html">login</a> or <a href="signup.html">signup</a> to post a comment.<br/> </div>';
?>
<?php else: ?>
<?php echo '
					<form class="insertCommentForm"> 
					<textarea style="padding:10px" id="insertComment" class="insertComment" placeholder="Leave a comment..." ></textarea>
					<button type="button" onclick="commentOnPage()" class="insertCommentButton" id="insertCommentButton">Post</button>
					</form>
					<br/> ';?>
                                        <?php endif;?>
					<?php 
					//Print Comments by most recent
					for ($x = $numComments-1; $x >= 0; $x--) 
					{
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
				</div>
            </div> 
	    </div>
            </div>
       </div>
</div>
</div>
<div style="padding:20%"></div>
<br/>
<br/>
<br/>
<br/>
<div style="padding-bottom: 30%">
</section>
	   
            </div>
</body>

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
<script src="profile.js"></script>
<script>
function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(cityName).style.display = "block";  
}
// Get the modal
var modal = document.getElementById(\'myModal\');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</html>';
mysqli_close($connect);
?>