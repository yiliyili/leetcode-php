<?php
// 1013. 将数组分成和相等的三个部分
class Solution {

  /**
   * @param Integer[] $A
   * @return Boolean
   * @github https://github.com/yumindayu/leetcode-php


   输出：[0,2,1,-6,6,-7,9,1,2,0,1]
   输出：true
    元素必须是连续部分
   解释：0 + 2 + 1 = -6 + 6 - 7 + 9 + 1 = 2 + 0 + 1

   [10, -10, 10,-10, 10, -10, 10, -10]  sum为0的情况

   sum = 0
   平均数 0

   1 ＋ 1 ＋ 1 ＋ 1

   */
  function canThreePartsEqualSum($A) {
    $sum = array_sum($A);
    if ($sum % 3 != 0) return false;

    $sum /= 3;
    $current_sum = 0;
    $count = 0;
    for ($i = 0; $i < count($A); $i++) {
      $current_sum += $A[$i];
      if ($current_sum == $sum) {
        $count++;//可能超过3
        $current_sum = 0;
      }
    }
    // return $sum == 0 ? $count >= 3 : $count == 3;
    return $count >= 3;
  }
}