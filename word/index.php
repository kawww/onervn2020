<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raven Asset Universe</title>


<script src="https://cdn.bootcss.com/wordcloud2.js/1.1.0/wordcloud2.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<div id="canvas-container" align="center">
    <canvas id="canvas" width="1920px" height="1080px"></canvas>
</div>

<?php


global $error;





$error = "";
include("../rpc.php");

$rpc = new Linda();
$list = $rpc->listassets();
$words = $list;
//$words = shuffle($list);
//$words=array_rand($list, 10000);

function display_cloud($words){

  for ($i=1;$i<10000;$i++) 
		  {
      

		
        $count = rand(1,24);




        echo "['".$words[mt_rand(0, 20000)]."', ".$count."],";
    }

}

if($error != ""){
    echo $error;
}

$back=rand(0,1);
if($back<>0){
                $backa = "'random-dark'";
				$backb = "'#fff'";
				
				}
       else{
        
			  $backa = "'random-light'";
			  $backb = "'#333'";
}



?>


<script>
    var options = eval({
        "list": [

<?php 
display_cloud($words); 
?>
           
        ],
        "gridSize": 4, // size of the grid in pixels
        "weightFactor": 1, // number to multiply for size of each word in the list
        "fontWeight": 'normal', // 'normal', 'bold' or a callback
        "fontFamily": 'Times, serif', // font to use
		"color":<?php echo $backa; ?>,
		"backgroundColor":<?php echo $backb; ?>,
		"minRotation": -1.57080,
        "maxRotation": -1.57080,
		"shape": 'diamond',
		
			"rotateRatio": 0.1 // probability for the word to rotate. 1 means always rotate
    });
    var canvas = document.getElementById('canvas');
    WordCloud(canvas, options);

</script>
<?php include("../foot.txt"); ?>
</body>
</html>
