<?php
// 55. 跳跃游戏
class Solution {

  /**
   * @param Integer[] $nums
   * @return Boolean
   输入: [2,3,1,1,4]
   输出: true

   输入: [3,2,1,0,4]
   输出: false
   */
  function canJump($nums) {
    $max = 0;
    foreach ($nums as $k => $v) {
//如果当前的下标比数组中目前能跳最远的还要大,说明这个下标是无论如何都不可抵达的
      if ($k > $max) return false;
      $max = max($max, $k + $v);//存能跳最远的地方
    }
    return true;
  }
}