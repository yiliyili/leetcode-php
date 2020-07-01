<?php
// 69. x 的平方根,取整即可,不适合工程使用
class Solution {

  /**
   * @param Integer $x
   * @return Integer
   */
  //二分
  function mySqrt($x) {
    if ($x == 0 || $x == 1) return $x;
    $low = 1;
    $high = $x;
    $res = 0;
    while ($low <= $high) {
      $mid = $low + floor(($high - $low) / 2);
      if ($mid == floor($x / $mid)) {  // if mid * mid == x 防止溢出
        return $mid;
      } else if ($mid > floor($x / $mid)) {
        $high = $mid - 1;
      } else {
        $low = $mid + 1;
        $res = $mid;
      }
    }
    return $res;
  }
}