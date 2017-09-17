<?php session_start(); ?>
<?php if(isset($_GET['logoff']))
{
	//Log Off
	session_destroy();
	header("Location: index.php");
}
?>
<?php 
//search
$connect = new mysqli("XX.DATABASE.ADDESS.XX", "XX.DATABASE.USERNAME.XX", "XX.DATABASE.PASSWORD.XX", "XX.DATABASE.USERNAME.XX",3306); 
	if($connect === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
//Get values from search
$url = $_SERVER[REQUEST_URI];
	if ($url == "/index.php" || $url == "/")
	{
			//not searching
	}
	else
	{
                $searchMessage = "";
		$searchTerm = strchr($url,"=");
		$searchTerm = str_replace("=","",$searchTerm);
		$searchTerm = "%" . $searchTerm . "%";
		$search_info = "SELECT ARTICLETITLE,AUTHOR,POSTED,TAG,SHORTDESC,FEATIMGNAME, CONTENT FROM ARTICLES WHERE (ARTICLETITLE LIKE '$searchTerm') OR (SHORTDESC LIKE '$searchTerm') OR (INTRO LIKE '$searchTerm') OR (TIME LIKE '$searchTerm') OR (MATERIALS LIKE '$searchTerm') OR (CONTENT LIKE '$searchTerm') OR (TAG LIKE '$searchTerm') OR (AUTHOR LIKE '$searchTerm');";
		$q = mysqli_query($connect, $search_info);
		$searchResults = array();
		$row_cnt = $q->num_rows;
		$numResults = 0;
		//Place all search results into a array
				while ($row = $q->fetch_assoc()) 
				{  
					array_push($searchResults, $row["ARTICLETITLE"], $row["AUTHOR"], $row["POSTED"], $row["TAG"], $row["SHORTDESC"], $row["FEATIMGNAME"], $row["CONTENT"]); 
					$numResults++;
				}
                if ($row_cnt == 0)
                {
                        //No search Results
                        $searchMessage = "No search results found. Try searching something else!";
                }
                
	}
?>
<?php 
echo '<!DOCTYPE html> 
<html lang="en">

<head> 
	<meta charset ="utf-8"> 
	<title>Search Results - ideablr</title> 
	<link rel="shortcut icon" href="favicon.ico" /> 
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<style>
	@import url("style.css");
 
div#wrap {
        background-color:rgba(5, 3, 16, 0.6);
        text-align:center;
        width:40%;
        margin:auto;
        padding: 20px;
}
h1 {
        color: white;
        text-align: center;
}
h2 {
        width:40%;
}
p {
        color:lightgray;
}
a#visit:link {
        color:#b2fb9c;
}
a#visit:visited {
        color:#b2fb9c;
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

'; ?>
<?php if (isset($_SESSION['username'])): ?>
<?php echo '@media screen and (max-width: 1020px)
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
		transform: translateX(-13%);
		margin: auto;
	}
    ul.footlist li:last-child {
		float: right;
		transform: translateY(-100%);
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
<?php else: ?>
<?php echo'
@media screen and (max-width: 1021px)
{
	ul.footlist li:first-child {
		float: left;
                
	}
	.foot {
		transform: translateX(-12%);
		margin: auto;
	}
    ul.footlist li:last-child {
		float: right;
		transform: translateY(-85%);
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

<br/>
<br/>
<h2>Your search has brought you...</h2><br/><br/>

                <!--SEARCH RESULTS-->';
	//Display search results
        echo '<center><h3>' . $searchMessage . '</h3></center>';
        echo '<table class="tile"><tr><td><ul class="img-list">';
	for ($x = 0; $x < $numResults; $x++) 
	{
                $articleIMGURL=$searchResults[$x*7+5];
		echo '
                <li>
                <div class ="tilebox"  style= "background-image: url(article_images/' . $articleIMGURL . ');"> 
                <div class="text" onclick="location.href= \'diypage.php?article=' . substr($searchResults[$x*7],0,440) .'\'";>' . substr($searchResults[$x*7],0,440) . '</div>
                <div class="text-content"  onclick="location.href=\'diypage.php?article=' . substr($searchResults[$x*7],0,440) .'\'";><br/>' . substr($searchResults[$x*7+4],0,440). '</div>
                </div>
                </li>';
	}
        echo '</ul></td></tr></table>
<div style="max-width:640px;position:relative;padding:0 20px;margin:16px auto" align="center">
        		<input class="searchbar" id ="searchbar" type="text" name="search" placeholder="Search">
                        <input id="searchbaricon" onclick="searchByIcon() " class="searchbaricon" type="image" src="images/searchicon.png" > </input>
        	</div><br/><br/>
                <div id="wrap">
                <h1>Not what you\'re looking for?</h1>
		
		<p>Why not  '; ?>
<?php if (!isset($_SESSION['username'])): //if NOT logged in, direct to login?>
<?php echo '
        <a id="visit" href="login.html">create it then</a>?</p>
	'?>
<?php else: // logged in - direct to upload?>
<?php $name = $_SESSION["username"];
echo '
        <a id="visit" href="uploadform.php">create it then</a>?</p>
    '?>
<?php endif; ?>
	<?php echo'
</div>
</div>
</section>
<!--END OF EDITORS -->
<!-- FOOTER -->
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
        var url = window.location.href; 
        var x = url.indexOf("?");
        var rest = url.substring(x+1);
        if (rest == "upload=false"){uploadError();}
        function uploadError(){
        $("#uploadErrorMessage").html("Sorry, there was something wrong with your upload.");
        }
</script>
</body>
</html>';
mysqli_close($connect);
?>