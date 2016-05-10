<?
ini_set('user_agent','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36'); 
error_reporting(E_ALL ^ E_NOTICE);

$url="http://www.cqcp.net/game/ssc/";
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
$source = curl_exec($ch); 

//$source = file_get_contents($url1);

$ad10=strpos($source,'openlist',0);
$ad11=strpos($source,'16',$ad10+1);
$ad12=strpos($source,'</li>',$ad11+1);

$qishu=substr($source,$ad11,$ad12-$ad11);

$ad20=strpos($source,'>',$ad12+5);
$ad21=strpos($source,'</li>',$ad20+1);

$nowjg=str_replace("-","",substr($source,$ad20+1,$ad21-$ad20-1));




echo $qishu."-".$nowjg;

?>