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
	if($connect === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>

<?php 
echo '<!DOCTYPE html> 
<html lang="en">

<head> 
	<meta charset ="utf-8"> 
	<title>Access Blocked - ideablr</title> 
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
p {
        color:lightgray;
}
a#visit:link {
        color:#b2fb9c;
}
a#visit:visited {
        color:#b2fb9c;
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
                <div id="wrap">
                <h1>Sorry, you can\'t access that page!</h1>
		<p>Back to <a id="visit" href="index.php">home</a></p>
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