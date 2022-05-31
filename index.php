<?php
session_start();
if (!isset($_COOKIE["prize"])) {
    setcookie("prize", "go", time() + ((86400 * 30) * 720), "/");
}
if (!isset($_SESSION["prize"])) {
	$_SESSION["prize"] = "go";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Art Gift</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/file.css">
	<link rel="stylesheet" href="css/animate.css">
</head>
<body>
<!-- <div id="ark">
<div id="one"><img src="gift.png"></div>
<div id="two"><img src="gift.png"></div>
<div id="three"><img src="gift.png"></div>
<div id="four"><img src="gift.png"></div>
<div id="five"><img src="gift.png"></div>
<div id="six"><img src="gift.png"></div>
<div id="seven"><img src="gift.png"></div>
</div> -->

<div id="ark"></div>

<div id="popup1" class="overlay">
<a class="close" href="#" onclick="reload();">&times;</a>
		<div id="popupsideimg"></div>
		<div id="popupsidecontent">
		<h1>Hi!</h1>
			<div class="popup">
				
				<h3><i class="fa fa-exclamation-circle" aria-hidden="true"></i>You've selected a mystery box! Can't wait to open it? Enter your email to see what's inside.</h3><br>& Get notified for future giveaways and exclusive news.
			</div>
		<input required id="popupemail" type="email" placeholder="Put Your Email to claim your Gift">
		<button onclick="getgift(document.getElementById('popupemail').value);" class="loadsty">Get Your Gift</button>
		</div>
	<a id="popupactive" hidden href="#popup1"></a>
</div>

<style type="text/css">
	#nicepopup {
		padding: 20px;
		z-index: 99;
		position: fixed;
		top: -200px;
		background:#F2F2F2;
		border: 3px solid #BFBFBF;
		border-radius: 20px;
		transform:skewY(170deg);
		transition: all 20s, transform 1.5s;
		animation: upanddown 20s linear 5s , upanddownskew 1s infinite 5s;
	}
	#nicepopup a {text-decoration: none;}
	@-webkit-keyframes upanddown {
		from {top:-30px;}
		to {top:1000px;}
	}
	@-webkit-keyframes upanddownskew {
		0% {transform:skewY(155deg);}
		50% {transform:skewY(195deg);}
		100% {transform:skewY(155deg);}
	}
</style>
<div id="nicepopup" onmouseenter="stopainm(this);" onmouseleave="stopainm(this);">
<a href="javascript:;">
	<strong>Don't miss your chance,</strong>
	<br>
	<strong>choose a free gift now!</strong>
</a>
</div>

<script type="text/javascript" src='js.js'></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


</body>
</html>