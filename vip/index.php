<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>RASDAQ MEMBER VIP</title>
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
$change=$_REQUEST["change"];
if($_SESSION['change']<>""){$change=$_SESSION['change'];}

if($change<>"")

	{$add="";
$_SESSION = array();
	}

if(!$add & !$_SESSION['raddress'])
	
	{

	echo "<center><H1>RASDAQ MEMBER VIP</H1>
	onervn.com/vip<br><img src=/img/vhead.jpg><br><br>
	<form action=\"/vip/\" method=\"post\">
	<h2>Your Address: <input type=\"text\" name=\"address\">
	<br><br><input type=\"submit\" value=\"KAW\"></h2>
	</form><p><h3>Rare Asset Outlet, Member VIP Only</h3> Search <a href=http://onervn.com/search?asset=RASDAQ>rasdaq</a> to get free Member asset.&nbsp;<br>Buy [RASDAQ/VIP] asset to get Discount.<br><br>[RASDAQ/VIP] selling on <a href=/rasdaq>rasdaq</a> <a href=http://ravenx.net/sales/RASDAQ>ravenx</a>.</p>";

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


//member vip check

$getviplist = $rpc->listassetbalancesbyaddress($address);

	$error = $rpc->error;

	if($error != "") 
		
		{
		echo "<p>&nbsp;&nbsp;Error,R</p>";
		exit;
		}

	$_SESSION['member']="";
 
	foreach($getviplist as $v=>$v_value)

			{


            
			if($v=="RASDAQ")

						{
							$_SESSION['member']=1;
						}
			if($v=="RASDAQ/VIP")

						{
							$_SESSION['member']=100;
						}


			}


				 if(!$_SESSION['member'])

							{ echo "<h2>&nbsp;Member and VIP only.<br><br>&nbsp;Show RASDAQ or RASDAQ/VIP assets to enter the room. <br><br>&nbsp;Search <a href=http://onervn.com/search?asset=RASDAQ>rasdaq</a> to get free Member asset .<br><br>&nbsp;Buy [RASDAQ/VIP] asset to get Discount.<br><br>&nbsp;[RASDAQ/VIP] selling on <a href=/rasdaq>rasdaq</a> <a href=http://ravenx.net/sales/RASDAQ>ravenx</a>.<br><br>&nbsp;Get asset and <input type=button value=refresh onclick=\"location.reload()\"> after confirmation</h2><br>&nbsp;&nbsp;<a href=http://onervn.com/search?asset=RASDAQ>http://onervn.com/search?asset=RASDAQ</a>";
							$_SESSION['change']="1";
							include("../foot.txt");
							exit;
							}

//shop address


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

	$shopbalance=$rpc->getbalance($_SESSION['raddress']);

	if(strlen($shopbalance)<6){$numsp=5;}else{$numsp=strlen($shopbalance)-5;}

	

	if($refundre<>"" & $_SESSION['refund']=1)
		{
		$shopbalance=substr($shopbalance,0,$numsp)." (pending)";}

		else
		{
		$shopbalance=substr($shopbalance,0,$numsp);}

		

		



	echo "<p>&nbsp;&nbsp;Rasdaq alpha testing, rvn/asset here maybe lost.<br>&nbsp;&nbsp;<font color=red>Don't send much rvn and never store any rvn here.</font><br>&nbsp;&nbsp;<a href=/rasdaq>rasdaq</a> | <a href=/ex>ex</a> | <a href=/wts>wts</a> | <b>vip</b> |</p>";

	echo "<p>&nbsp;&nbsp;Send rvn and <input type=button value=refresh onclick=\"location.reload()\"> after confirmation<br>&nbsp;&nbsp;Your address in shop is <br>&nbsp;&nbsp;".$shopaddress."<br></p>";

	echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".$shopaddress."><br>";


	echo "<p>&nbsp;&nbsp;Shop address balance <font color=red>".$shopbalance."</font> <br></p>";

//	buy

	$shoplist=file("shop.txt");
	$shopnum=count($shoplist);


	for ($i=1;$i<$shopnum;$i++) 
		{
		list($one[$i],$count,$price)=explode("|",$shoplist[$i]);
		}
	
	echo "<form action=\"/vip/\" method=\"post\">";

	$html = '&nbsp;&nbsp;<select name="asset">';

	foreach($one as $vo)
		{
		if(preg_match('/[a-zA-Z]/',$vo)){
		$html .= '<option value="'.$vo.'">'.$vo.'</option>';}
		}
	$html .= '</select>';
	
//rand balance

	if(!$_SESSION['rand'])
		
		{ 
			
		$rand=rand(101,199); 
		if(substr($shopbalance,0,5)<1){$k=1;}else{$k=floor($shopbalance)*2;}
		$_SESSION['k']=$k;
		$_SESSION['rand']=$rand/1000;
		$_SESSION['openshop']=substr($shopbalance,0,$numsp);
		$_SESSION['randx']=$rand;
		$shopnew=1;
		$shopcheck=2;

		}
		else
		{
			if(!$_SESSION['pass'])
			{
				
				if($shopbalance<$_SESSION['k']){
				$shopnew=1;
				$shopcheck=2;}
				else
					{
				
				$shopnew=substr($shopbalance,0,$numsp)-$_SESSION['openshop'];
			
				$shopnew=$shopnew-floor($shopnew);
			
				$shopcheck=$_SESSION['rand'];
				}
		

			}
			else
			{
			 
			
			 $shopnew=$shopcheck;}


		}


 $shopnew=number_format($shopnew, 3, '.', '');
 $shopcheck=number_format($shopcheck, 3, '.', '');




	if($shopbalance>0 & $shopnew==$shopcheck)

		{

		echo $html."&nbsp;<input type=\"number\" name=\"num\" style=\"width:50px;\">&nbsp;<input type=\"submit\" value=\"buy\">";$_SESSION['guest']="";
		$_SESSION['pass']=1;
		}

	else 
		{
		$_SESSION['guest']="&nbsp;&nbsp;Shop safu number is ".$_SESSION['randx'].", Guest mode.<br><br>&nbsp;&nbsp;Send x.".$_SESSION['randx']." (x>".$_SESSION['k'].") to active your shop address."; 
		
		echo $_SESSION['guest'];
		}

    echo "</form>";
	
	

	if($_SESSION['member']==1){$rm="<font color=red>Rasdaq Member</font>";}

	elseif($_SESSION['member']==100){$rm="<font color=red>Rasdaq VIP Member</font>";}


	if($_SESSION['pass']<>"" or $shopbalance>100)

			{
				

	echo "<form action=\"/vip/\" method=\"post\"><input type=\"hidden\" name=\"refund\" value=\"refund\"><br>&nbsp;&nbsp;Your address is ".$rm."<br>&nbsp;&nbsp;<a href=http://onervn.com/qr?address=".$_SESSION['raddress'].">".$_SESSION['raddress']." </a><br><br>";
	
	echo "&nbsp;&nbsp;<input type=\"submit\" value=\"refund\"></form>";

			}

			else

		{echo "&nbsp;&nbsp;Your address is ".$rm."<br>&nbsp;&nbsp;<a href=http://onervn.com/qr?address=".$_SESSION['raddress'].">".$_SESSION['raddress']." </a> <br><br>&nbsp;&nbsp;Active shop address could refund, or balance>100<br><br>";}



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
			$stock=$rpc->listmyassets($one[$i]);
			$stock=current($stock);

			if($_SESSION['member']==1){$price=$price*0.9;}
			elseif($_SESSION['member']==100){$price=$price*0.5;}

			$totalfund=$buytotal*$price;
			if($stock>$buytotal & $totalfund<$shopbalance)
				{
				
				echo " cost ".$totalfund." RVN";
				$_SESSION['sendok']="<br>&nbsp;&nbsp;".$buyasset." cost ".$totalfund." RVN, <font color=red>SEND OK!</font>";

				$getfund=$rpc->sendfrom($_SESSION['raddress'],"RY9a71GJSQemujR2giyCugW5N8bhCFAvJo",$totalfund);

				$errort = $rpc->error;

					if($errort != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error, buy failed</p>";
				
					}
					else
					{
					$bonusnum=rand(1,10);
					$bonus=$rpc->transfer("NUKA/COLA/CAP",$bonusnum,$_SESSION['raddress']);
					$sendasset=$rpc->transfer($buyasset,$buytotal,$_SESSION['raddress']);

					$errora = $rpc->error;

					if($errora != "") 
		
						{
					echo "<p>&nbsp;&nbsp; <font color=red>Error, send asset failed, rvn lost</font></p>";
				
						}
					else
						{

					print_r('&nbsp;&nbsp;, <font color=green>SEND OK!</font><br><br>&nbsp;&nbsp;<font color="#ff0000">B</font><font color="#ff7f00">o</font><font color="#ff7f00">n</font><font color="#00ff00">u</font><font color="#00ffff">s</font>: '.$bonusnum.' caps');
					$_SESSION['sendnum']=1;
						}
					
					}

				}else { echo "&nbsp;&nbsp;<font color=red>out of stock or balance</font>";}
			}
		}

	//refund



	if($refundre<>"")
		
				{
					if($shopbalance>1){$shopbalance=$shopbalance-0.9;}else{$shopbalance=$shopbalance-0.002;}
					$refund=$rpc->sendfrom($_SESSION['raddress'],$_SESSION['raddress'],$shopbalance);
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

				//list assets


$shopbalancea=$rpc->listassetbalancesbyaddress($_SESSION['shopaddress']);
$shopbalance=$shopbalancea["RASDAQ"];
	if(!$shopbalance){$shopbalance=0;}

 echo "<br>&nbsp;&nbsp;Shop rasdaq balance: ".$shopbalance."<br>&nbsp;&nbsp;Spend 1 rasdaq to see hidden price<br><form action=\"/vip/\" method=\"post\"><input type=\"hidden\" name=\"aparecium\" value=\"aparecium\"><br>&nbsp;&nbsp;<input type=\"submit\" value=\"aparecium\"></form><br><br>";

if($_REQUEST["aparecium"]<>"" & $shopbalance>0)
		{$getfund=$rpc->transferfromaddress("RASDAQ",$_SESSION['shopaddress'],1,"RY9a71GJSQemujR2giyCugW5N8bhCFAvJo","","","",$_SESSION['shopaddress']);
		$errora= $rpc->error;
		if($errort != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error,  failed</p>";
				
					}
					else
					{$_SESSION['aparecium']=1;}

		}

//show list

	if($shopnew==$shopcheck or $_SESSION['aparecium']==1)
	{

	for ($i=1;$i<$shopnum;$i++) 
		{
		list($one[$i],$count,$price)=explode("|",$shoplist[$i]);

		//stock
		if($_SESSION['member']==1){$price=$price*0.9;}
		elseif($_SESSION['member']==100){$price=$price*0.5;}

		$stock=$rpc->listmyassets($one[$i]);
		$stock=current($stock);
		if($stock>1 & $one[$i]<>"")
			{

			$assetlen=strlen($one[$i]);
			if($assetlen>20){$assetbr="<br>";}else{$assetbr="";}

		print("&nbsp;&nbsp;[<font color=blue>".$one[$i]."</font>](".$stock."), ".$assetbr."&nbsp;<font color=red>".$count."</font> asset <font color=blue>".$price." RVN</font><br><br>");
			}
		}
	}

	else
		{echo "&nbsp;&nbsp;****** Hidden Price Area ******<br><br>";

		$shopnum=$shopnum-2;
		echo "&nbsp;&nbsp;Shop safu number is ".$_SESSION['randx'].", ".$shopnum." assets hidden.<br>";
		
		echo "&nbsp;&nbsp;Send x.".$_SESSION['randx']." (x>".$_SESSION['k'].") to active your shop address.
		<br>&nbsp;&nbsp;".$shopaddress."<br>&nbsp;&nbsp;fee is 0.1 RVN<br>";

		echo "&nbsp;&nbsp;Guest can send rvn to see hidden content, <br>&nbsp;&nbsp;but only member get these refund.<br><br>";

		echo "&nbsp;&nbsp;****** Hidden Price Area  ******<br><br>";

		}
				echo "&nbsp;&nbsp;Bonus: Buy any asset random get nuka cap!<br><form action=\"/vip/\" method=\"post\"><input type=\"hidden\" name=\"change\" value=\"logout\"><br>&nbsp;&nbsp;<input type=\"submit\" value=\"logout\"></form>";

	include("../foot.txt");

}


?>


    </body>
</html>



