<?php
// 66. 加一
class Solution {

  /**
   * @param Integer[] $digits
   * @return Integer[]
    输入: [1,2,3]
    输出: [1,2,4]
    解释: 输入数组表示数字 123。

    输入: [9,9,9]
    输出: [1,0,0,0]
   */
  function plusOne($digits) {
    for ($i = count($digits) - 1; $i >= 0; $i--) {
      $digits[$i] += 1;
      if ($digits[$i] < 10) {//不进位
        return $digits;
      }
      $digits[$i] = 0;
    }
    array_unshift($digits, 1);//说明上边的return从未进去过,999
    return $digits;
  }
}