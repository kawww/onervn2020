<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>RAVEN INSIDE</title>
        <meta name="description" content="">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="cleartype" content="on">

        <!-- iPad and iPad mini (with @2× display) iOS ≥ 8 -->
        <link rel="apple-touch-icon-precomposed" sizes="180x180" href="/img/touch/apple-touch-icon-180x180-precomposed.png">
        <!-- iPad 3+ (with @2× display) iOS ≥ 7 -->
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/img/touch/apple-touch-icon-152x152-precomposed.png">
        <!-- iPad (with @2× display) iOS ≤ 6 -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/img/touch/apple-touch-icon-144x144-precomposed.png">
        <!-- iPhone (with @2× and @3 display) iOS ≥ 7 -->
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/img/touch/apple-touch-icon-120x120-precomposed.png">
        <!-- iPhone (with @2× display) iOS ≤ 6 -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/touch/apple-touch-icon-114x114-precomposed.png">
        <!-- iPad mini and the first- and second-generation iPad (@1× display) on iOS ≥ 7 -->
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/img/touch/apple-touch-icon-76x76-precomposed.png">
        <!-- iPad mini and the first- and second-generation iPad (@1× display) on iOS ≤ 6 -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/touch/apple-touch-icon-72x72-precomposed.png">
        <!-- Android Stock Browser and non-Retina iPhone and iPod Touch -->
        <link rel="apple-touch-icon-precomposed" href="/img/touch/apple-touch-icon-57x57-precomposed.png">
        <!-- Fallback for everything else -->
        <link rel="shortcut icon" href="/img/touch/apple-touch-icon.png">

        <link rel="icon" sizes="192x192" href="/img/touch/touch-icon-192x192.png">
        <link rel="icon" sizes="128x128" href="/img/touch/touch-icon-128x128.png">

        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="/img/touch/apple-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#222222">

        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/main.css">
        <script src="/js/vendor/modernizr-2.8.3.min.js"></script>

    </head>
    <body>

        <!-- Add your site or application content here -->

        <script src="/js/vendor/jquery-2.1.3.min.js"></script>
        <script src="/js/helper.js"></script>
        <script src="/js/main.js"></script>

<?php

//check server


include("../server.php");

//get refund

$refundre=$_REQUEST["refund"];

//check address

session_start();

$add=$_REQUEST["address"];

if($_REQUEST["change"]<>"")

	{$add="";
$_SESSION = array();}

if(!$add & !$_SESSION['raddress'])
	
	{

	echo "<center><H1>RAVEN INSIDE</H1>
	onervn.com/bonus<br><img src=/img/inside.jpg><br><br>
	<form action=\"/bonus/\" method=\"post\">
	<h2>Your Address: <input type=\"text\" name=\"address\">
	<br><br><input type=\"submit\" value=\"KAW\"></h2>
	</form><br><h3>RAVEN INSIDE is the page support RAVENCOIN and ASSETS airdrop.<br>Input your rvn address, and random get bonus in the raven world.</h3>";

	include("../foot.php");
	echo "</center>";

	}


else

	{



	//rpc


	$address=trim($_REQUEST["address"]);

	//check address

	if(!$address){
	$address=$_SESSION['raddress'];
				}


	$lena=strlen("RApjEshiuEBhJ5fvX18XVrS3K5712WzDUX");
	$lenb=strlen($address);

	if($lena<>$lenb)

		{

		echo "<p>&nbsp;&nbsp;Error,your address</p>";
		exit;

		}	

		else
				{
	$_SESSION['raddress']=$address;
				}

	//generate address

$cap=$rpc->listmyassets("NUKA/COLA/CAP");

		echo "<center><H1>RAVEN INSIDE</H1>
	onervn.com/bonus<br><img src=/img/inside.jpg><br><br>
	
	<h2>Your Address: ".$_SESSION['raddress']."
	<br><br>bonus cap:".$cap["NUKA/COLA/CAP"]."<br></h2>
	<br><h3>You will find <font color=\"#ff0000\">b</font><font color=\"#ff7f00\">o</font><font color=\"#ff7f00\">n</font><font color=\"#00ff00\">u</font><font color=\"#00ffff\">s</font> at the bottom of the raven inside page.<br>Share your link to get more caps</h3><br>http://onervn.com/bonus/?address=".$_SESSION['raddress']."";

				echo "<form action=\"/bonus/\" method=\"post\"><input type=\"hidden\" name=\"change\" value=\"logout\"><br>&nbsp;&nbsp;<input type=\"submit\" value=\"logout\"></form>";

	include("../foot.php");
	echo "</center>";

	        

	


	

}


?>


    </body>
</html>



