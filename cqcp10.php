<?
ini_set('user_agent','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36'); 
error_reporting(E_ALL ^ E_NOTICE);

$url="http://www.cqcp.net/game/ssc/";
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
$source = curl_exec($ch); 

$game1=explode("</li></ul><ul><li style='width:65px;'>",$source);

for ($i=1;$i<=10;$i++)
{
$game2=explode("</li><li style='width:80px;'>",$game1[$i]);
$qishu=$game2[0];
$nowjg=explode("</li><li style='width:50px;'>",$game2[1])[0];
echo $qishu."-".str_replace("-","",$nowjg)."<br>";
}


?>