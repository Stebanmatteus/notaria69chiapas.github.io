<?php
include("../res/x5engine.php");
$nameList = array("ftc","dmf","38y","4ta","h8x","zmr","agn","zsv","5td","vg4");
$charList = array("D","Y","6","4","8","M","F","E","K","K");
$cpt = new X5Captcha($nameList, $charList);
//Check Captcha
if ($_GET["action"] == "check")
	echo $cpt->check($_GET["code"], $_GET["ans"]);
//Show Captcha chars
else if ($_GET["action"] == "show")
	echo $cpt->show($_GET['code']);
// End of file x5captcha.php
