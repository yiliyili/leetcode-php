<?php
// 11 盛水最多水的容器
class Solution {

  /**
   * @param Integer[] $height
   * @return Integer   

   [1,8,6,2,5,4,8,3,7]
   */
  function maxArea($height) {
    $left = 0;
    $right = count($height) - 1;
    $max_area = 0;
    while ($left < $right) {
      $max_area = max($max_area, ($right - $left) * min($height[$left], $height[$right]));
      if ($height[$left] < $height[$right]) {//哪边短就移动哪边,我们期待找更高的竖版
        $left++;
      } else {
        $right--;
      }
    }
    return $max_area;
  }
}