<?
ini_set('user_agent','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.22 (KHTML, like Gecko) QQBrowser/5.6.1 Safari/537.22'); 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai'); 

$url1="http://live.dszuqiu.com/";

$data1=file_get_contents($url1);
echo $data1;
?>?