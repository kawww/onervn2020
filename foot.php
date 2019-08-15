<h4>
&nbsp;&nbsp;<a href="/" style="color: #000000;text-decoration:none;">onervn</a>&nbsp;|&nbsp;

<a href="/" style="color: #000000;text-decoration:none;"><b>search</b></a>&nbsp;|&nbsp;

<a href="/rasdaq" style="color: #000000;text-decoration:none;"><b>rasdaq</b></a>&nbsp;|&nbsp;

<a href="/qr" style="color: #000000;text-decoration:none;"><b>asset qr</b></a>&nbsp;|&nbsp;


<?php

if($_SESSION['raddress']<>""){

		

		$bonusnumr=rand(0,5);

		if($bonusnumr==1)

			{

		$atime=time();
		$btime=time()-$_SESSION['bonustime'];
		$ctime=60-$btime;

		if($btime>60)				{
		$bonusr=$rpc->transfer("NUKA/COLA/CAP",1,$_SESSION['raddress']);

		echo "<a href=\"/bonus\" style=\"color: #000000;text-decoration:none;\"><font color=\"#ff0000\">b</font><font color=\"#ff7f00\">o</font><font color=\"#ff7f00\">n</font><font color=\"#00ff00\">u</font><font color=\"#00ffff\">s</font>: ".$bonusnumr." caps</a>";

		$_SESSION['bonustime']=time();}

									else

				{
					echo "<a href=\"/bonus\" style=\"color: #000000;text-decoration:none;\">bonus: next roll in ".$ctime."s</a>";
									}
					

			}

		else
			
			{

		echo "<a href=\"/bonus\" style=\"color: #000000;text-decoration:none;\">bonus: Good Luck!</a>";

			}

		
}else		{

		echo "<a href=\"/bonus\" style=\"color: #000000;text-decoration:none;\">bonus</a>";

			}


?>

</h4>