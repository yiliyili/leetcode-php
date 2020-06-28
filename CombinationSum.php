<?php
// 39. 组合总和
class Solution {

  /**
   * @param Integer[] $candidates
   * @param Integer $target
   * @return Integer[][]

    输入: candidates = [2,3,6,7], target = 7,
    所求解集为:
    [
      [7],
      [2,2,3]
    ]
  
   */
//思想是数组不排序,首先一直用第一个元素累加逼近target,不满足时回退,加下一个数,再和target比较
//这里临时结果用形参array,最终结果用属性res存
  public $res = [];
  function combinationSum($candidates, $target) {
    $this->dfs([], $candidates, $target, 0);
    return $this->res;
  }

  function dfs($array, $candidates, $target, $start) {
    //先写递归中止条件
    if ($target < 0) return;//比如4个2时与7相减是-1
    if ($target == 0) {
      array_push($this->res, $array);
      return;
    }
    for ($i = $start; $i < count($candidates); $i++) {
      array_push($array, $candidates[$i]);
      $this->dfs($array, $candidates, $target - $candidates[$i], $i);//每个数无限重复,所以下一个还可以从$i开始
      array_pop($array);
    }
  }
}