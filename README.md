# easysign
此库可帮助你快速和安全的完成签名。This library can help you to signature easier and safer.
## 用法
```php
$sign=new mod_easysign;
$sign->setsalt("<Put Your Random Salt Here!>");
$content="Hello,World";
$signature=$sign->encrypt($content);
if($sign->verify($signature,$content)){
//Do some method
echo "verify success.";
}else{
echo "Signature Verify Failed.";
}
```
