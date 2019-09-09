<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>RAVENCOIN ASSET/RVN to HODLERS</title>
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

	echo "<center><H1>RAVENCOIN ASSET/RVN to HODLERS</H1>
	Send your MOONCAKE/RVN to HODLERS<br><br><img src=/img/rhead.jpg><br><br>
	<form action=\"/moon/\" method=\"post\">
	<h2>Your Address: <input type=\"text\" name=\"address\">
	<br><br><input type=\"submit\" value=\"KAW\"></h2>
	</form><br>You can get MOONCAKE at <a href=/bonus>bonus</a>, <a href=/rasdaq>rasdaq</a>, <a href=/ex>ex</a>, <a href=/search?asset=MOON>search</a>, <a href=/faucet/?asset=MOONCAKE>faucet</a>, <a href=http://ravenx.net/sales/MOONCAKE>ravenx</a>.<br><br>You can sell your MOONCAKE at  <a href=/wts>wts</a>, <a href=http://ravenx.net/sales/MOONCAKE>ravenx</a>.<br><br>";
	include("../news.txt");
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


	
	        
	$rpc = new Linda();





	if(!$_SESSION['shopaddress'])

		{

	$listaccount = $rpc->listaccounts();
				
				

				if(in_array($address,$listaccount))
			
					{
						$accaddress=$rpc->getaddressesbyaccount($address);
					
						$shopaddress=$accaddress[0];
						$errorshop = $rpc->error;
		
						if($errorshop != "") 
			
						{
							echo "<p>&nbsp;&nbsp;Error,shop</p>";
							exit;
						}
					}
			
				

			if(!$shopaddress)
			{

	$shopaddress = $rpc->getnewaddress($_SESSION['raddress']);

	$errorshop = $rpc->error;

	if($errorshop != "") 
		
				{
		echo "<p>&nbsp;&nbsp;Error,shop</p>";
		exit;
				}
			}
	$_SESSION['shopaddress']=$shopaddress;
		}

	else
		{$shopaddress=$_SESSION['shopaddress'];}

	$shopasset=$rpc->listassetbalancesbyaddress($_SESSION['shopaddress']);
	$rvnbalance=$rpc->getbalance($_SESSION['raddress']);

	$shopbalance=$shopasset["MOONCAKE"];
	$rvnbalance=substr($rvnbalance,0,5);
	if(!$shopbalance){$shopbalance=0;}


	
	echo "<p>&nbsp;&nbsp;Rasdaq alpha testing, rvn/asset here maybe lost.<br>&nbsp;&nbsp;<font color=red>Don't send much rvn and never store any rvn here.</font><br>&nbsp;&nbsp;<a href=/rasdaq>rasdaq</a> | <a href=/ex>ex</a> | <a href=/wts>wts</a> | <a href=/vip>vip</a> |</p>";

	echo "<p>&nbsp;&nbsp;Send asset and <input type=button value=refresh onclick=\"location.reload()\"> after confirmation<br>&nbsp;&nbsp;Your address in rasdaq is <br>&nbsp;&nbsp;".$shopaddress."<br></p>";

	echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".$shopaddress."><br>";
	echo "<p>&nbsp;&nbsp;shop address asset </p><p>";

	foreach($shopasset as $x=>$x_value)

			{
			
			
	echo "<form action=\"/moon/\" method=\"post\">&nbsp;&nbsp;<font color=blue>".$x."&nbsp;&nbsp;[ ".$x_value." ]</font><input type=\"hidden\" name=\"go\" value=\"go\"><input type=\"hidden\" name=\"asset\" value=\"".$x."\"><input type=\"hidden\" name=\"num\" value=\"".$x_value."\">&nbsp;<input type=\"submit\" value=\"Send asset\"></form>";
			
			}

if($rvnbalance>=0.1)

		{echo "<form action=\"/moon/\" method=\"post\">&nbsp;&nbsp;shop rvn balance ".$rvnbalance." <input type=\"hidden\" name=\"go\" value=\"go\"><input type=\"submit\" value=\"Send rvn to all\"></form>";
		
		echo "<br><form action=\"/moon/\" method=\"post\"><input type=\"hidden\" name=\"luck\" value=\"luck\">&nbsp;&nbsp;<input type=\"hidden\" name=\"go\" value=\"go\"><input type=\"submit\" value=\"Send rvn to lucky guy\"></form>";
		
		}
else{
	echo "</p><p>&nbsp;&nbsp;shop rvn balance ".$rvnbalance." </p>";}



	//list assets





	//buy

	$buyasset=trim($_REQUEST["asset"]);
	
	$shoplist=$rpc->listaddressesbyasset("MOONCAKE");
	
	 $addnum=count($shoplist);


echo "<br>&nbsp;&nbsp;You can send rvn if your rasdaq address rvn>0.1<br>&nbsp;&nbsp;You can send asset if you send asset to rasdaq address<br>&nbsp;&nbsp;All rvn and asset will send to MOONCAKE HODLERS<br><br>&nbsp;&nbsp;<a href=http://onervn.com/qr?address=".$_SESSION['raddress'].">".$_SESSION['raddress']." </a> ";

	


echo "<p>&nbsp;&nbsp;MOONCAKE HODLERS: ".$addnum." </p>";

if($_REQUEST["go"]<>""){

	foreach($shoplist as $y=>$y_value)

		{
			if($buyasset<>""){
		$getfunda=$rpc->transferfromaddress($buyasset,$_SESSION['shopaddress'],1,$y,"","","",$_SESSION['shopaddress']);

		usleep(10000);

		$errort = $rpc->error;

					if($errort != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error, send asset to ".$y." failed</p>";
				
					}
					else
					{
					echo "<p>&nbsp;&nbsp;Send <font color=red>".$buyasset."</font> to <a href=http://onervn.com/qr?address=".$y_value.">".$y."</a> ok</p>";
					}
			}

		if($rvnbalance>=0.1){

if($_REQUEST["luck"]<>""){$lucknum=rand(0,1);}
			
$sendnumr=rand(11,99);
$sendnum=$sendnumr/1000;

if($lucknum==1){
		$sendfund=$rpc->sendfrom($_SESSION['raddress'],$y,$sendnum);
		
		$errors = $rpc->error;
				if($errors != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error, send ".$sendnum. " to ".$y." failed</p>";
				
					}
					else
					{
					echo "<p>&nbsp;&nbsp;Send <font color=red>".$sendnum."</font> to <a href=http://onervn.com/qr?address=".$y.">".$y."</a> ok</p>";
					}

				}else

					{echo "<p>&nbsp;&nbsp;Send <font color=blue>nothing</font> to <a href=http://onervn.com/qr?address=".$y.">".$y."</a></p>";}
		
					}


		}

 
	
}
	
	

				echo "<form action=\"/moon/\" method=\"post\"><input type=\"hidden\" name=\"change\" value=\"logout\"><br>&nbsp;&nbsp;<input type=\"submit\" value=\"logout\"></form>";

	include("../foot.txt");

}


?>


    </body>
</html>



