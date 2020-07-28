<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
class Solution
{
//给定数量不限的硬币，币值为25分、10分、5分和1分，编写代码计算n分有几种表示法。
    /**
     * @param Integer $n
     * @return Integer
     */
    public function waysToChange($n)
    {
        if ($n <= 1) {
            return $n;
        }

        $dp    = [];
        $coins = [1, 5, 10, 25];
        $max = max(25, $n);
        for ($i = 0; $i <= $max; $i++) {
            $dp[$i] = 0;//一开始不知道能不能凑出来,且要让25行能够取到下标
        }
        
        for ($i = 0; $i < count($coins); $i++) {
            $dp[$coins[$i]] += 1;//等于该面值的起码有一种方法
            for ($j = $coins[$i]; $j <= $n; $j++) {//直接遍历硬币,不用比较j和硬币大小
                $dp[$j] += $dp[$j - $coins[$i]];
            }
        }

        return $dp[$n] % 1000000007;//题目要求的
    }
}

$test   = new Solution;
$ret    = $test->waysToChange(10);
var_dump($ret);