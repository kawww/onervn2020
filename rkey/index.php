<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>RAVENCOIN ASSET KEY</title>
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
    


        <!-- Add your site or application content here -->

        <script src="/js/vendor/jquery-2.1.3.min.js"></script>
        <script src="/js/helper.js"></script>
        <script src="/js/main.js"></script>
		</head>

		<body><center>
<?php

session_start();





if(!$_REQUEST["rkey"]){

echo "<H1>RAVENCOIN ASSET RAVEN KEY</H1>onervn.com/rkey<br><img src=/img/rhead.jpg><br><form action=\"/rkey/\" method=\"post\">
	<h2>KEY: <input type=\"text\" name=\"rkey\">
	<br><br><input type=\"submit\" value=\"KAW\"></h2>
	</form><br><h4>use key RTyyjWdBWb8JZx1dKeXRHXsPcPBSz82WhJ to get ONERVN <br><br>use key RHyWYGGMLs34uHAeKxSfGS3E3kjiCy6D66 to get RASDAQ <br><br>use key RXaRoYM5dTJiyjeiDLRAsbisTZVBvnnGLc to ravenx.net <br><br> or you can click or scan qr code (key in qr) to get an asset<br><br><a href=\"http://onervn.com/rkey?rkey=RTyyjWdBWb8JZx1dKeXRHXsPcPBSz82WhJ\" >RTyyjWdBWb8JZx1dKeXRHXsPcPBSz82WhJ</a></h4>";

	echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://onervn.com/rkey?rkey=RTyyjWdBWb8JZx1dKeXRHXsPcPBSz82WhJ><br>";
	include("../foot.txt");
	exit;
}



//get asset and address

$rkey=trim($_REQUEST["rkey"]);

if($rkey=="RTyyjWdBWb8JZx1dKeXRHXsPcPBSz82WhJ"){$asset="ONERVN.COM";}
if($rkey=="RHyWYGGMLs34uHAeKxSfGS3E3kjiCy6D66"){$asset="RASDAQ";}
if($rkey=="RXaRoYM5dTJiyjeiDLRAsbisTZVBvnnGLc"){$url = "http://ravenx.net";
echo "<script type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>"; }

$ax=$asset;
$address=trim($_REQUEST["address"]);



//rpc

include("../rpc.php");

$rpc = new Linda();

//use blockcount to limit faucet

$_SESSION['blockn']=$rpc->getblockcount();


//main faucet page

if($asset=="" or $address=="" )
 	
   	{


	if($asset<>"")
		{

		//use SESSION to limit faucet

		$code = mt_rand(0,1000000);
		$_SESSION['code'] = $code;


		echo "<H1>RAVENCOIN ASSET FAUCET</H1>onervn.com<br><img src=/img/rhead.jpg><br><H2>ASSET : ".$ax."</H2><br><form action=\"index.php\" method=\"post\"><h2>Address: <input type=\"text\" name=\"address\">
		<input type=\"hidden\" name=\"asset\" value=".$ax."><input type=\"hidden\" name=\"originator\" value=\"".$code."\"><input type=\"hidden\" name=\"rkey\" value=\"".$rkey."\"><br><br><input type=\"submit\" value=\"GET ONE\"></h2></form><br><br>&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset.">";

		}

	else 
				
		{
					
		echo "<h2>Kawwww, no asset</h2>";

		}

	}

else

	{
		echo "<H1>RAVENCOIN ASSET FAUCET</H1>onervn.com<br><img src=/img/rhead.jpg>";

		//faucet page
		//check address

		$lena=strlen("RApjEshiuEBhJ5fvX18XVrS3K5712WzDUX");
		$lenb=strlen($address);

		if($lena<>$lenb) 

			{

		echo "<p>&nbsp;&nbsp;not vaild address, kawwww<br><br><a href=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset.">http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."</a></p><br>";
		echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."><br>";
		include("../foot.txt");
		exit;

			}

		//check SESSION

		if(isset($_REQUEST['originator'])) 
			
			{

		if($_REQUEST['originator'] <> $_SESSION['code'] or $_SESSION['asset']==$asset)
				{

		echo "<p>&nbsp;&nbsp;one time one asset, kawwww<br><br><a href=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset.">http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."</a></p><br>";
		echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."><br>";
		include("../foot.txt");
		exit;
				}
			}


		//check blockcount

		if($_SESSION['block']==$_SESSION['blockn'])
			
			{

		echo "<p>&nbsp;&nbsp;BLOCK=".$_SESSION['blockn']." wait one block, kawwww<br><br><a href=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset.">http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."</a></p><br>";

		echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."><br>";
		include("../foot.txt");
		exit;

			}

		//load white list

		$faucet=file_get_contents("one.txt");

		//check if asset in list

		if(strpos($faucet,$ax) !== false)

			{

			$rpc = new Linda();

			//get balance

			$balance = $rpc->getbalance();

			//get blockcount

			$_SESSION['block']=$rpc->getblockcount();

			//check balance

			if($balance<0.1) 

				{

				echo "<p>&nbsp;&nbsp;RXqqoufS2fPYtjVgFAmaPQKHoS6W6iwW5b balance < 0.1, faucet stopped , kawwww<br><br><a href=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset.">http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."</a></p></br>";

				echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."><br>";
				include("../foot.txt");
				exit;

				}

			//send asset

			$txid = $rpc->transfer($asset,1,$address);

			//check if send ok

			if($error != "") 
				
				{

				echo "<p>error<br><br><a href=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset.">http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."</a></p><br>";

				echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."><br>";
				
				}

			else

				{

				echo "<p>send to <a href=http://onervn.com/qr?address=".$address.">".$address."</a> ok. <br><br>kawwww<br><br><a href=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset.">http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."</a></p><br>";

				echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."><br>";
			
				$code = mt_rand(0,1000000);
				$_SESSION['code'] = $code;
				$_SESSION['asset']=$asset;
				$_SESSION['block']=$rpc->getblockcount();

				 }


			}

		else
		
			{

	echo "no asset to send, kawww<br><br><a href=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset.">http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."</a><br><br>";
	echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://onervn.com/rkey/?rkey=".$rkey."&asset=".$asset."><br>";
	include("../foot.txt");
			}
	}

include("../foot.txt");

?>


</center>
</body>
</html>
