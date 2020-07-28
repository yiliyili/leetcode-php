<?php
// 216. 组合总和 III 找出所有相加之和为 n 的 k 个数的组合。组合中只允许含有 1 - 9 的正整数，并且每种组合中不存在重复的数字。
// 说明：
// 所有数字都是正整数。
// 解集不能包含重复的组合。 
// 输入: k = 3, n = 9
// 输出: [[1,2,6], [1,3,5], [2,3,4]]
class Solution {
    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer[][]
     */
    public $ans=[];
    function combinationSum3($k, $n) {
        $list = [];
        $this->helper($k,$n,1,$list);
        return $this->ans;
    }
    //回溯
    function helper($k,$n,$start,$list){
        if($n<0) return;//如果减到负数，也没有必要继续搜索下去；
        if($k==0){
        //可能此时$n减出来小于0或大于0
            if($n==0) $this->ans[] = $list;
            return ;
        }
        for($i=$start;$i<=9;$i++){//因为结果集里的元素互不相同，因此下一层搜索的起点应该是上一层搜索的起点值 + 1；
            array_push($list,$i);
            $this->helper($k-1,$n-$i,$i+1,$list);
            array_pop($list);
        }
    }
}

