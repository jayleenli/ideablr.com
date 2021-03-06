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
		<title>Home - ideablr</title> 
		<link rel="shortcut icon" href="favicon.ico" /> 
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
	</head>
	<style>
		@import url("style.css");
		
		/*HOME SEARCH background*/
		div.begin
		{
			position: static;
			background-position: center;
			background-size: cover;
			text-align: center;
			padding-top: 100px;
			padding-bottom: 100px;
			width: 100%;
                        height: 700px;
		}
		
		/*SPOTLIGHT BOX*/
		div.editors
		{
			text-align: left;
			padding: 5px 20px 20px 20px;
			box-shadow: 4px 6px 8px black;
			width: 77%;
			background-color: #3e435c;
			margin: auto;
                        margin-top: -150px;
		}
		 /*spotlight announcement*/	
		div.edit   
		{
			font-family: "Arial Black", Gadget, Arial, sans-serif;  
			font-weight: bold;  
			text-align: left;  
			color: white;  
			font-size: 2.5em;
		}
		 /*spotlight pic*/	
		img.edit {
				float:left;
				padding: 2%;
                                cursor: pointer;
		}
		/*spotlight font*/
		#all_text {
				padding:2%;
		}
                #all_text a:link{
                                cursor: pointer;
		}
                /*SEARCH RESULTS TABLE*/
		ul.featuredlist {
		  list-style-type: none;
		  margin: 0 auto;
		  padding: 0;
		  text-align: center;
		}
		ul.featuredlist li {
		  display: inline-block;
		  margin: 0 1em 1em 0;
		  position: relative;
		  z-index: 0;
		}
		div.imagebox {
			box-shadow: 2px 2px 8px #1e2234;
			margin: 5px;
			width: 340px;
			height: 340px;
			float: left;
			background-image: url("images/filler.jpg");
			background-size: 340px 340px;
		}
		.titlefeatured {
		   color: white; 
		   font: 30px/45px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
		   background: rgb(0, 0, 0); /* fallback color */
		   background: rgba(0, 0, 0, 0.7);
		   padding: 20px 0px 20px 0px; 
		   width: 320px;
			top: 0;
			box-shadow: 2px 2px 8px #1e2234;
			text-align: left;
			padding: 10px;
                  text-transform: uppercase;
                  padding-bottom: 50px;
                  text-align: left;
                  letter-spacing: 3px;
                  line-height: 50px;
                  -webkit-transition: 500ms;
		  -moz-transition: 500ms;
		  -o-transition: 500ms;
		  transition: 500ms;
		}
		.titlefeatured:hover{
			font-size: 35px;
                        text-decoration:underline;
		}
		.title-content {
		  color: lightgray;
			width: 310px;
			height: 200px;
		  opacity: 0;
		  padding: 5px;
		  -webkit-transition: opacity 500ms;
		  -moz-transition: opacity 500ms;
		  -o-transition: opacity 500ms;
		  transition: opacity 500ms;
                  font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
                  text-align: right;
                  margin-top:-60px;
                  padding-right:5px;
		}
		.imagebox:hover .title-content{
			opacity: .8;
                        cursor: pointer;
		}
		.title-content:hover{
			opacity: .8;
                        cursor: pointer;
		}
                .imagebox:hover .titlefeatured{
			font-size: 35px;
                        text-decoration:underline;
                        cursor: pointer;
		}
                .imagebox:hover {
                        box-shadow: 2px 2px 8px #b2fb9c, -2px -2px 8px #b2fb9c;
                }
                span.hide {
                        display:none;
                }
                @media screen and (min-width: 1500px)
                {
                        span.hide {
                                display: inline-block;
                        }
                }
		
		/*SEARCH RESULTS TABLE*/
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
                .searchbaricon
                {
                        position: relative;
                        width:20px;
                        height:20px;
                        z-index: 5;
                        top:6px;
                        left: -32px;
                }
                h3 {
                        color: lightgray;
                        margin-top:-15px;
                        text-align: left;
                        margin-left: 10%;
                }
                h3#right {
                        text-align: right;
                        margin-right: 10%;
                }
                h3.smalltext {
                        font-style: normal;
                        font-size:15px;
                        color:black;
                }
                img#ideablr {
                        margin-left:-3%;
                }
                a.smalltext {
                        font-style: italic;
                }
                a.smalltext:link {
                        color:#31b712;
                }
                a.smalltext:visited {
                        color:#31b712;
                }
                
                a.smalltext:hover {
                        color:#39951d;
                }
                .head {
                        margin-top: 0px;
                }
                
                @media screen and (max-width: 1920px)
		{
                        h3 {
                                margin-left: 20%;
                        }
                        h3#right {
                                margin-right: 20%;
                        }
                }
                @media screen and (max-width: 1690px)
		{
                        h3 {
                                margin-left: 10%;
                        }
                        h3#right {
                                margin-right: 10%;
                        }
                }
                @media screen and (max-width: 1300px)
		{
                        h3 img{
                                width: 85%;
                        }
                        h3#right {
                                margin-right: 10%;
                        }
                }
                h4 {
                        font-family: helvetica;  
                        font-weight: normal;  
                        text-align: center;  
                        color: white;  
                        font-size: 1.5em;
                        width: 30%;
                        margin: auto;
                        padding: 2%;
                }
                h5 {
                        font-family: Helvetica, Verdana, sans-serif;
                        color: dimgray;
                        font-size: 10 px;
                        font-variant: small-caps;
                }
                h5 a:visited {
                        color:lightgray;
                }
                h5 a:hover {
                        color: #b2fb9c !important;
                }
                h5 a:link {
                        color:lightgray;
                }
                ul#searchbox {
                        background-color: rgba(5, 3, 16, 0.6);
                        padding: 20px;
                        margin: auto;
                        list-style: none;
               }
               ul#searchbox li {
                        display: inline;
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
        <!--NAV SEARCH: Too much to do, too little time
        <div class="dropdown-search">
        <div class="dropbtn-search"><img id="searchbaricon" onclick="searchByIcon() " class="profileicon-search" src="images/searchnavicon.png" width="25px" /></div>
        <div class="dropdown-content-search">
        <div style="max-width:240px;position:relative;padding:0 20px;margin:16px auto" align="center">
        		<input class="searchnav" id ="searchnav" type="text" name="search" placeholder="Search">
                        </input>
        	</div>
            </div>
            </div>-->
	</nav>
    </h1>
    </header><!--NAVBAR ENDS-->   
