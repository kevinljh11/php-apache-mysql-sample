<?
ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;)'); 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai');

$pid = $_GET["p"];
if ($pid=="")
{
	$pid=1;
}

$url="http://dg.nuomi.com/326/release?async_load_page=".$pid;	
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
$data = curl_exec($ch); 	
$game=explode('.html"target="_blank"data-topten="v=',$data);
$tmpcall[0]="00000000";
$callcount=0;
FOR ($i =1; $i <count($game); $i++) 
{
$cid=substr($game[$i],0,8);

$url2="http://www.nuomi.com/pcindex/main/shopchain?dealId=".$cid;
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url2); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
$data2 = curl_exec($ch); 
$data3=str_replace(array('"',"{","}","[","]"),"",$data2);
$tmp1=explode("name:",$data3);
$tmp2=explode(",address:",$tmp1[1]);
$tmp3=explode(",phone",$tmp2[1]);
$tmp4=explode(",baidu_longitude",$tmp3[1]);
//$call=str_replace(array(":0769",":"),"",$tmp4[0]);
if (in_array($tmp4[0],$tmpcall)==false)
{
$out.=$tmp2[0]."#".$tmp4[0]."#".$tmp3[0]."<br>";
$callcount++;
$tmpcall[$callcount]=$tmp4[0];
}
}  
echo  json_decode('"'.$out.'"');
?>