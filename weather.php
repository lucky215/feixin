<?php
require 'feixin.php';

$data  = getWeather();
$str = matchSTR($data);
sendFetion($str);

 function matchSTR($data){
     preg_match('/".*"/', $data, $matches);
     $str = trim( iconv('gbk','UTF-8',$matches[0]), '"' );
     return $str;
 }

function getWeather(){
  $ch = curl_init();
  $url = "http://mat1.qq.com/weather/inc/minisite2_252.js";
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  $ret = curl_exec($ch);
  curl_close($ch);
  return $ret;
}
