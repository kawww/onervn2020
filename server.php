<?php

include("../rpc.php");

$rpc = new Linda();
$superise = $rpc->getblockcount();
$error = $rpc->error;

if(strlen($superise<5) or $error != "") 
	
	{

	echo "<center><H1>Server Raven Node OFFLINE</H1>
	onervn.com<br><img src=/img/rhead.jpg><br><br>
	Service unreachable now, auto restart every hour. See you next hour, Kawww<br>";
	exit;

	}

?>