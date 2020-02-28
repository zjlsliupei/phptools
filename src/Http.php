<?php
namespace liupei\phptools;

class Http
{
    /**
     * 模拟post请求
     * @param string $url 请求域名
     * @param array $queryParam 请求查询字符串
     * @param array $postParam 请求post参数
     * @param array $header 请求头设置
     * @return bool|string
     */
    public static function post($url, $queryParam = [], $postParam = [], $header = [])
    {
        $url = self::addQueryParam($url, $queryParam);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (is_array($postParam)) {
            $postParam = http_build_query($postParam);
        }
        $headerArray = [];
        foreach ($header as $key => $value) {
            $headerArray[] = $key . ':' . $value;
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postParam);
        curl_setopt($ch,CURLOPT_HTTPHEADER, $headerArray);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    /**
     * url添加查询字符串
     * @param string $url 请求域名
     * @param array $queryParam 请求查询字符串
     * @return string
     */
    private static function addQueryParam($url, $queryParam = [])
    {
        if (empty($queryParam)) {
            return $url;
        }
        $_url = '';
        if (strpos($url, '?')) {
            $_url = $url . '&' . http_build_query($queryParam);
        } else {
            $_url = $url . '?' . http_build_query($queryParam);
        }
        return $_url;
    }

    /**
     * 模拟get请求
     * @param string $url 请求域名
     * @param array $queryParam 请求查询字符串
     * @return bool|string
     */
    public static function get($url, $queryParam = [])
    {
        $url = self::addQueryParam($url, $queryParam);
        return file_get_contents($url);
    }
}