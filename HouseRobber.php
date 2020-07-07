<?php
// 198. 打家劫舍
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php
非负整数数组
   输入: [1,2,3,1]
   输出: 4

   输入: [2,7,9,3,1]

   输出: 12
比如 [2,1,9,1000,1] 中间隔2个能获得最大
  
   dp[i] 到i节点时候的最大值



   */
  function rob($nums) {
    if (!$nums) return 0;
    $dp = [];
    $dp[0] = $nums[0];
    $max = $nums[0];
    for ($i = 1; $i < count($nums); $i++) {
      $pre_max = 0;
      for ($j = 0; $j < $i - 1; $j++) {
        $pre_max = max($pre_max, $dp[$j]);
      }
      $dp[$i] = $pre_max + $nums[$i];
      $max = max($max, $dp[$i]);
    }
    return $max;
  }
}