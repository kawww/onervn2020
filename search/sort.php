<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>RAVENCOIN ASSET SEARCH</title>
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


		<form action="/search/sort.php" method="post">
		<br>&nbsp;&nbsp;
		<a href="/" style="color: #000000;text-decoration:none;"><b>RAVENCOIN ASSET SEARCH</b></a>
		<br><br>&nbsp;&nbsp;
		<input type="text" name="asset">
		<input type="submit" value="KAW">
		</form>


<?php


//rpc

$asset=trim($_REQUEST["asset"]);

	if(strpos($asset,"#") !== false or strpos($asset,"deid@") !== false or strpos($asset,"DEID@") !== false){

	

	$asset=str_replace("deid@","DEID#",$asset);
	$asset=str_replace("DEID@","DEID#",$asset);

	list($assa,$assb)=explode("#",$asset);

	$assa=strtoupper($assa);
	$asset=$assa."#".$assb;
	
	}else{
$asset=strtoupper($asset);}

$address=$asset;

//check address

if(!$address)

	{
    
	$line = count(file('assetsort.txt')); 
	$rnd=rand(1,$line);
	$address=strtoupper(getLine("assetsort.txt",$rnd));
	$address=preg_replace("/\s/","",$address);

	}

//get ravenland faucet list

$faucet=file_get_contents("faucet.txt");
$fn=file("faucet.txt");

//get onervn faucet list

$rfaucet=file_get_contents("../faucet/one.txt");
$rfn=file("../faucet/one.txt");

//get ravenx list

$xfaucet=file_get_contents("sale.txt");
$xfn=file("sale.txt");

$pfaucet=file_get_contents("pass.txt");
$pfn=file("pass.txt");


session_start();





if(!$_SESSION['list']){

$rawtransaction = $rpc->listassets();


$_SESSION['list']=$rawtransaction;

}

else

{$rawtransaction=$_SESSION['list'];}
//list assets






//check error

$error = $rpc->error;

if($error != "") 
	
	{

	echo "<p>&nbsp;&nbsp;Error,R</p>";
	exit;

	}

//check faucet number

$fnum=substr_count($faucet,$address);
$rnum=substr_count($rfaucet,$address);
$xnum=substr_count($xfaucet,$address);
$frnum=$fnum+$rnum;
echo "<p>&nbsp;&nbsp;<font color=red>".$address."</font>&nbsp;( faucet:".$frnum.", sale:".$xnum." ) [ <a href=/search/?asset=".$address." style=\"color: #000000;text-decoration:none;\">Fast</a> ]<br>&nbsp;&nbsp;[ <a href=\"/word\" style=\"color: #000000;text-decoration:none;\">Generate ".$address." universe</a> ]</p>";

//get search data

$age=$rawtransaction;
$_SESSION['search']=array();
$_SESSION['ass']=array();

foreach($age as $y=>$y_value)

	{

		if(strpos($y_value,$address) !== false)

			{
				if(strpos($pfaucet,$y_value) !== false)
					{$assetnum="10000+";}else{
			$assetadd= $rpc->listaddressesbyasset($y_value);
			
			$assetnum=count($assetadd);
			
			}
			$info = $rpc->getassetdata($y_value);
			

			$arr["num"]=$assetnum;
			$arr["asset"]=$y_value;
			$arr["ipfs"]=$info['ipfs_hash'];



array_push($_SESSION['ass'],$arr);

array_push($_SESSION['search'],$arr["asset"]);
			}
	}



arsort($_SESSION['ass']);

$listasset=$_SESSION['ass'];



