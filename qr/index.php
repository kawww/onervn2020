<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>RAVENCOIN ASSET QR</title>
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
session_start();

include("../server.php");

//check address

if(!$_REQUEST["address"])
	
	{

	echo "<center><H1>RAVENCOIN ASSET QR</H1>
	onervn.com/qr<br><img src=/img/rhead.jpg><br><br>
	<form action=\"/qr/\" method=\"post\">
	<h2>Address: <input type=\"text\" name=\"address\">
	<br><br><input type=\"submit\" value=\"KAW\"></h2><input type=\"hidden\" name=\"asset\" value=\"".strtoupper(trim($_REQUEST["asset"]))."\">
	</form><br><h4><a href=\"http://onervn.com/qr?address=RTyyjWdBWb8JZx1dKeXRHXsPcPBSz82WhJ\" >RTyyjWdBWb8JZx1dKeXRHXsPcPBSz82WhJ</a></h4>";

	include("../foot.php");
	echo "</center>";

	}


else

	{

	echo "<form action=\"/qr/\" method=\"post\">
	<br>&nbsp;&nbsp;<a href=\"/qr/\" style=\"color: #000000;text-decoration:none;\"><b>RAVENCOIN ASSET QR</b></a><br><br>&nbsp;&nbsp;<input type=\"text\" name=\"address\"><input type=\"hidden\" name=\"asset\" value=\"".strtoupper(trim($_REQUEST["asset"]))."\">
	<input type=\"submit\" value=\"KAW\"></form>";

	//rpc



	$address=trim($_REQUEST["address"]);

	//check address

	$lena=strlen("RTyyjWdBWb8JZx1dKeXRHXsPcPBSz82WhJ");
	$lenb=strlen($address);

	if($lena<>$lenb)

		{

		echo "<p>&nbsp;&nbsp;Error,L</p>";
		exit;

		}	

	//list address

	$rpc = new Linda();
	$rawtransaction = $rpc->listassetbalancesbyaddress($address);

	$error = $rpc->error;

	if($error != "") 
		
		{

		echo "<p>&nbsp;&nbsp;Error,R</p>";
		exit;
		}



	echo "<p>&nbsp;&nbsp;".$address."<br></p>";

	//list address

	$age=$rawtransaction;

	$asset=strtoupper(trim($_REQUEST["asset"]));
 
	foreach($age as $x=>$x_value)

			{

			if(stristr($x,$asset) == true){

				echo "&nbsp;&nbsp;".$x."&nbsp;&nbsp;[ <a href=/qr?address=".$address."&asset=".$x.">".$x_value."</a> ]";

				echo "<br><br>&nbsp;&nbsp;http://onervn.com/qr?asset=".$x."&nbsp;<br><br>";
				exit;
			}

			if(!$asset)

				{
            //special asset example

			if($x=="DONATIONS_ACCEPTED" or $x=="TERA")

				{
		
				echo "&nbsp;&nbsp;<font color=blue>".$x."&nbsp;&nbsp;[ ".$x_value." ]</font>";

				}

			elseif($x=="THANK_YOU")

				{

	   			echo "&nbsp;&nbsp;<font color=green>".$x."&nbsp;&nbsp;[ ".$x_value." ]</font>";

				}

				elseif($x=="HODLLLLLLLLLLLLLLLLLLLLLLLLLLL")

				{

				echo "&nbsp;&nbsp;<font color=ff0000>H</font><font color=ff1500>O</font><font color=ff2a00>D</font><font color=ff4000>L</font><font color=ff5500>L</font><font color=ff6a00>L</font><font color=ff7f00>L</font><font color=ff9400>L</font><font color=ffaa00>L</font><font color=ffbf00>L</font><font color=ffd400>L</font><font color=ffea00>L</font><font color=ffff00>L</font><font color=ccff00>L</font><font color=99ff00>L</font><font color=66ff00>L</font><font color=33ff00>L</font><font color=00ff00>L</font><font color=00ff2b>L</font><font color=00ff55>L</font><font color=00ff80>L</font><font color=00ffaa>L</font><font color=00ffd5>L</font><font color=00ffff>L</font><font color=00d5ff>L</font><font color=00aaff>L</font><font color=0080ff>L</font><font color=0055ff>L</font><font color=002bff>L</font><font color=0000ff>L</font>&nbsp;&nbsp;[ ".$x_value." ]";
				//http://patorjk.com/text-color-fader/
				}
		else

			{

			echo "&nbsp;&nbsp;".$x."&nbsp;&nbsp;[ <a href=/qr?address=".$address."&asset=".$x.">".$x_value."</a> ]";
 
			}echo "<br><br>";
				}
		
	}

//show qr

echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://onervn.com/qr?address=".$address."><br><br>";

echo "&nbsp;&nbsp;http://onervn.com/qr?address=".$address."&nbsp;<br><br>";

echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".$address."><br><br>";

echo "&nbsp;&nbsp;".$address."<br><br>&nbsp;&nbsp;video: <a href=https://twitter.com/runhashrate/status/1157491417578532865>use qr code in ios/android wallet</a>";

include("../foot.txt");

}


?>


    </body>
</html>



