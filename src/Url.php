<?php


namespace liupei\phptools;

/**
 * url相关解析
 * @package liupei\phptools
 */
class Url
{
    private $scheme = '';
    private $host = '';
    private $path = '';
    private $query = [];
    private $fragmentPath = '';
    private $fragmentQuery = [];

    public function __construct($url)
    {
        $this->parseUrl($url);
    }

    /**
     * 解析url中的query参数，锚点参数等
     * @param $url
     */
    private function parseUrl($url)
    {
        $params = parse_url($url);
        $this->scheme = $params['scheme'] ?? '';
        $this->host = $params['host'] ?? '';
        $this->path = $params['path'] ?? '';
        if (isset($params['query'])) {
            parse_str($params['query'], $this->query);
        }
        if (isset($params['fragment'])) {
            $splitPoint = strpos($params['fragment'], '?');
            if ($splitPoint !== false) {
                $this->fragmentPath = substr($params['fragment'], 0,$splitPoint);
                parse_str(substr($params['fragment'], $splitPoint+1), $this->fragmentQuery);
            } else {
                $this->fragmentPath = $params['fragment'];
            }
        }
    }

    /**
     * 增加query参数
     * @param string $param query参数，重复会覆盖
     * @param mixed $value
     */
    public function addQuery($param, $value)
    {
        $this->query[$param] = $value;
    }

    /**
     * 增加锚点后面query参数
     * @param string $param query参数，重复会覆盖
     * @param mixed $value
     */
    public function addFragmentQuery($param, $value)
    {
        $this->fragmentQuery[$param] = $value;
    }

    /**
     * 生成url字符串
     * @return string
     */
    public function buildUrl()
    {
        $url = "{$this->scheme}://{$this->host}{$this->path}";
        if (!empty($this->query)) {
            $url .= "?" . http_build_query($this->query);
        }
        if (!empty($this->fragmentPath)) {
            $url .= "#" . $this->fragmentPath;
        }
        if (!empty($this->fragmentQuery)) {
            $url .= "?" . http_build_query($this->fragmentQuery);
        }
        return $url;
    }

    /**
     * 获取scheme, 如：http、https
     * @return string
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * 获取host
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * 获取path路径，如:http://www.test.com/index.php 返回/index.php
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * 获取所有query
     * @return array
     */
    public function getAllQuery()
    {
        return $this->query;
    }

    /**
     * 获取锚点后path, 如:http://www.test.com/index.php#task?id=1 返回task
     * @return string
     */
    public function getFragmentPath()
    {
        return $this->fragmentPath;
    }

    /**
     * 获取锚点后所有query参数，如:http://www.test.com/index.php#task?id=1&name=2 返回array('id'=>1,'name'=>2)
     * @return array
     */
    public function getFragmentAllQuery()
    {
        return $this->fragmentQuery;
    }
}
