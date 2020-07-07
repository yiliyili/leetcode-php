<?php
// 169. 多数元素
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

   输入: [3,2,3]
   输出: 3

   输入: [2,2,1,1,1,2,2]
   输出: 2

num     2
count   1
   */
  //摩尔投票法
  function majorityElement($nums) {
    $start = $nums[0];
    $count = 1;//$start有一个了

    for ($i = 1; $i < count($nums); $i++) {
      if ($nums[$i] == $start) {
        $count++;
      } else {
        $count--;
        if ($count == 0) {
          $start = $nums[$i + 1];
          $count = 1;
          $i++;//再移动到下一个元素
        }
      }
    }
    return $start;
  }
}