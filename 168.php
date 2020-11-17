<?php
// 168. Excel表列名称
// 给定一个正整数，返回它在 Excel 表中相对应的列名称。
//  3 -> C
    // ...
    // 26 -> Z
    // 27 -> AA
class Solution {

    /**
     * @param Integer $n
     * @return String
     */
    function convertToTitle($n) {
        //$n++ ;//加此行从0开始
        if($n <= 0) return "";
        $s = "";
        while($n > 0){
            $n --;
            $s = chr(($n%26) + 65).$s;
            $n = (int) ($n/26);
        }
        return $s;
    }
}

$solu = new Solution();
var_dump($solu->convertToTitle(27));//AA
