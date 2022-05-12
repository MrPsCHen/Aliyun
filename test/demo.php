<?php

use Doit\Aliyun\Aliyun;
use Doit\Aliyun\AliyunConfig;
use Doit\Aliyun\Sms\AliyunSms;

include "./vendor/autoload.php";

//Aliyun::$aliyunConfigDefault = new AliyunConfig();

$aliyun = ALiyun::bind('XXXXXXXXXXXXXXX','XXXXXXXXXXXXXXXX');

$aliSms = new AliyunSms();
$aliSms->setPhoneNumbers('13000000000');
$aliSms->setSignName("XXXXXX");
$aliSms->setTemplateCode('XXXXXX');
$aliSms->setTemplateParam(['name'=>'xxxxx']);

var_export($aliyun->inject($aliSms)->apply());
