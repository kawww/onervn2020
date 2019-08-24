<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>RAVENCOIN ASSET to RVN</title>
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

	echo "<center><H1>RAVENCOIN ASSET to RVN</H1>
	rvn to asset 
	<a href=/rasdaq>onervn.com/rasdaq</a><br>asset to asset 
	<a href=/ex>onervn.com/ex</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>asset to rvn 
	onervn.com/wts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><img src=/img/rhead.jpg><br><br>
	<form action=\"/wts/\" method=\"post\">
	<h2>Your Address: <input type=\"text\" name=\"address\">
	<br><br><input type=\"submit\" value=\"KAW\"></h2>
	</form><br>";

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
	$rvnbalance=$rpc->getbalance("RH7w7cESDVJ22hyv5b46LiU8Ryz1m4YmtT");
	$shopbalancea=$rpc->listassetbalancesbyaddress("RVsCiRKTcwvb45aktM9utZxbuWicHCS4Hw");
	$shopbalance=$shopbalancea["NUKA/COLA/CAP"];

	if(!$shopbalance){$shopbalance=0;}


	
	echo "<p>&nbsp;&nbsp;Rasdaq alpha testing, rvn/asset here maybe lost.<br>&nbsp;&nbsp;<font color=red>Don't send much rvn and never store any rvn here.</font><br>&nbsp;&nbsp;<a href=/rasdaq>rasdaq</a> | <a href=/ex>ex</a> | <b>wts</b> | <a href=/vip>vip</a> |</p>";

	echo "<p>&nbsp;&nbsp;Send asset and <input type=button value=refresh onclick=\"location.reload()\"> after confirmation<br>&nbsp;&nbsp;Your address in shop is <br>&nbsp;&nbsp;".$shopaddress."<br></p>";

	echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".$shopaddress."><br>";
	echo "<p>&nbsp;&nbsp;shop address asset </p><p>";

	foreach($shopasset as $x=>$x_value)

			{
			
			
	echo "<form action=\"/wts/\" method=\"post\">&nbsp;&nbsp;<font color=blue>".$x."&nbsp;&nbsp;[ ".$x_value." ]</font><input type=\"hidden\" name=\"asset\" value=\"".$x."\"><input type=\"hidden\" name=\"num\" value=\"".$x_value."\">&nbsp;<input type=\"submit\" value=\"sell\"></form>";
			
			}

	echo "</p><p>&nbsp;&nbsp;rvn balance ".$rvnbalance." </p>";



	//list assets


	$shoplist=file("shop.txt");
	$shopnum=count($shoplist);


 
	





	

	
	echo "<br><br>&nbsp;&nbsp;</a><br>&nbsp;&nbsp;<a href=http://onervn.com/qr?address=".$_SESSION['raddress'].">".$_SESSION['raddress']." </a> ";

	//buy

	$buyasset=trim($_REQUEST["asset"]);
	$buynum=trim($_REQUEST["num"]);

	echo "<br>&nbsp;&nbsp;".$buyasset." ";

	

	for ($i=1;$i<$shopnum;$i++) 
		{
		list($one[$i],$count,$price)=explode("|",$shoplist[$i]);
		
		if($one[$i]==$buyasset)
			
		{$buytotal=$buynum*$count;
			echo $buytotal;
			$stock=$shopbalance;
			
			$totalfund=$buytotal*$price;
			if($stock>$buytotal & $totalfund<=$rvnbalance)
				{
				
				echo " cost ".$totalfund." RVN";
				$_SESSION['sendok']="<br>&nbsp;&nbsp;".$buyasset." cost ".$totalfund." CAP, SEND OK!";

				$getfunda=$rpc->transferfromaddress("NUKA/COLA/CAP","RVsCiRKTcwvb45aktM9utZxbuWicHCS4Hw",$buytotal,"RY9a71GJSQemujR2giyCugW5N8bhCFAvJo","","","","RVsCiRKTcwvb45aktM9utZxbuWicHCS4Hw");
				$getfundb=$rpc->transferfromaddress($buyasset,$_SESSION['shopaddress'],$buytotal,"RY9a71GJSQemujR2giyCugW5N8bhCFAvJo","","","",$_SESSION['shopaddress']);

				$errort = $rpc->error;

					if($errort != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error, buy failed</p>";
				
					}
					else
					{
					
					$sendfund=$rpc->sendfrom("RH7w7cESDVJ22hyv5b46LiU8Ryz1m4YmtT",$_SESSION['raddress'],$totalfund);

					$errora = $rpc->error;

					if($errora != "") 
		
						{
					echo "<p>&nbsp;&nbsp;Error, <font color=red>Error, send asset failed, rvn lost</font></p>";
				
						}
					else
						{

					print_r('&nbsp;&nbsp;, <font color=green>SEND OK!</font>');
					$_SESSION['sendnum']=1;
						}
					
					}

				}else { echo "&nbsp;&nbsp;<font color=red>out of stock or balance</font>";}
			}
		}

	//refund



if($refundre<>"")
		
				{
					$xaddress="\"".$address."\"";
					$refund=$rpc->transferfromaddress("NUKA/COLA/CAP",$_SESSION['shopaddress'],$shopbalance,$xaddress);
					$errorf = $rpc->error;

					if($errorf != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error, refund (fee:0.2~1%)</p>";
					$_SESSION['refund']=0;
					}
					else
					{
						print_r('Refund OK! [ '.$refund.' ]');
					$_SESSION['refund']=1;
					}
				
				}


	//show list

	 echo "<br><br>";

	for ($i=1;$i<$shopnum;$i++) 
		{
		list($one[$i],$count,$price)=explode("|",$shoplist[$i]);

		//stock


	
	

			$assetlen=strlen($one[$i]);
			if($assetlen>20){$assetbr="<br>";}else{$assetbr="";}

		print("&nbsp;&nbsp;[<font color=blue>".$one[$i]."</font>] want (".$shopbalance."), ".$assetbr."&nbsp;<font color=red>".$count."</font> asset <font color=blue>".$price." </font><br><br>");
			}
	

				echo "<form action=\"/wts/\" method=\"post\"><input type=\"hidden\" name=\"change\" value=\"logout\"><br>&nbsp;&nbsp;<input type=\"submit\" value=\"logout\"></form>";

	include("../foot.txt");

}


?>


    </body>
</html>



