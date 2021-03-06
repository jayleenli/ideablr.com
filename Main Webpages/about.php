<?php session_start(); ?>
<?php 
	if(isset($_GET['logoff']))
	{
		//Log Off
		session_destroy();
		header("Location: index.php");
	}?>
<?php 
$connect = new mysqli("XX.DATABASE.ADDESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
	if($connect === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>
<?php 
	echo '
	<!DOCTYPE html> 
	<html lang="en">
	
	<head> 
		<meta charset ="utf-8"> 
		<title>About Us - ideablr</title> 
		<link rel="shortcut icon" href="favicon.ico" /> 
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
	</head>
	
	<style>
		@import url("style.css");
		
		 /*MEET THE TEAM TITLE*/	
		div.outer 
                {/*purple background*/
			background-color: rgba(24, 25, 51, .4);
			padding: 30px;
			width: 50%;
			margin: auto;
			border-radius: 25px;
		}
		div.edit   
		{/*text*/
			font-family: "Arial Black", Gadget, sans-serif;  
			font-weight: normal;  
			text-align: center;  
			color: #181933;  
			font-size: 2em;
			border-top-style: dotted;
   			border-right-style: solid;
                        border-bottom-style: dotted;
                        border-left-style: solid;
			border-color: white;
			width: 50%;
			margin: auto;
			padding: 50px;
		}
		
		/*TEAM*/
		div.us {
			margin: auto;
			padding: 20px;
		}
		.aboutlist {
			margin: auto;
			text-align: center;
		}
		.aboutlist li{
			display: inline-block;
			margin: 10px;
			width: 20%;
		}
		.aboutlist figure  {
			position: relative;
			width: 90%;
			margin-left:-2%;
		}
		.aboutlist img{
		    padding:2px;
		    border:1px solid #181933;
		    background-color:#b2fb9c;
			display: block;
			-webkit-transition: all 300ms;
			-moz-transition: all 300ms;
			transition: all 300ms;
			width: 100%;
		}
		.aboutlist figcaption {
			background: rgba(24, 25, 51, 0.8);
			color: white;
			left: 0;
			opacity: 0;
			position: absolute;
			right: 0;
			margin-top: -10%;
			-webkit-transition: all 300ms;
			-moz-transition: all 300ms;
			transition: all 300ms;
			-webkit-transition-delay: 100ms;
			-moz-transition-delay: 100ms;
			transition-delay: 100ms;
			z-index: 100;
			padding: 10px;
			font-size:20px;
			border-radius: 25px;
			font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
			font-variant:small-caps;
			font-weight:bold;
			line-height:15px;
		}
		.aboutlist figcaption p {
			position: relative;
			-webkit-transition: all 300ms ease-out;
			-moz-transition: all 300ms ease-out;
			transition: all 300ms ease-out;
			vertical-align: middle;
			text-align: center;
		}		
		.aboutlist li:hover figcaption {
			opacity: 1;
		}
		.aboutlist li:hover img {
			-webkit-transform: scale(1.1);
			-moz-transform: scale(1.1);
			transform: scale(1.1);
		}
		span.desc {
			font-variant:normal;
			font-size:16px;
			font-weight:normal;
			color: gray;
			font-style:italic;
		}
		
                /*ABOUT US BOX (green)*/
		div.usbox
		{
			text-align: center;
			padding: 30px;
			width: 50%;
			background-color: rgba(68, 171, 37, 0.2);
			margin: auto;
			border-radius: 25px;
		}
                
                /*SOURCES BOX*/
		div.downbox 
                {/*background*/
			background-color: rgba(0, 0, 0, 0.8);
			padding: 30px;
			width: 50%;
			margin: auto;
			border-radius: 25px;
		}
		div.special   
		{/*text title and border*/
			font-family: "Arial Black", Gadget, sans-serif;  
			font-weight: normal;  
			text-align: center;  
			color: lightgray;  
			font-size: 1em;
			border-top-style: dotted;
   			border-right-style: solid;
                        border-bottom-style: dotted;
                        border-left-style: solid;
			border-color: gray;
			width: 90%;
			margin: auto;
			padding: 30px;
			border-radius: 25px;
		}
		div.source
		{/*text*/
			font-family:Arial, Helvetica, sans-serif;
			font-size:12px;
			font-style:italic;
		}

'; ?>
<?php if (isset($_SESSION['username'])): //This is the responsive design of the footer when logged in ?>
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
    2.) so that the relatively positioned home search has something to be located relatively to. -->
</header><!--NAVBAR ENDS-->   

<section> <div id="body">

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

<!--ABOUT US BEGINS-->
      <div class="outer">
            <div class="edit">MEET THE TEAM</div>
            </div>
            <div class="us">
            <ul class="aboutlist">
            	<li onclick="location.href=\'profile.php?user=Madeline#overview\'" style="cursor:pointer">
                    <figure>
                        <img src="images/madeline.jpg" alt="" width="15%" height="">
                        <figcaption>Madeline Huang<br/><span class="desc">Web Designer</span></figcaption>
                    </figure>
                </li>
                <li onclick="location.href=\'profile.php?user=Jayleen#overview\'" style="cursor:pointer">
                	<figure>
                        <img src="images/jayleen.jpg" alt="" width="15%" height="">
                        <figcaption>Jayleen Li<br/><span class="desc">Web Programmer</span></figcaption>
                    </figure>
                </li>
                <li onclick="location.href=\'profile.php?user=Andrea#overview\'" style="cursor:pointer">
                	<figure>
                        <img src="images/andrea.jpg" alt="" width="15%" height="">
                        <figcaption>Andrea Arce<br/><span class="desc">Content Writer/Videographer</span></figcaption>
                    </figure>
                </li>
            </ul>
            </div>
            <div class="usbox">
    			<p>
         			This website was created by 3 seniors from Coppell High School(Coppell, Texas) as a project for the Business Professionals of America Web Design Team (Black Chapter 2017). The goal was to build a DIY website, and thus, Ideablr was born as a social media platform for users to share creative and simple DIYs.  
         		</p>
			</div><br/><br/>
<!--ABOUT US ENDS-->
<!--SOURCES BEGINS-->
            <div class="downbox">
                <div class="special">SOURCES & SPECIAL THANKS
                    <div class="source">
                    <br/>"Feathered" background by Martuchox (subtlepatterns.com) (color changed) (<a href="https://creativecommons.org/licenses/by-sa/3.0/deed.en">CC BY-SA 3.0</a>).
                    <br/>"Pink Rice" background by ExcogitoWeb (subtlepatterns.com) (color changed) (<a href="https://creativecommons.org/licenses/by-sa/3.0/deed.en">CC BY-SA 3.0</a>).
                    <br/>Origami image by Efraimstochter (pixabay.com) (Public Domain).
                    <br/>Social media icons by Side Project (www.iconfinder.com) (<a href="https://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>).
                    <br/>Favoriting icons by David Merfield (publicicons.org) (Public Domain).
                    <br/>“Edit” icon by A M (thenounproject.com) (<a href="https://creativecommons.org/licenses/by/3.0/us/">CC BY 3.0 US</a>).
                    <br/>“Delete” icon by Consumer Financial Protection Bureau (thenounproject.com) (<a href="https://creativecommons.org/licenses/by/3.0/us/">CC BY 3.0 US</a>).
                    <br/>"User" icon by Viktor Vorobyev (thenounproject.com) (<a href="https://creativecommons.org/licenses/by/3.0/us/">CC BY 3.0 US</a>).
                    <br/>"Profile" icon by umesh.vgl (thenounproject.com) (<a href="https://creativecommons.org/licenses/by/3.0/us/">CC BY 3.0 US</a>).
                    <br/>"Pens" icon by Andres Ruales (thenounproject.com) (<a href="https://creativecommons.org/licenses/by/3.0/us/">CC BY 3.0 US</a>).
                    <br/>"Network" icon by Aldric Rodríguez (thenounproject.com) (<a href="https://creativecommons.org/licenses/by/3.0/us/">CC BY 3.0 US</a>).
                    <br/>"Comment Alert" icon by Fabio Nucatolo (thenounproject.com) (<a href="https://creativecommons.org/licenses/by/3.0/us/">CC BY 3.0 US</a>).
                    <br/>"Camera" icon by Alexis Boudal (thenounproject.com) (<a href="https://creativecommons.org/licenses/by/3.0/us/">CC BY 3.0 US</a>).
                    <br/>Social Media Icons by Ma Lourdes Suello (iconfinder.com) (Free for Commercial Use).
                    <br/>
                    <br/>Special thanks to Julie Choi for the Ideablr logo design.
                    </div>
           	</div>
            </div>
<br/><br/>
<!--SOURCES ENDS-->
</div>
</section>

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
</body>
</html>';
mysqli_close($connect);
?>