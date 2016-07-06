<?
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ALL ^ E_NOTICE);

$pid = $_GET["p"];
if ($pid=="")
{
	$pid=1;
}

$oldtime=time();
echo date("y-m-d H:i:s")."==";

$url="http://m.weibo.cn/page/json?containerid=1005051970283564_-_WEIBO_SECOND_PROFILE_WEIBO&page=".$pid;
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
$data = curl_exec($ch); 
$data1=explode("\"bid\":\"",$data);
FOR ($i =1; $i <count($data1); $i++) 
{
	$tieid=explode("\"",$data1[$i])[0];
	$itemurl="http://weibo.cn/comment/".$tieid;
	$itemdata="";
	$ch = curl_init(); 
    curl_setopt ($ch, CURLOPT_URL, $itemurl); 
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
    $itemdata = curl_exec($ch); 
	$idata1= explode("#</a>",$itemdata);
	$idata2= explode("</span>",$idata1[1]);
	if ($idata2[0]!="")
	{
	$out.="<a href='".$itemurl."' style='color:red;text-decoration:none;' target='_blank'>".$itemurl."</a><br>".$idata2[0]."<br>===========================================================================================<br>";
	}

}
$nextid=$pid+1;
$timecha=time()-$oldtime;
echo $timecha."s "."<a href='/dgrc.php?p=".$nextid."' style='color:blue' target='_self'>下下下下下下下下下下下一页页页页页页页页页页页页</a><br><br>";
echo $out;
echo "<a href='/dgrc.php?p=".$nextid."' style='color:red' target='_self'>下下下下下下下下下下下一页页页页页页页页页页页页</a>";
?>