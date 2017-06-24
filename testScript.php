<html>
<body>
<?php
$host = '136.159.5.27';
$port = 8267;
//$data = '{"operationFlag":1,"stringFragments":["o","wolf"]}' . PHP_EOL;  
//$data = '{"operationFlag":2,"username":"orangeCheeto",password:"collusionWithASideOfSaltAndHash"}' . PHP_EOL;
//$data = '{"operationFlag":3,"sessionId":-329941847,"gameId":4,"comment":"does need co"}' . PHP_EOL;
//$data = '{"operationFlag":4,"sessionId":-99891662,"gameId":4}' . PHP_EOL; // adds to wishlist
//$data = '{"operationFlag":5,"sessionId":-157215688,"gameId":6}' . PHP_EOL;
//$data = '{"operationFlag":6,"sessionId":-99891662}' . PHP_EOL;
//$data = '{"operationFlag":7,"category":"E"}' . PHP_EOL;
$errstr = '';
$errno = '';
$buffer = '';
$id
 
print '<b>Sending to Server</b><br/>';
echo $data;
 
if ( ($fp = fsockopen($host, $port, $errno, $errstr, 3) ) === FALSE)
	echo "$errstr ($errno)";
else {
	print '<br/><br/><b>Received from Server</b><br />';
	fwrite($fp, $data);
	while (! feof($fp)) {
  	$line = fgets($fp, 4096);
  	$buffer .= $line;
  	echo $line;
	}
	fclose($fp);
 
	print '<br/><br/>';
	$json = json_decode($buffer, true);
	highlight_string("<?php\n\$json =\n" . var_export($json, true) . ";\n?>");
}
 
?>
</body>
</html>
