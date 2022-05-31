<?php
// to make % math make the number of items you want and give them the number of % like the example
// 'the number' = 'the name',
//NOTICE: all lines have , at the last
//NOTICE: the last line mustn't have ,
//NOTICE: the nembers must equal to 100
//the lines you want to create must be like the example exactly or it may cave in

//Special gifts for US & CA 
$s_gifts = array(
	'5'  => 'S-Pink',
	'20' => 'S-Green',
	'50' => 'S-Yellow',
	'10' => 'S-Orange',
	'15' => 'S-Blue'
);

$s_texts = array(
	array("
		mail title1
		","
		messageText1
		",1),

	array("
		mail title2
		","
		messageText2
		",2),

	array("
		mail title3
		","
		messageText3
		",3),

	array("
		mail title4
		","
		messageText4
		",4),

	array("
		mail title5
		","
		messageText5
		",5)
);

//Ordinary gifts for all vistiors
$o_gifts = array(
	'5'  => 'Pink',
	'20' => 'Green',
	'50' => 'Yellow',
	'10' => 'Orange',
	'15' => 'Blue'
);

$o_texts = array(
	array("
		mail title
		","
		messageText
		",1),

	array("
		mail title
		","
		messageText
		",2),

	array("
		mail title
		","
		messageText
		",3),

	array("
		mail title
		","
		messageText
		",4),

	array("
		mail title
		","
		messageText
		",5)
);

$giftslist = array();
// foreach ($giftspr as $key => $value) {
// 	for ($i=0; $i < $key; $i++) { 
// 		$giftslist[] .= $value;
// 	}
// }

$thnum = mt_rand(0,99);

$texts = array(
	'ip' => '
		<div class="popup">
			<a class="close" href="#" onclick="reload();">&times;</a>
			<h2><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Oops!</h2>
			<div class="content">
				<span>Seems we don\'t a valid ip here,</span>
				<br>
				<span>Please don\'t play tricks to get your gift!</span>
			</div>
		</div>
	',
	'email' => '
		<div class="popup">
			<a class="close" href="#" onclick="reload();">&times;</a>
			<h2><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Oops!</h2>
			<div class="content">
				<span>Seems that you didn\'t put a valid Email,</span>
				<br>
				<span>Please put the right one to get your gift!</span>
			</div>
		</div>
	',
	'repet' => '
				<div class="popup">
					<a class="close" href="#" onclick="reload();">&times;</a>
					<h2><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Good!</h2>
					<div class="content">
						<span>Seems that you already get your gift,</span>
						<br>
						<span>Your prize was
			',
	's-c' => '
				<div class="popup">
					<a class="close" href="#" onclick="reload();">&times;</a>
					<h2><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Sorry!</h2>
					<div class="content">
						<span>Seems that you already get your gift,</span>
						<br>
						<span>You can\'t take more than one!</span>
					</div>
				</div>
			',
	'gotgift' => '
			<div class="popup">
				<a class="close" href="#" onclick="reload();">&times;</a>
				<h2><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Great!</h2>
				<div class="content">
					<span>Great News,</span>
					<br>
					<span>You won a "
		',
		'mailtitle' => '
			You Won a Gift
		',
		'mailmessage' => '
			You reseved this message because you won a gift from Noah\'s Gift Shop
			');
?>