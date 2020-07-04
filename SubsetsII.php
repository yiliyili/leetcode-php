<?php
// 90. 子集 II
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer[][]

    输入: [1,2,2]
    输出:
    [
      [2],
      [1],
      [1,2,2],
      [2,2],
      [1,2],
      []
    ]
   */
  public $res = [];
  function subsetsWithDup($nums) {
    sort($nums);//去重,排序少不了
    $this->do([], $nums, 0);
    return $this->res;
  }

  function do($array, $nums, $start) {
    array_push($this->res, $array);
    for ($i = $start; $i < count($nums); $i++) {
      // var_dump($this->res);
      if ($i != $start && $nums[$i] == $nums[$i - 1]) {//和40,47题一样的去重方式,深刻理解$i != $start 他并不会阻止第一次循环,而是从第二次循环开始检验
//[1]中推第一个2,递归中去推第二个2,当前循环pop出第一个2,再添加第二个2就continue,因为已经有一个[1,2]在res中了
        // echo $i;
        continue;
      }
      array_push($array, $nums[$i]);
      $this->do($array, $nums, $i + 1);
      array_pop($array);
    }
  }
}

$arr =[1,2,2];
$solu = new Solution();
var_dump($solu->subsetsWithDup($arr));