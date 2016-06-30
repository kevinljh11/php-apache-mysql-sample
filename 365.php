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
$ggame=explode(",h_ld",$game[$i]);
$gggame=explode(",",$ggame[0]);
$szcount=count($gggame);
if ($szcount>=4)
{
$gametime=$gggame[$szcount-1];
if (strstr($gametime,"status:") && $gametime!="status:\u5168" && $gametime!="status:\u534a" && $gametime!="status:\u672a")
{
	
$zhufen0=explode("rd:hg:",$ggame[0])[1];
$zhufen1=explode(",gg:",$zhufen0);
$zhufen=$zhufen1[0];
$kefen=explode(",",$zhufen1[1])[0];

$zhupos0=explode("p:",$ggame[0]);
if (count($zhupos0)>=2)
{
$zhupos=explode(",",$zhupos0[1])[0];	
$kepos=explode(",",$zhupos0[2])[0];	
$kename=$gggame[18];
}else
{
$kename=$gggame[17];$zhupos="";$kepos="";$zhupos="p:null";$kepos="p:null";	
}

$chupan0=explode("sd:f:hrf:",$ggame[0])[1];
$chupan1=explode(",hdx:",$chupan0);
$chupan=$chupan1[0];
$chudx=explode(",",$chupan1[1])[0];


$out1.=$gggame[0].",".$gametime.",".$gggame[5].",".$gggame[13].",".$zhupos.",".$kename.",".$kepos.",".$chupan.",".$chudx.",".$zhufen.",".$kefen."#@#";
}
}
}
$out2=str_replace(array("status:","n:","p:","sd:f:hrf:","hdx:","rd:hg:","gg:"),"",$out1);
echo $out2;
?>
