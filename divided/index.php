<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>RAVENCOIN ASSET/RVN DIVIDED</title>
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
$ass=$_REQUEST["asset"];

if($_REQUEST["change"]<>"")

	{$add="";$ass="";

$_SESSION = array();}

if((!$add & !$_SESSION['raddress']) or (!$ass & !$_SESSION['asset']))
	
	{

	echo "<center><H1>RAVENCOIN ASSET/RVN DIVIDED</H1>
	Send your ASSET/RVN to HODLERS<br><br><img src=/img/rhead.jpg><br><br>
	<form action=\"/divided/\" method=\"post\">
	<h2>Your Address: <input type=\"text\" name=\"address\"><br><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Asset: <input type=\"text\" name=\"asset\">
	<br>
	<br><br><input type=\"submit\" value=\"KAW\"></h2>
	</form><br>Service fee 1 rvn, each address 0.1rvn.<br>Recommand run php code or bat in your local network.<br><br>";
	include("../news.txt");
	include("../foot.php");
	echo "</center>";

	}


else

	{



	//rpc


	$address=trim($_REQUEST["address"]);
	$asset=trim($_REQUEST["asset"]);
	

	if(check_utf8($asset)==true && !preg_match('/[A-Za-z]/', $asset) && !preg_match('/[0-9]/', $asset))
		
	{

	if(!$_SESSION['unique']){$_SESSION['unique']=$asset;}

	$asset=utf8_to_unicode($asset); 
	$unicode=" ( <font color=green>".$_SESSION['unique']."</font> )";

	
	
	
	
	}


	if(strpos($asset,"#") !== false or strpos($asset,"deid@") !== false or strpos($asset,"DEID@") !== false){

	

	$asset=str_replace("deid@","DEID#",$asset);
	$asset=str_replace("DEID@","DEID#",$asset);

	list($assa,$assb)=explode("#",$asset);

	$assa=strtoupper($assa);
	$asset=$assa."#".$assb;
	
	}else{
$asset=strtoupper($asset);}


	//check address

	if(!$address){
	$address=$_SESSION['raddress'];
				}else
		{$_SESSION['raddress']=$address;}

	if(!$asset){
	$asset=$_SESSION['asset'];
				}else{$_SESSION['asset']=$asset;}



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

//check asset

$getviplist = $rpc->listassetbalancesbyaddress($address);

	$error = $rpc->error;

	if($error != "") 
		
		{
		echo "<p>&nbsp;&nbsp;Error,R</p>";
		exit;
		}

	if(count($getviplist) <>0) 
		
		{
		echo "<h2>&nbsp;Your address have ".count($getviplist)." asset.<br><br>&nbsp;For your account safe, please generate a new address to login. <br><br>&nbsp;<a href=http://onervn.com/qr/?address=".$address.">".$address."</a><br><form action=\"/divided/\" method=\"post\"><input type=\"hidden\" name=\"change\" value=\"logout\"><br>&nbsp;<input type=\"submit\" value=\"logout\"></form>";
							
							include("../foot.txt");
							exit;
	
		}




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

$feebalance=$rpc->getinfo();

	$shopbalance=$shopasset[$asset];
	$rvnbalance=substr($rvnbalance,0,5);
	$oknumleft=intval($feebalance["balance"])/0.1;
	if(!$shopbalance){$shopbalance=0;}


	
	echo "<p>&nbsp;&nbsp;Rasdaq alpha testing, rvn/asset here maybe lost.<br>&nbsp;&nbsp;<font color=red>Don't send much rvn and never store any rvn here.</font><br>&nbsp;&nbsp;<a href=/rasdaq>rasdaq</a> | <a href=/ex>ex</a> | <a href=/wts>wts</a> | <a href=/vip>vip</a> |</p>";

	echo "<p>&nbsp;&nbsp;Send asset and rvn, <input type=button value=refresh onclick=\"location.reload()\"> after confirmation<br>&nbsp;&nbsp;Your address in rasdaq is <br>&nbsp;&nbsp;".$shopaddress."<br></p>";

	echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".$shopaddress."><br>";
	echo "&nbsp;&nbsp;Now support address: ".$oknumleft;

	echo "<br>&nbsp;&nbsp;shop rvn balance ".$rvnbalance."<br>&nbsp;&nbsp;Spend 1 rvn to use divided, each address fee 0.1 rvn<br>";



if($_REQUEST["divided"]<>"")

		{
		$getfundx=$rpc->sendfrom($_SESSION['raddress'],"RY9a71GJSQemujR2giyCugW5N8bhCFAvJo",1);
		
		$errora= $rpc->error;

		if($errora != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error,  failed</p>";
				
					}

					else

					{
						$_SESSION['dvd']=1;
						
						}	



		}else{ if(!$_SESSION['dvd']){echo "<form action=\"/divided/\" method=\"post\"><input type=\"hidden\" name=\"divided\" value=\"aparecium\"><br>&nbsp;&nbsp;<input type=\"submit\" value=\"unlock divided service\"></form><br><br>";}}

	//list assets

if($_SESSION['dvd']<>"")

		{
foreach($shopasset as $x=>$x_value)

		{echo "<br><form action=\"/divided/\" method=\"post\">&nbsp;&nbsp;<font color=blue>".$x."&nbsp;&nbsp;[ ".$x_value." ]</font><input type=\"hidden\" name=\"go\" value=\"goasset\"><input type=\"hidden\" name=\"sasset\" value=\"".$x."\"><input type=\"hidden\" name=\"num\" value=\"".$x_value."\"> send <input type=\"num\" name=\"snum\" style=\"width:50px;\">&nbsp;<input type=\"submit\" value=\"asset to everyone\"></form><br>";}
			
		echo "<br><form action=\"/divided/\" method=\"post\">&nbsp;&nbsp;shop rvn balance ".$rvnbalance." send <input type=\"num\" name=\"snum\" style=\"width:50px;\"> <input type=\"hidden\" name=\"go\" value=\"gorvn\"><input type=\"submit\" value=\"to everyone\"></form>";
		
		
		}
else{
	echo "</p><p>&nbsp;&nbsp;shop rvn balance ".$rvnbalance." </p>";}




	//buy

	$buyasset=$asset;

	$sendasset=trim($_REQUEST["sasset"]);
	
	$shoplist=$rpc->listaddressesbyasset($buyasset);
	
	$addnum=count($shoplist);


//if(strlen($unicode)==30){$unicode="";}


echo "<br>&nbsp;&nbsp;You can send rvn/asset.<br>&nbsp;&nbsp;All rvn and asset will send to <font color=red>".$asset."</font> ".$unicode." HODLERS<br><br>&nbsp;&nbsp;<a href=http://onervn.com/qr?address=".$_SESSION['raddress'].">".$_SESSION['raddress']." </a> ";

	
$sendassetnum=$_REQUEST["snum"];
$sendassetfee=round(0.1*$addnum,1);




echo "<p>&nbsp;&nbsp;".$asset." ".$unicode." HODLERS: ".$addnum."  Fee: ".$sendassetfee." </p>";


if($sendassetnum==$addnum){echo "not support send all asset to one address";	echo "<form action=\"/divided/\" method=\"post\"><input type=\"hidden\" name=\"change\" value=\"logout\"><br>&nbsp;&nbsp;<input type=\"submit\" value=\"logout\"></form>";exit;} 


if($_REQUEST["go"]<>""){


if($_REQUEST["go"]=="goasset"){





if($sendassetfee<$feebalance & $sendassetfee<$rvnbalance)
	{

$getfundy=$rpc->sendfrom($_SESSION['raddress'],"RY9a71GJSQemujR2giyCugW5N8bhCFAvJo",$sendassetfee);

usleep(10000);

		$errorb= $rpc->error;
		if($errorb != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error, send fee failed</p>";
				
					}
					else
					{
	foreach($shoplist as $y=>$y_value)

		{
			if($buyasset<>""){
		$getfunda=$rpc->transferfromaddress($sendasset,$_SESSION['shopaddress'],$sendassetnum,$y,"","","",$_SESSION['shopaddress']);

		usleep(10000);

		$errort = $rpc->error;

					if($errort != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error, send asset to ".$y." failed</p>";
				
					}
					else
					{
					echo "<p>&nbsp;&nbsp;Send ".$sendassetnum." <font color=red>".$sendasset."</font> to <a href=http://onervn.com/qr?address=".$y_value.">".$y."</a> ok</p>";
					}
			}
		}
	}
}else { echo "&nbsp;&nbsp;error, ".$sendassetfee." fee";}
}



if($_REQUEST["go"]=="gorvn"){


$sendassetfee=$sendassetfee+$showfee;
$gorvnfee=$sendassetfee+$sendassetnum*$addnum;
$sendnum=$sendassetnum;

$feebalance=$rpc->getbalance("RH7w7cESDVJ22hyv5b46LiU8Ryz1m4YmtT");
usleep(10000);

if($gorvnfee<$rvnbalance)
	{

$getfundy=$rpc->sendfrom($_SESSION['raddress'],"RY9a71GJSQemujR2giyCugW5N8bhCFAvJo",$sendassetfee);

usleep(10000);

		$errora= $rpc->error;
		if($errora != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error, fee failed</p>";
				
					}
					else
					{

		foreach($shoplist as $y=>$y_value){
		$sendfund=$rpc->sendfrom($_SESSION['raddress'],$y,$sendnum);
		usleep(10000);
		$errors = $rpc->error;
				if($errors != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error, send ".$sendnum. " to ".$y." failed</p>";
				
					}
					else
					{
					echo "<p>&nbsp;&nbsp;Send <font color=red>".$sendnum."</font> to <a href=http://onervn.com/qr?address=".$y.">".$y."</a> ok</p>";
					}
		}
			
					}
				}else

					{ echo "&nbsp;&nbsp;error, ".$sendassetfee." fee";}
		
					}


		}

 
	

	
	

				echo "<form action=\"/divided/\" method=\"post\"><input type=\"hidden\" name=\"change\" value=\"logout\"><br>&nbsp;&nbsp;<input type=\"submit\" value=\"logout\"></form>";

	include("../foot.txt");

}


?>


    </body>
</html>