<section><!--HOME SEARCH-->
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
       
	<center>        
        <div class ="begin" style="background-image:url(images/origami.jpg)" align="center">
                <h3 class="animation-target" >Welcome to <br/><img id="ideablr" src="images/ideablrfancy.png" alt="" height="40%" /></h3>
                <h3 class="animation-target" id="right">the storehouse for all things DIY!</h3>
                
                <ul id="searchbox">
			<li><!--Typewriter Effect by Geoff Graham css-tricks.com-->
                        <h4 class="typewrite" data-period="2000" data-type=\'[ "Discover","Imagine", "Create", "Ideablr" ]\'><span class="wrap"></span></h4></li>
        	<li><div style="max-width:640px;position:relative;padding:0 20px;margin:16px auto" align="center">
        		<input class="searchbar" id ="searchbar" type="text" name="search" placeholder="Search">
                        <input id="searchbaricon" onclick="searchByIcon() " class="searchbaricon" type="image" src="images/searchicon.png" > </input>
        	</div></li><li>
                '; ?>
<?php if (!isset($_SESSION['username'])): //if NOT logged in, show login/signup?>
<?php echo '
	<h5><a href="login.html" >Login</a> | <a href="signup.html">Sign up</a></h5> '?>
<?php else: // logged in - show "create diy" link?>
<?php echo '
        <h5><font size="3pt">Have an idea? <a href="uploadform.php" >Share it!</a></font></h5> '?>
<?php endif; ?>
	<?php echo'
    	</li></ul></div>
    </center><!--HOME SEARCH ENDS-->
