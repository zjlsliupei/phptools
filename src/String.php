<?php


namespace liupei\phptools;


class String
{
    /**
     *  判断一个字符串是否在另一个字符串中
     * @param string $needle 要查找的字符串
     * @param string $haystack 被查找的字符串
     * @param string $split 字符串的分割符
     * @return boolen
     */
    public static function inString($needle, $haystack, $split = ',')
    {
        $arr = explode($split, $haystack);
        return in_array($needle, $arr);
    }
}