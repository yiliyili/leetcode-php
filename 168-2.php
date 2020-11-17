<?php


class Solution
{
    /**
     * 给定一个正整数，返回它在 Excel 表中相对应的列名称。从1开始
     * @param Integer $n
     * @return String
     */
    function convertToTitle($n)
    {
        if ($n <= 0) return "";
        $s = "";
        while ($n > 0) {
            $n--;
            $s = chr(($n % 26) + 65) . $s;
            $n = (int)($n / 26);
        }
        return $s;
    }

    /**
     * 给定一个自然数，返回它在 Excel 表中相对应的列名称。从0开始
     * @param Integer $n
     * @return String
     */
    function convertToTitle2($n)
    {
        $n++;//只比上边多一行++
        if ($n <= 0) return "";
        $s = "";
        while ($n > 0) {
            $n--;
            $s = chr(($n % 26) + 65) . $s;
            $n = (int)($n / 26);
        }
        return $s;
    }

    /**
     * 给定一个Excel表格中的列名称，返回其相应的列序号,从1开始
     * @param  [type] $s [description]
     * @return [type]    [description]
     */
    function titleToNumber($s)
    {
        $n   = strlen($s);
        $ans = 0;
        for ($i = 0; $i < $n; $i++) {
            $ans += (ord($s[$i]) - 64) * pow(26, $n - $i - 1);
        }
        return $ans;//减1即为从0开始
    }
}

$solu = new Solution();
var_dump($solu->convertToTitle(26));//Z
var_dump($solu->convertToTitle2(26));//AA
var_dump($solu->convertToTitle2(0));//A
var_dump($solu->titleToNumber('AA'));//27
var_dump($solu->titleToNumber('L'));//12
