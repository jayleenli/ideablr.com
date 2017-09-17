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
    $tagpage = $_SERVER['REQUEST_URI']; 
    $tagpage = str_replace("/","",$tagpage);
    $tagpage = "" . trim(str_replace(".php","",$tagpage));
    $tag_info = "SELECT * FROM ARTICLES WHERE TAG = '$tagpage'"; 
    $result = mysqli_query($connect, $tag_info);
    $tagResults = array();
    $numResults = 0;
    //Place all tag results into a array
	while ($row = $result->fetch_assoc()) 
	{  
		array_push($tagResults, $row["ARTICLETITLE"], $row["AUTHOR"], $row["POSTED"], $row["TAG"], $row["SHORTDESC"], $row["FEATIMGNAME"], $row["CONTENT"]); 
		$numResults++;
	}
?>
<?php 
echo '<!DOCTYPE html> 
<html lang="en">
<head> 
	<meta charset ="utf-8"> 
	<title>Other - ideablr</title> 
	<link rel="shortcut icon" href="favicon.ico" /> 
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<style>
	@import url("style.css");
        
        /*CSS SLIDER PLACEMENT*/
        div#featured {
                margin: auto;
                text-align: center;
        }
        
        /*"FEATURED"*/
        div#featured-text {
                margin: auto;
                text-align: center;
                margin-top: -50px;
                font-family: Impact, Charcoal, sans-serif;
                position: absolute;
                z-index: 500;
                font-size: 130px;
                color: #acc3fd;
                text-shadow: 2px 2px 4px #181933, 4px 4px 4px lightgray;
                font-weight:bold;
        }
        
        /*"FEATURED-WHATEVER"*/
        div#featured-text2 {
                margin: auto;
                text-align: center;
                margin-top: 60px;
                font-family: Impact, Charcoal, sans-serif;
                position: absolute;
                z-index: 500;
                font-size: 85px;
                color: #181933;
                text-shadow: 2px 2px 4px lightgray, 4px 4px 4px #404880;
                font-weight:bold;
        }
        
        /*"MORE TO DISCOVER"*/
        div#more {
                color:#404880;
                text-align: center;
                font-family: "Trebuchet MS", Helvetica, sans-serif;
                font-weight: bold;
                font-size: 20px;
        }
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
		table.tile {
			width: 80%;
			margin: auto;
		}
		div.tilebox {
			box-shadow: 2px 2px 8px #1e2234;
			margin: 5px;
			width: 320px;
			height: 320px;
			float: left;
			background-image: url("images/filler.jpg");
			background-size: 320px 320px;
		}
		.wordbox {	
			position: absolute; 
			margin: left; 
			width: 80%; 
		}
		.text {
		   color: white; 
		   font: bold 24px/45px Helvetica, Sans-Serif; 
		   background: rgb(0, 0, 0); /* fallback color */
		   background: rgba(0, 0, 0, 0.7);
		   padding: 20px 0px 20px 0px; 
		   width: 100%;
			top: 0;
			box-shadow: 2px 2px 8px #1e2234;
			text-align: left;
			padding-left: 20px;
			margin-left: -10px;
                  -webkit-transition: font-size 500ms;
		  -moz-transition: font-size 500ms;
		  -o-transition: font-size 500ms;
		  transition: font-size 500ms;
		}
		.text:hover{
			font-size: 25px;
                        text-decoration:underline;
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
                  font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
                  font-style: italic;
		}
		.tilebox:hover .text-content{
			opacity: .8;
			background-color: white;
                        cursor: pointer;
		}
		.text-content:hover{
			opacity: .8;
			background-color: white;
                        cursor: pointer;
		}
                .tilebox:hover .text{
			font-size: 25px;
                        text-decoration:underline;
                        cursor: pointer;
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

<table class="tile">
	<tr><td><div id="featured-text">FEATURED</div><div id="featured-text2">OTHER</div><div id="featured">
                <!-- Start cssSlider.com -->
		<!-- Generated by cssSlider.com 2.1 -->
		<link rel="stylesheet" href="cssslider_files/csss_engine1/style.css">
		<!--[if IE]><link rel="stylesheet" href="cssslider_files/csss_engine1/ie.css"><![endif]-->
		<!--[if lte IE 9]><script type="text/javascript" src="cssslider_files/csss_engine1/ie.js"></script><![endif]-->
		 <div class=\'csslider1 autoplay \'>
		<input name="cs_anchor1" id=\'cs_slide1_0\' type="radio" class=\'cs_anchor slide\' >
		<input name="cs_anchor1" id=\'cs_slide1_1\' type="radio" class=\'cs_anchor slide\' >
		<input name="cs_anchor1" id=\'cs_slide1_2\' type="radio" class=\'cs_anchor slide\' >
		<input name="cs_anchor1" id=\'cs_play1\' type="radio" class=\'cs_anchor\' checked>
		<input name="cs_anchor1" id=\'cs_pause1_0\' type="radio" class=\'cs_anchor pause\'>
		<input name="cs_anchor1" id=\'cs_pause1_1\' type="radio" class=\'cs_anchor pause\'>
		<input name="cs_anchor1" id=\'cs_pause1_2\' type="radio" class=\'cs_anchor pause\'>
		<ul>
			<li class="cs_skeleton"><img src="cssslider_files/csss_images1/madeline.jpg" style="width: 100%;"></li>
			<li onclick="location.href= \'diypage.php?article=Waterproof%20Your%20Shoes\'" style="cursor:pointer" class=\'num0 img slide\'> <img src=\'cssslider_files/csss_images1/fillershoes.jpg\' alt=\'Waterproof Your Shoes\' title=\'Waterproof Your Shoes\' /></li>
			<li onclick="location.href= \'diypage.php?article=De-stemming%20Strawberries\'" style="cursor:pointer" class=\'num1 img slide\'> <img src=\'cssslider_files/csss_images1/fillerstrawberry.jpg\' alt=\'De-stemming Strawberries\' title=\'De-stemming Strawberries\' /></li>
			<li onclick="location.href= \'diypage.php?article=Separate%20the%20Condiments\'" style="cursor:pointer" class=\'num2 img slide\'> <img src=\'cssslider_files/csss_images1/fillercondiments.jpg\' alt=\'Separate the Condiments\' title=\'Separate the Condiments\' /></li>
		</ul><div class="cs_engine"><a href="http://cssslider.com">responsive slider</a> by cssSlider.com v2.1</div>
		<div class=\'cs_description\'>
			<label onclick="location.href= \'diypage.php?article=Waterproof%20Your%20Shoes\'" style="cursor:pointer" class=\'num0\'><span class="cs_title"><span class="cs_wrapper">Waterproof Your Shoes</span></span></label>
			<label onclick="location.href= \'diypage.php?article=De-stemming%20Strawberries\'" style="cursor:pointer" class=\'num1\'><span class="cs_title"><span class="cs_wrapper">De-stemming Strawberries</span></span></label>
			<label onclick="location.href= \'diypage.php?article=Separate%20the%20Condiments\'" style="cursor:pointer" class=\'num2\'><span class="cs_title"><span class="cs_wrapper">Separate the Condiments</span></span></label>
		</div>
		<div class=\'cs_play_pause\'>
			<label class=\'cs_play\' for=\'cs_play1\'><span><i></i><b></b></span></label>
			<label class=\'cs_pause num0\' for=\'cs_pause1_0\'><span><i></i><b></b></span></label>
			<label class=\'cs_pause num1\' for=\'cs_pause1_1\'><span><i></i><b></b></span></label>
			<label class=\'cs_pause num2\' for=\'cs_pause1_2\'><span><i></i><b></b></span></label>
			</div>
		<div class=\'cs_arrowprev\'>
			<label class=\'num0\' for=\'cs_slide1_0\'><span><i></i><b></b></span></label>
			<label class=\'num1\' for=\'cs_slide1_1\'><span><i></i><b></b></span></label>
			<label class=\'num2\' for=\'cs_slide1_2\'><span><i></i><b></b></span></label>
		</div>
		<div class=\'cs_arrownext\'>
			<label class=\'num0\' for=\'cs_slide1_0\'><span><i></i><b></b></span></label>
			<label class=\'num1\' for=\'cs_slide1_1\'><span><i></i><b></b></span></label>
			<label class=\'num2\' for=\'cs_slide1_2\'><span><i></i><b></b></span></label>
		</div>
		<div class=\'cs_bullets\'>
			<label class=\'num0\' for=\'cs_slide1_0\'> <span class=\'cs_point\'></span>
				<span class=\'cs_thumb\'><img src=\'cssslider_files/csss_tooltips1/fillershoes.jpg\' alt=\'Waterproof Your Shoes\' title=\'Waterproof Your Shoes\' /></span></label>
			<label class=\'num1\' for=\'cs_slide1_1\'> <span class=\'cs_point\'></span>
				<span class=\'cs_thumb\'><img src=\'cssslider_files/csss_tooltips1/fillerstrawberry.jpg\' alt=\'De-stemming Strawberries\' title=\'De-stemming Strawberries\' /></span></label>
			<label class=\'num2\' for=\'cs_slide1_2\'> <span class=\'cs_point\'></span>
				<span class=\'cs_thumb\'><img src=\'cssslider_files/csss_tooltips1/fillercondiments.jpg\' alt=\'Separate the Condiments\' title=\'Separate the Condiments\' /></span></label>
		</div>
		</div>
		<!-- End cssSlider.com --></div><br/>
                <br/><hr class="space"><div id="more">More to Discover!<hr> </div><br/>
        </td></tr>
        <tr>
    	<td>
      	  <ul class="img-list"> ';?>
          <?php 
          	for ($x = 0; $x < $numResults; $x++) 
                {
                $articleIMGURL=$tagResults[$x*7+5];
		echo '
                <li>
                <div class ="tilebox"  style= "background-image: url(article_images/' . $articleIMGURL . ');"> 
                <div class="text" onclick="location.href= \'diypage.php?article=' . substr($tagResults[$x*7],0,440) .'\'";>' . substr($tagResults[$x*7],0,440) . '</div>
                <div class="text-content"  onclick="location.href=\'diypage.php?article=' . substr($tagResults[$x*7],0,440) .'\'";><br/>' . substr($tagResults[$x*7+4],0,440). '</div>
                </div>
                </li>';
                }
        ?>
        <?php echo '
          </ul>
        </td>
    </tr>
</table>		
</div>
</section>
<!--END OF BODY -->
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
</body>
</html>';
mysqli_close($connect);
?>