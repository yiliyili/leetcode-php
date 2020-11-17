<?php
// 171. Excel表列序号
// 给定一个Excel表格中的列名称，返回其相应的列序号。
 // C -> 3
 //    ...
 //    Z -> 26
 //    AA -> 27
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function titleToNumber($s) {
        $n = strlen($s);
        $ans = 0;
        for($i=0;$i<$n;$i++){
            $ans += (ord($s[$i])-64)*pow(26,$n-$i-1);
        }
        return $ans;//减1即为从0开始
    }
}

$solu = new Solution();
var_dump($solu->titleToNumber('AA'));//27
