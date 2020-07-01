<?php
// 67. 二进制求和
class Solution {

  /**
   * @param String $a
   * @param String $b
   * @return String
   输入: a = "11", b = "1"
   输出: "100"
   */
  function addBinary($a, $b) {
    $res = "";
    $m = strlen($a) - 1;
    $n = strlen($b) - 1;//m和n极可能不相等
    $carry = 0;
    while ($m >= 0 || $n >= 0) {//
      $x = $m >= 0 ? $a[$m] : 0;//从个位开始相加,长度不够,高位就是0
      $y = $n >= 0 ? $b[$n] : 0;
      $res = ($x + $y + $carry) % 2 . $res;
      $carry = ($x + $y + $carry) >= 2 ? 1 : 0;
      $m--;
      $n--;
    }
    if ($carry > 0) $res = $carry . $res;//处理进位
    return $res;
  }
}