foreach ($listasset as $k=>$v) 
			{
			
			//ipfs no
		
			$x_value=$v["asset"];
			$ipfs=$v["ipfs"];
			$assetnum=$v["num"];
			$f_value=$x_value;
			$u_value=$x_value;
			$u_value=str_replace("/","%2F",$u_value);
			$u_value=str_replace("#","%23",$u_value);
			if(!$ipfs)

				{

				if(strpos($faucet,$f_value) !== false)

					{
					
					//check faucet

					for($i=0;$i<count($fn);$i++)

						{  

						$fx=trim(strtoupper($fn[$i]));

						if($fx==$f_value)		
							
							{
 
							$x_value=$x_value."&nbsp;&nbsp;<a href=https://faucet.ravenland.org  style=\"color:green;text-decoration:none;\">[ faucet ]</a>";

							}
						}
			
					}

					//ravenx

					if(strpos($xfaucet,$f_value) !== false)

					{
					
					//check ravenx

					for($i=0;$i<count($xfn);$i++)

						{  

						$xfx=trim(strtoupper($xfn[$i]));

						if($xfx==$f_value)		
							
							{
 
							$x_value=$x_value."&nbsp;&nbsp;<a href=http://ravenx.net/sales/".$u_value." target=_blank style=\"color:green;text-decoration:none;\">[ buy ]</a>";

							}
						}
			
					}

					//special asset example

					if(strpos($f_value,"EQUA/") !== false )

						{
	
						$x_value=$x_value."&nbsp;&nbsp;<a href=https://www.equastart.io target=_blank style=\"color:green;text-decoration:none;\">[ web ]</a>";
						
						}

	   					echo "&nbsp;&nbsp;".$x_value." (<a href=/list?asset=".$u_value.">".$assetnum."</a>)&nbsp;&nbsp;<br>";
		
				}

			//ipfs yes

			else

				{
		
				//special asset example

				if($x_value=="HODLLLLLLLLLLLLLLLLLLLLLLLLLLL")

					{
		

					$x_value="<font color=ff0000>H</font><font color=ff1500>O</font><font color=ff2a00>D</font><font color=ff4000>L</font><font color=ff5500>L</font><font color=ff6a00>L</font><font color=ff7f00>L</font><font color=ff9400>L</font><font color=ffaa00>L</font><font color=ffbf00>L</font><font color=ffd400>L</font><font color=ffea00>L</font><font color=ffff00>L</font><font color=ccff00>L</font><font color=99ff00>L</font><font color=66ff00>L</font><font color=33ff00>L</font><font color=00ff00>L</font><font color=00ff2b>L</font><font color=00ff55>L</font><font color=00ff80>L</font><font color=00ffaa>L</font><font color=00ffd5>L</font><font color=00ffff>L</font><font color=00d5ff>L</font><font color=00aaff>L</font><font color=0080ff>L</font><font color=0055ff>L</font><font color=002bff>L</font><font color=0000ff>L</font>";
					//http://patorjk.com/text-color-fader/
					}
	
				$x_value="&nbsp;&nbsp;<a href=https://gotoipfs.com/#path=".$ipfs." target=_blank style=\"color:blue;text-decoration:none;\">".$x_value."</a>  (<a href=/list?asset=".$u_value.">".$assetnum."</a>)&nbsp;&nbsp;";

				$m_value=$x_value;

				//ravenland faucet

				if(strpos($faucet,$f_value) !== false )

					{
	    
					for($i=0;$i<count($fn);$i++)

						{  

						$fx=trim(strtoupper($fn[$i]));

						if($fx==$f_value)	
							
							{
 
							$x_value=$m_value."<a href=https://faucet.ravenland.org  style=\"color:green;text-decoration:none;\">[ faucet ]</a>";
							}
						}
	
					}

				//onervn faucet

				if(strpos($rfaucet,$f_value) !== false )

					{
	    
					for($i=0;$i<count($rfn);$i++)

						{  

						$rfx=trim(strtoupper($rfn[$i]));

						if($rfx==$f_value)	

							{
 

							$x_value=$m_value."<a href=http://onervn.com/faucet/?asset=".$f_value."  style=\"color:green;text-decoration:none;\">[ faucet ]</a>";
							}
						}
	
					}

				if(strpos($xfaucet,$f_value) !== false)

					{
					
					//check ravenx

					for($i=0;$i<count($xfn);$i++)

						{  

						$xfx=trim(strtoupper($xfn[$i]));

						if($xfx==$f_value)		
							
							{
 
							$x_value=$x_value."&nbsp;&nbsp;<a href=http://ravenx.net/sales/".$u_value." target=_blank style=\"color:green;text-decoration:none;\">[ buy ]</a>";

							}
						}
			
					}

	   	echo $x_value."<br>";
		
		}
	}	


echo "<br>&nbsp;&nbsp;<a href=http://onervn.com/search?asset=".$address." style=\"color: #000000;text-decoration:none;\">http://onervn.com/search?asset=".$address."</a>&nbsp;<br>";

include("../foot.php");


?>
    </body>
</html>
