<?php


namespace liupei\phptools;


class Arrays
{
    /**
     * 生成一棵树
     * @param array $items 待生成的数据
     * @param string $idAliasName id别名，默认id
     * @param string $pidAliasName pid别名，默认pid
     * @param string $childAliasName child别名，默认返回child
     * @param bool $addEmptyChild child为空时是否返回空数组，默认true
     * @return array
     */
    public static function generateTree($items, $idAliasName = 'id', $pidAliasName = 'pid', $childAliasName = 'child', $addEmptyChild = true){
        $newData = [];
        foreach ($items as $value) {
            if ($addEmptyChild) {
                $value[$childAliasName] = [];
            }
            $newData[$value[$idAliasName]] = $value;
        }

        $tree = [];
        foreach($newData as $item){
            if(isset($newData[$item[$pidAliasName]])){
                $newData[$item[$pidAliasName]][$childAliasName][] = &$newData[$item[$idAliasName]];
            }else{
                $tree[] = &$newData[$item[$idAliasName]];
            }
        }
        return $tree;
    }

    /**
     *  二维数组设置键名
     *  @param array  $array 二维数组
     *  @param string $key   要设置的键名，在二维数组中存在的键
     *  @return array        键名提取成功的数组
     */
    public static function array2SetKey($array, $key)
    {
        $return = [];
        foreach ($array as $value) {
            if (isset($value[$key])) {
                $return[$value[$key]] = $value;
            }
        }
        return $return;
    }
}
