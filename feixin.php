<?php
function sendFetion($str){
  $ch = curl_init();
  $url = "https://quanapi.sinaapp.com/fetion.php?u=15901965812&p=hb25524289&to=15901965812&m=".urlencode($str);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  $ret = curl_exec($ch);
  curl_close($ch);
  return $ret;
}
