<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>RAVENCOIN ASSET ADDRESS</title>
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

        <!--
            Chrome 31+ has home screen icon 192×192 (the recommended size for multiple resolutions).
            If it’s not defined on that size it will take 128×128.
        -->
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

<?php


//check server


include("../server.php");

session_start();

?>

        <!-- Add your site or application content here -->

        <script src="/js/vendor/jquery-2.1.3.min.js"></script>
        <script src="/js/helper.js"></script>
        <script src="/js/main.js"></script>


		<form action="/list/" method="post">
		<br>&nbsp;&nbsp;
		<a href="/list" style="color: #000000;text-decoration:none;"><b>RAVENCOIN ASSET ADDRESS</b></a>
		<br><br>&nbsp;&nbsp;
		<input type="text" name="asset">
		<input type="submit" value="KAW">
		</form>


<?php


//rpc

$address=trim(strtoupper($_REQUEST["asset"]));

//check address

if(!$address)

	{
    
	$line = count(file('../search/assetsort.txt')); 
	$rnd=rand(1,$line);
	$address=strtoupper(getLine("../search/assetsort.txt",$rnd));
	$address=preg_replace("/\s/","",$address);

	}

//get ravenland faucet list


//get ravenland faucet list
$pfaucet=file_get_contents("../search/pass.txt");
$pfn=file("../search/pass.txt");



session_start();


$_SESSION['asset']=$address;

if(strpos($pfaucet,$address) !== false)
	{
$rawtransaction = $rpc->listaddressesbyasset($address,false,10000);$max="+";}
else{
$rawtransaction = $rpc->listaddressesbyasset($address);$max="";}




//list assets






//check error

$error = $rpc->error;

if($error != "") 
	
	{

	echo "<p>&nbsp;&nbsp;Error,R</p>";
	exit;

	}

//check faucet number

$info = $rpc->getassetdata($address);

if($info['ipfs_hash']<>""){ $ipfs="[ <a href=https://gotoipfs.com/#path=".$info['ipfs_hash']." target=_blank style=\"color:blue;text-decoration:none;\">IPFS</a> ]";}


$frnum=count($rawtransaction);
if(!$_REQUEST["hide"]){
echo "<p>&nbsp;&nbsp;<font color=red>".$address."</font>&nbsp;( address: ".$frnum."".$max." )".$ipfs."[ <a href=/list?asset=".$address."&hide=1 style=\"color: #000000;text-decoration:none;\">Hide num</a> ]</p>";}

else

{echo "<p>&nbsp;&nbsp;<font color=red>".$address."</font>&nbsp;( address: ".$frnum."".$max." )".$ipfs."[ <a href=/list?asset=".$address."&hide= style=\"color: #000000;text-decoration:none;\">Show num</a> ]</p>";}




//get search data

$age=$rawtransaction;
$_SESSION['add']=array();

foreach($age as $y=>$y_value)

	{

		

			

			$arr["num"]=$y_value;
			$arr["add"]=$y;
	



array_push($_SESSION['add'],$arr);

	
	}



arsort($_SESSION['add']);



foreach ($_SESSION['add'] as $k=>$v) 
			{

$num=$v["num"];
$add=$v["add"];

if(!$_REQUEST["hide"]){
			echo "<br>&nbsp;&nbsp;<a href=/qr?address=".$add." style=\"color: #000000;text-decoration:none;\">".$add."</a>&nbsp;(".$num.")<br>";}else
				{	echo "<br>&nbsp;&nbsp;<a href=/qr?address=".$add." style=\"color: #000000;text-decoration:none;\">".$add."</a><br>";}
			
	}	


echo "<br><br>&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://onervn.com/list?asset=".$address."><br><br>&nbsp;&nbsp;http://onervn.com/list?asset=".$address."<br>";

include("../foot.php");


?>
    </body>
</html>
