<?php
/*
Module Name:EasySignature

Description:This module can help you to signature data and verify it!

Usage:Please see readme.md

Github Address:https://github.com/xieyi1393/easysign

Version:1.0.0

Author:xieyi1393

Thanks for XiangTan BenCu Network Technology co,ltd.
*/
class mod_easysign{
private $vsalt="";
public function setsalt($salt){
$this->vsalt=$salt;
}
public function encrypt($pass){
$vsalt=$this->vsalt;
$saltz=sha1(sha1($vsalt.sha1($vsalt.time(NULL).$vsalt.rand(0,9).rand(0,9).rand(0,9).rand(0,9)).$vsalt));
$pfp=md5($vsalt.md5($saltz.md5($vsalt.$pass.$vsalt).$saltz).$vsalt);
$nonce=0;
$pfz=md5($pfp."!".$nonce);
while($pfz[0]!="0" and $pfz[1]!="0"){
$nonce++;
$pfz=md5($pfp."!".$nonce);
}
return $pfz.",".$saltz;
}
public function verify($pass,$hash){
$arr=explode(",",$hash);
$vsalt=$this->vsalt;
$saltz=$arr[1];
$pfp=md5($vsalt.md5($saltz.md5($vsalt.$pass.$vsalt).$saltz).$vsalt);
$nonce=0;
$pfz=md5($pfp."!".$nonce);
while($pfz[0]!="0" and $pfz[1]!="0"){
$nonce++;
$pfz=md5($pfp."!".$nonce);
}
return ($pfz==$arr[0]);
}
}

