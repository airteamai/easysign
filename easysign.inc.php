<?php
/*
Module Name:EasySignature

Description:This module can help you to signature data and verify it!

Usage:Please see readme.md

Github Address:https://github.com/xieyi1393/easysign

Version:2.0

Author:xieyi1393

Thanks for XiangTan BenCu Network Technology co,ltd.
*/
class mod_easysign{
private $vsalt="";
public function setsalt($salt){
$this->vsalt=$salt;
}
public function encrypt($pass,$algo="sha256"){
$f=0;
$vsalt=$this->vsalt;
$saltz=hash($algo,hash($algo,$vsalt.hash($algo,$vsalt.time(NULL).$vsalt.rand(0,9).rand(0,9).rand(0,9).rand(0,9)).$vsalt));
$saltr=hash($algo,hash($algo,hash($algo,rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).time(null).rand(0,9).rand(0,9).rand(0,9))));
$pfp=hash($algo,$vsalt.hash($algo,$saltz.md5($vsalt.$pass.$vsalt).$saltz).$vsalt);
$nonce=0;
$pfz=hash($algo,$pfp.$saltr."!".$nonce);
while($pfz[0]!="0" or $pfz[1]!="0"){
$nonce++;
$pfz=hash($algo,$pfp.$saltr."!".$nonce);
}
return $pfz.",".$saltz.",".$saltr;
}
public function verify($pass,$hash,$algo="sha256"){

$arr=explode(",",$hash);
$vsalt=$this->vsalt;
$saltz=$arr[1];
$saltr=$arr[2];
$pfp=hash($algo,$vsalt.hash($algo,$saltz.md5($vsalt.$pass.$vsalt).$saltz).$vsalt);
$nonce=0;
$pfz=hash($algo,$pfp.$saltr."!".$nonce);
while($pfz[0]!="0" or $pfz[1]!="0"){
$nonce++;
$pfz=hash($algo,$pfp.$saltr."!".$nonce);
}
return ($pfz==$arr[0]);
}
private function array_toUri($arr){
ksort($arr);
$str="";
foreach($arr as $k=>$v){
if($str!="")$str.="&";
$str.=urlencode($k)."=".urlencode($v);
}
return $str;
}
public function array_encrypt($arr,$algo="sha256"){
$str=$this->array_toUri($arr);
return $this->encrypt($str,$algo);
}
public function array_verify($arr,$hash,$algo="sha256"){
$str=$this->array_toUri($arr);
  return $this->verify($str,$hash,$algo);
}

}

