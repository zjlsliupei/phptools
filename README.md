### 介绍
封装php常用工具，已包含以下工具
- http请求模拟

### 快速使用
##### http类工具
```php
// post请求
$res = liupei\phptools\Http::post(
    "https://oapi.dingtalk.com/user/get", // url
    ['acces_token' => 'ACCESS_TOKEN'],  // query param
    ['name' => 'liupei'] // post param
);
var_dump($res);

// get请求
$res = liupei\phptools\Http::get(
    "https://oapi.dingtalk.com/user/get", // url
    ['acces_token' => 'ACCESS_TOKEN'] // query param
);
var_dump($res);
```