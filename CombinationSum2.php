<?php
// 40. 组合总和 II 可能有重复,每个数只用一次,注意去重
class Solution {

  /**
   * @param Integer[] $candidates
   * @param Integer $target
   * @return Integer[][]
    输入: candidates = [10,1,2,7,6,1,5], target = 8,

    new [1,1,2,5,6,7,10]
    所求解集为:
    [
      [1, 7],
      [1, 2, 5],
      [2, 6],
      [1, 1, 6]
    ]
   */
  public $res = [];
  function combinationSum2($candidates, $target) {
    sort($candidates);//“解集不能包含重复的组合”，就提示我们得对数组先排个序（“升序”或者“降序”均可，下面示例中均使用“升序”）。
    $this->dfs([], $candidates, $target, 0);
    return $this->res;
  }

  function dfs($array, $candidates, $target, $start) {
    if ($target < 0) return;
    if ($target == 0) {
      array_push($this->res, $array);
      return;
    }
    for ($i = $start; $i < count($candidates); $i++) {
      if ($i != $start && $candidates[$i] == $candidates[$i - 1]) continue;//加上$i != $start因为1,1,6是允许的,但是不能出现2个116
      array_push($array, $candidates[$i]);
      $this->dfs($array, $candidates, $target - $candidates[$i], $i + 1);//数字不能重复使用,需要+1
      array_pop($array);
    }
  }
}