<html>
<head>
<title>GameList <?=date('Y')?></title>
<style type="text/css">
html, body {
	font-family: 'Consolas', 'Courier New', 'Courier';
	font-size: 10pt;
	color: #000000;	
}
</style>
</head>
<body><?php
$filename = "gamelist.txt";
$formatType = (empty($_GET['gwj'])) ? 'html' : 'gwj';
if(is_readable($filename)){
	$fileContents = file($filename);
	if(count($fileContents)){
		foreach($fileContents as $fileLine){
			$transformedLine = trim($fileLine);
			$transformedLine = str_replace('[ ]','*',$transformedLine);
			if($formatType == 'gwj'){
				$transformedLine = str_replace('* in progress *','[i]--in progress--[/i]',$transformedLine);
				if(substr($transformedLine,-1) == ':'){
					$transformedLine = "[b]{$transformedLine}[/b]";
				}
			} else {
				$transformedLine = str_replace('* in progress *','<i>--in progress--</i>',$transformedLine);
				$transformedLine = str_replace('[quote=trueheart78]','<i>"',$transformedLine);
				$transformedLine = str_replace('[quote]','<i>"',$transformedLine);
				$transformedLine = str_replace('[/quote]','</i>"',$transformedLine);
				if(substr($transformedLine,-1) == ':'){
					$transformedLine = "<b>{$transformedLine}</b>";
				}
			}
			print $transformedLine."<br>";
		}
	}
	//var_dump($fileContents);
} else {
	print "Unable to find a gamelist file.";
}
?></body>
</html>