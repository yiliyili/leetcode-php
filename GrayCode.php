<?php
// 89. 格雷编码 工程中没有用到
class Solution {
  //如果n=3就是 000
  /**
   * @param Integer $n
   * @return Integer[]
   */
  function grayCode($n) {
    $res = [];
    for ($i = 0; $i < 1 << $n; $i++) {//1 << $n表示2的n次方
      array_push($res, $i ^ $i >> 1);//先右移,再异或
    }
    return $res;
  }
}