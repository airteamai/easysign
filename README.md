# easysign
## 简介
此库可帮助你快速和安全的完成签名。This library can help you to signature easier and safer.
Github地址:[Github]<https://github.com/xieyi1393/easysign/>
## 例程
```php
$sign=new mod_easysign;
$sign->setsalt("<Put Your Random Salt Here!>");
$content="Hello,World";
$signature=$sign->encrypt($content);
if($sign->verify($content,$content)){
//Do some method
echo "verify success.";
}else{
echo "Signature Verify Failed.";
}
```
## 函数列表
### setsalt
#### 函数原型:
```php
public function setsalt(string);
```
#### 函数简介
用于设置该Easysign对象的Salt
#### 函数用法
```
$Easysign对象->setsalt("<Put salt here!>");
```
### encrypt
#### 函数原型
```php
public function encrypt(string)
```
#### 函数简介
使用该Easysign对象生成一个Hash
#### 函数用法
```php
$Easysign对象->encrypt("Content here!");
```
### array_encrypt
#### 函数原型
```php
public function array_encrypt(array);
```
#### 函数简介
使用该Easysign对象生成数组的Hash
#### 函数用法
```php
$Easysign对象->array_encrypt(array("Name"=>"Joe","Sex"=>"Male"));
```
### array_verify
#### 函数原型
```php
public function array_verify(array,string);
```
#### 函数简介
使用该Easysign对象验证数组的Hash
#### 函数用法
```php
$Easysign对象->array_verify(array("Name"=>"Joe","Sex"=>"Male"),$hash);
```
### verify
#### 函数原型
```php
public function verify(string,string);
```
#### 函数简介
使用该Easysign对象验证生成的Hash
#### 函数用法
```php
$Easysign对象->verify("Content here!","Encrypted Hash here!");
```
## 特别鸣谢
[湘潭市本初网络科技有限公司]<https://www.bcsite.cn/>
## 个人博客
[谢毅的博客]<https://xieyi1393.top/>
