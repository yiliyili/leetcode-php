<?php
// 43. 字符串相乘
class Solution {
  /**
   * @param String $num1
   * @param String $num2
   * @return String

        1 2 3
    *     4 5
    ---------
          1 5
        1 0
      0 5
    ---------
      0 6 1 5
        1 2
      0 8
    0 4
    ---------
    0 5 5 3 5
   */
  function multiply($num1, $num2) {
    if ($num1 == "0" || $num2 == "0") return "0";

    $m = strlen($num1);
    $n = strlen($num2);
    $array = [];
    for ($i = $m - 1; $i >= 0; $i--) {
      for ($j = $n - 1; $j >= 0; $j--) {
        $array[$i + $j + 1] += $num1[$i] * $num2[$j];//处理进位前的数,i和j位数相乘,最多得到i+j位数
      }
    }
    $res = "";
    //进位处理
    for ($i = $m + $n - 1; $i >= 0; $i--) {//因为上边的ij是m和n-1得到的
      if ($array[$i] > 9) {
        $array[$i - 1] += floor($array[$i] / 10);
        $array[$i] %= 10;
      }
      $res = (string)$array[$i] . $res;
    }
    return $res;
  }
}