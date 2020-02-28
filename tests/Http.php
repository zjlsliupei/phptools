<?php
include '../vendor/autoload.php';

$res = liupei\phptools\Http::post(
    "https://oapi.dingtalk.com/user/get",
    ['acces_token' => 'ACCESS_TOKEN'],
    ['name' => 'liupei']
);
var_dump($res);


$res = liupei\phptools\Http::get(
    "https://oapi.dingtalk.com/user/get",
    ['acces_token' => 'ACCESS_TOKEN']
);
var_dump($res);