<?php
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    private $originUrl = 'http://www.baidu.com/index.php?name=liupei&age=18#/task?param1=1&param2=2';
    private $originUrl2 = 'http://www.baidu.com/index.php';
    private $originUrl3 = 'http://www.baidu.com/index.php#/task?param1=1&param2=2';
    private $originUrl4 = 'http://www.baidu.com/index.php#/task';

    public function testBuildUrl()
    {
        $url = new \liupei\phptools\Url($this->originUrl);
        $buildUrl = $url->buildUrl();
        $this->assertEquals($this->originUrl, $buildUrl);

        $url = new \liupei\phptools\Url($this->originUrl2);
        $buildUrl = $url->buildUrl();
        $this->assertEquals($this->originUrl2, $buildUrl);

        $url = new \liupei\phptools\Url($this->originUrl3);
        $buildUrl = $url->buildUrl();
        $this->assertEquals($this->originUrl3, $buildUrl);

        $url = new \liupei\phptools\Url($this->originUrl3);
        $buildUrl = $url->buildUrl();
        $this->assertEquals($this->originUrl3, $buildUrl);
    }

    public function testAddQuery()
    {
        $url = new \liupei\phptools\Url($this->originUrl);
        $url->addQuery("love", 'eating');
        $buildUrl = $url->buildUrl();
        $this->assertEquals('http://www.baidu.com/index.php?name=liupei&age=18&love=eating#/task?param1=1&param2=2', $buildUrl);
    }

    public function testAddFragmentQuery()
    {
        $url = new \liupei\phptools\Url($this->originUrl);
        $url->addFragmentQuery("love", 'eating');
        $buildUrl = $url->buildUrl();
        $this->assertEquals('http://www.baidu.com/index.php?name=liupei&age=18#/task?param1=1&param2=2&love=eating', $buildUrl);
    }
}