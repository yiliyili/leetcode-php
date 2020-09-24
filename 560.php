<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//前缀和,用map降低时间复杂度
class Solution {
    function subarraySum($nums, $k) {
        $n = count($nums);
        if ($n == 0) return 0;
        $ans = 0;
        $hash = [];
        $hash[0] = 1;
        $preSum = 0;
        for ($i = 0; $i < $n; ++$i) {
            $preSum += $nums[$i];
            $diff = $preSum - $k;
            if (isset($hash[$diff])) $ans+= $hash[$diff];

            if (isset($hash[$preSum])) {
                $hash[$preSum]++;
            } else {
                $hash[$preSum] = 1;
            }
        }
        return $ans;
    }
}
$test = new Solution;
$nums = [1, 2, 3];
$k    = 3;
$ret  = $test->subarraySum($nums, $k);
var_dump($ret);exit;
