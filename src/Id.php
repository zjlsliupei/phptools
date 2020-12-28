<?php


namespace liupei\phptools;


class Id
{
    /**
     * 创建全局唯一id, 17位
     * @return string
     */
    public static function createUniqueId()
    {
        $uniqid = uniqid();
        $uniqid = str_replace('.', '', $uniqid);
        $unString = base_convert($uniqid, 16, 36);
        // 补足17位
        return str_pad($unString, 17, rand(1, 9999999));
    }
}