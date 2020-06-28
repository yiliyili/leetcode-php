<?php
// 38. 外观数列
class Solution {

  /**
   * @param Integer $n
   * @return String
    1.     1
    2.     11
    3.     21
    4.     1211
    5.     111221
   */
  function countAndSay($n) {
    $res = "1";
    for ($i = 2; $i <= $n; $i++) {
      $repeat_count = 1;//记录重复次数
      $str = "";
      for ($j = 0; $j < strlen($res); $j++) {
        // 是否存在下一个,且下一个和当前是否重复
        if (isset($res[$j + 1]) && $res[$j] == $res[$j + 1]) {
          $repeat_count++;
        } else {
          $str .= $repeat_count . $res[$j];//首次循环是是1个1
          $repeat_count = 1;//重置重复次数
        }
      }
      $res = $str;
    }
    return $res;
  }
}