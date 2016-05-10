<?
ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;)'); 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai');

//$data=file_get_contents("http://live.dszuqiu.com/ajax/score/data?mt=0&nr=1");	
$url = "http://live.dszuqiu.com/ajax/score/data?mt=0&nr=1"; 
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
$data = curl_exec($ch); 

$game=explode("id:",str_replace(array('"',"{","}","[","]"),"",$data));
FOR ($i =0; $i <count($game); $i++) 
{
$ggame[$i]=explode(",h_ld",$game[$i]);
$gggame=explode(",",$ggame[$i][0]);
$szcount=count($gggame);
if ($szcount>=4)
{
$gametime=$gggame[$szcount-1];
if (strstr($gametime,"status:") && $gametime!="status:\u5168" && $gametime!="status:\u534a" && $gametime!="status:\u672a")
{
	
if (strstr($gggame[$szcount-23],"rd:hg:") && strstr($gggame[$szcount-22],"gg:"))
{	
 $zhufen=$gggame[$szcount-23];$kefen=$gggame[$szcount-22];
}else
{
	$zhufen=$gggame[$szcount-19];$kefen=$gggame[$szcount-18];
}


if (strstr($gggame[12],"p:") && strstr($gggame[14],"n:"))
{	
$zhupos=$gggame[12];$kename=$gggame[14];$kepos=$gggame[15];
}else
{
	$kename=$gggame[13];$zhupos="";$kepos="";$zhupos="p:null";$kepos="p:null";
}
if (strstr($gggame[18],"sd:f:hrf:") && strstr($gggame[19],"hdx:"))
{	
 $chupan=$gggame[18];$chudx=$gggame[19];
}else
{
	$chupan=$gggame[20];$chudx=$gggame[21];
}
$out1.=$gggame[0].",".$gametime.",".$gggame[5].",".$gggame[11].",".$zhupos.",".$kename.",".$kepos.",".$chupan.",".$chudx.",".$zhufen.",".$kefen."#@#";
}
}
}
$out2=str_replace(array("status:","n:","p:","sd:f:hrf:","hdx:","rd:hg:","gg:"),"",$out1);
echo $out2;
?>