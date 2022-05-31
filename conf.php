<?php
session_start();
require 'agif.php';

// Function to get the client IP address
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';

if (filter_var($ipaddress, FILTER_VALIDATE_IP) === false) {
    echo $texts['ip'];
    die();
}
// Function to get the client IP address
//echo $ipaddress;

// function iptocountry($ip) {   
//     $numbers = preg_split( "/\./", $ip);   
//     include("ip_files/".$numbers[0].".php");
//     $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);   
//     foreach($ranges as $key => $value){
//         if($key<=$code){
//             if($ranges[$key][0]>=$code){$country=$ranges[$key][1];break;}
//             }
//     }
//     if ($country==""){$country="unkown";}
//     return $country;
// }
// $two_letter_country_code=iptocountry($ipaddress);

// 	echo '
// 		<div class="popup">
// 			<a class="close" href="#" onclick="reload();">&times;</a>
// 			<h2><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Oops!</h2>
// 			<div class="content">
// 				<span>Seems that the service</span>
// 				<br>
// 				<span>is not available in your country!</span>
// 			</div>
// 		</div>
// 	';
//     die();

if (filter_var(@$_GET['email'], FILTER_VALIDATE_EMAIL)) {
	$emailgift = $_GET['email'];
}elseif (filter_var(@$_GET['remail'], FILTER_VALIDATE_EMAIL)) {
	$remailgift = $_GET['remail'];
}else {
	echo $texts['email'];
	die();
}
// filter_var($email, FILTER_VALIDATE_EMAIL)

$dbHost = 'localhost';
$dbUser = 'root';
$dbPwd = '';
$database = 'giftipadress';

$date = date('Y-m-d');


//check previous gifts
$con=mysqli_connect($dbHost, $dbUser, $dbPwd,$database);
mysqli_set_charset($con, "utf8");


if (isset($remailgift)) {
	$selectw=mysqli_query($con,"SELECT * FROM ips WHERE ip='$ipaddress'");
	$row = mysqli_fetch_assoc($selectw);
	$oldprize = $row['prize'];
	$selecte=mysqli_query($con,"SELECT * FROM ips WHERE email='$remailgift'");
	if (mysqli_num_rows($selecte) < 1) {
		mysqli_query($con,"INSERT INTO ips(ip,prize,email,rdate) VALUE ('$ipaddress','$oldprize','$remailgift','$date')");
	}
		$_SESSION["prize"] = "got";
		setcookie("prize", "got", time() + ((86400 * 30) * 720), "/");
		// if (in_array($row['prize'], $s_gifts)) {
		// 	$nu = array_search($row['prize'], $s_gifts);
		// 	$nuu = array_search($nu, array_keys($s_gifts));
		// 	$themailtitle = $s_texts[$nuu][0];
		// 	$themailmessage = $s_texts[$nuu][1];
		// 	wp_mail( $remailgift, $themailtitle, $themailmessage);
		// }elseif (in_array($row['prize'], $o_gifts)) {
		// 	$nu = array_search($row['prize'], $o_gifts);
		// 	$nuu = array_search($nu, array_keys($o_gifts));
		// 	$themailtitle = $o_texts[$nuu][0];
		// 	$themailmessage = $o_texts[$nuu][1];
		// 	wp_mail( $remailgift, $themailtitle, $themailmessage);
		// }else{
		// 	wp_mail( $remailgift, $texts['mailtitle'], $texts['mailmessage']);
		// }
		echo $texts['repet'].$row['prize'].'!</span>
					</div>
				</div>';
		die();
}


$selecta=mysqli_query($con,"SELECT * FROM ips");
while ($row = mysqli_fetch_assoc($selecta)) {
	//echo $row['ip'].'ip<br>';
	if ($ipaddress === $row['ip'] || $emailgift === $row['email']) {
		$error = "found";
		$attempts = $row['attempts']+1;
		mysqli_query($con,"UPDATE ips SET attempts='$attempts' WHERE id=".$row['id']."");
		$_SESSION["prize"] = "got";
		setcookie("prize", "got", time() + ((86400 * 30) * 720), "/");
		echo $texts['repet'].$row['prize'].'!</span>
					</div>
				</div><button onclick="rgetgift();" class="loadsty">Send it again!</button>';
		die();
		break;
	}
}


//check gifts from cookies and sessions
if (@$error != "found"){
	if ($_COOKIE["prize"] === "got" || $_SESSION["prize"] === "got") {
		$error = "found";
		$_SESSION["prize"] = "got";
		setcookie("prize", "got", time() + ((86400 * 30) * 720), "/");
		echo $texts['s-c'];
			die();
	}
}




if (@$error != "found") {
	if ($two_letter_country_code != "US" || $two_letter_country_code != "CA" ) {
		$s_textss = array();
		$nu=0;
		foreach ($s_gifts as $key => $value) {
			for ($i=0; $i < $key; $i++) { 
				$giftslist[] .= $value;
				$s_textss[] .= $nu;
			}
			$nu++;
		}
		// $themailtitle = $s_texts[$s_textss[$thnum]][0];
		// $themailmessage = $s_texts[$s_textss[$thnum]][1];
		// wp_mail( $emailgift, $themailtitle, $themailmessage);
	}else{
		$o_textss = array();
		$nu=0;
		foreach ($o_gifts as $key => $value) {
			for ($i=0; $i < $key; $i++) { 
				$giftslist[] .= $value;
				$o_textss[] .= $nu;
			}
			$nu++;
		}
		// $themailtitle = $o_texts[$o_textss[$thnum]][0];
		// $themailmessage = $o_texts[$o_textss[$thnum]][1];
		// wp_mail( $emailgift, $themailtitle, $themailmessage);
	}
	mysqli_query($con,"INSERT INTO ips(ip,prize,email,rdate) VALUE ('$ipaddress','$giftslist[$thnum]','$emailgift','$date')");
	// wp_mail( $emailgift, $texts['mailtitle'], $texts['mailmessage']);
	$_SESSION["prize"] = "got";
	setcookie("prize", "got", time() + ((86400 * 30) * 720), "/");
	echo $texts['gotgift'].$giftslist[$thnum].'"</span>
				</div>
			</div>';
}


?>