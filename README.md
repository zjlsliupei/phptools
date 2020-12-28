### 介绍

封装php常用工具

- Arrays.php 数组相关操作
- Code.php 编码相关操作
- Url.php Url相关操作
- Id.php Id生成，解析
- String.php 字符串相关操作

### Arrays操作

```php
$arr2 = [
    [
        "key"=>1,
        "name"=>'name1'
    ]   
];
$_arr2 = \liupei\phptools\Arrays::array2SetKey($arr2, 'key');
var_dump($_arr2);
//$arr2 = [
//    1 => [
//        "key"=>1,
//        "name"=>'name1'
//    ]   
//];
```


### Url操作

实例化

```php
$url = new \liupei\phptools\Url('http://www.baidu.com/index.php?name=liupei&age=18#task?id=1&back_url=ddd');
```

增加query参数

```php
$url->addQuery("param1", "value1");
```

增加FragmentQuery参数

```php
$url->addFragmentQuery("param1", "value1");
```

构建url

```php
$urlStr = $url->buildUrl();
```

### Id操作

生成唯一id

```php
$id = \liupei\phptools\Id::createUniqueId();
var_dump($id);
```

### String操作

判断一个字符串是否在另一个字符串中
```php
$needel = 'a';
$haystack = 'a,b';
$in = \liupei\phptools\String::inString($needel,$haystack);
var_dump($in);
// true
```