<br/>
<br/>';?>
<?php 
//Randomly select an article for the spotlight
$RANcount = "SELECT * FROM `ARTICLES` WHERE 1;";
$RANcountquery = mysqli_query($connect, $RANcount);
$articleNum = $RANcountquery->num_rows;
$DIYselect = rand(0,$articleNum-3);
$DIYgrab = "SELECT * FROM ARTICLES LIMIT " . $DIYselect . ",1";
$DIYquery = mysqli_query($connect, $DIYgrab);
$DIYrow = mysqli_fetch_assoc($DIYquery);
?>

<?php echo'
<div class="editors"><!--DIY SPOTLIGHT--><br/>
<fieldset>
        	<strong><div class="edit">DIY SPOTLIGHT</div></strong><br/><br/><br/>
                
                <ul class="featuredlist">
                <li>
                <div class ="imagebox"  style= "background-image: url(article_images/' . $DIYrow['FEATIMGNAME'] . ');"> 
                <div class="titlefeatured" onclick="location.href= \'diypage.php?article=' . $DIYrow['ARTICLETITLE'] .'\'";>' . $DIYrow['ARTICLETITLE'] . '</div>
                <div class="title-content"  onclick="location.href=\'diypage.php?article=' . $DIYrow['ARTICLETITLE'] .'\'";><br/> <font color="gray">a diy by</font> <em>' . $DIYrow['AUTHOR'] . '</em></div>
                </div>
                </li>
';?>
<?php 
//Randomly select an article for the spotlight
$RANcount = "SELECT * FROM `ARTICLES` WHERE 1;";
$RANcountquery = mysqli_query($connect, $RANcount);
$articleNum = $RANcountquery->num_rows;
$DIYselect = $DIYselect+1;
$DIYgrab = "SELECT * FROM ARTICLES LIMIT " . $DIYselect . ",1";
$DIYquery = mysqli_query($connect, $DIYgrab);
$DIYrow = mysqli_fetch_assoc($DIYquery);
?>

<?php echo'
                <li>
                <div class ="imagebox"  style= "background-image: url(article_images/' . $DIYrow['FEATIMGNAME'] . ');"> 
                <div class="titlefeatured" onclick="location.href= \'diypage.php?article=' . $DIYrow['ARTICLETITLE'] .'\'";>' . $DIYrow['ARTICLETITLE'] . '</div>
                <div class="title-content"  onclick="location.href=\'diypage.php?article=' . $DIYrow['ARTICLETITLE'] .'\'";><br/> <font color="gray">a diy by</font> <em>' . $DIYrow['AUTHOR'] . '</em></div>
                </div>
                </li><span class="hide">
';?>
<?php 
//Randomly select an article for the spotlight
$RANcount = "SELECT * FROM `ARTICLES` WHERE 1;";
$RANcountquery = mysqli_query($connect, $RANcount);
$articleNum = $RANcountquery->num_rows;
$DIYselect = $DIYselect+1;
$DIYgrab = "SELECT * FROM ARTICLES LIMIT " . $DIYselect . ",1";
$DIYquery = mysqli_query($connect, $DIYgrab);
$DIYrow = mysqli_fetch_assoc($DIYquery);
?>

<?php echo'
                <li>
                <div class ="imagebox"  style= "background-image: url(article_images/' . $DIYrow['FEATIMGNAME'] . ');"> 
                <div class="titlefeatured" onclick="location.href= \'diypage.php?article=' . $DIYrow['ARTICLETITLE'] .'\'";>' . $DIYrow['ARTICLETITLE'] . '</div>
                <div class="title-content"  onclick="location.href=\'diypage.php?article=' . $DIYrow['ARTICLETITLE'] .'\'";><br/> <font color="gray">a diy by</font> <em>' . $DIYrow['AUTHOR'] . '</em></div>
                </div>
                </li></span>
                </ul>
</fieldset>
</div><!--DIY SPOTLIGHT ENDS-->
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
                    <img onclick="location.href=\'http://www.bpa.org/\'" class="footleft edit" src="images/bpalogo.png" alt="" width="15%" height="">
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