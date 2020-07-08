<?php
// 最小的k个数 最大堆
class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     * @github https://github.com/yumindayu/leetcode-php


    arr = [1,5,6,2,7,10] k = 3

    6
    1   5

     */
    public function getLeastNumbers($arr, $k)
    {
        if ($k == 0) {
            return [];
        }

        $heap = new \SplMaxHeap;
        for ($i = 0; $i < $k; $i++) {//先插入k个
            $heap->insert($arr[$i]);//自动堆化
        }
        for ($i = $k; $i < count($arr); $i++) {
            $top = $heap->top();
            if ($arr[$i] < $top) {
                $heap->extract();//弹出最大值
                $heap->insert($arr[$i]);//插入较小的值
            }
        }
        $ret = [];
        foreach ($heap as $num) {
            $ret[] = $num;
        }
        return $ret;
    }
}

$arr = [1,5,6,2,7,10];
$k = 3;
$solu = new Solution();
var_dump( $solu->getLeastNumbers($arr, $k));