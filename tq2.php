<?
$url1="http://www.dg121.com/default.asp";
$url2="http://www.dg121.com/nczdz.js";
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url2); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
$data=str_replace(array(";",'"',"{","}","[","]"),"",curl_exec($ch));
$tmp=explode(":",$data);
$temp=explode(",",$tmp[2]);
$time=explode(",",$tmp[3]);
$rtime=iconv( "UTF-8", "gb2312//IGNORE" ,$time[0]);
$shi=$tmp[15];

$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url1); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
$data1=trim(curl_exec($ch),"<td>");
$tmp2=explode('<td class="tout03"><div align="left">',$data1);
$yuce=explode("</div>",$tmp2[1]);

$tmp3=explode('<td class="tb12">',$data1);
$tmp4=explode("<td>",$tmp3[1]);
$temp2=explode("</td>",$tmp4[1]);

$tmp5=explode('<td bgcolor="F6FBFF"><table width=\'100%\'><tr><td>',$data1);
$tmp6=explode("</td><td>",$tmp5[1]);
$cy=explode("</td>",$tmp6[5]);

//print_r($cy);
print("Tem:".$temp[0]."/Wet:".$shi."
Tem:".$temp2[0]."
".substr($yuce[0],8)."
".$cy[0]."
".substr($rtime,5)
);

?>