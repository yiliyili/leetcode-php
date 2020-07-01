<?php
// 77. 组合
class Solution {

  /**
   * @param Integer $n
   * @param Integer $k
   * @return Integer[][]
    输入: n = 4, k = 2
    输出:
    [
      [2,4],
      [3,4],
      [2,3],
      [1,2],
      [1,3],
      [1,4],
    ]
   */
  public $res = [];
  function combine($n, $k) {
    $this->do([], $n, $k, 1);
    return $this->res;
  }
  //回溯
  function do($array, $n, $k, $start) {
    if ($k == 0) {
      array_push($this->res, $array);
      return;
    }
    for ($i = $start; $i <= $n; $i++) {//注意加等于,包括n
      array_push($array, $i);
      $this->do($array, $n, $k - 1, $i + 1);//可以再选$k-1个
      array_pop($array);
    }
  }
}