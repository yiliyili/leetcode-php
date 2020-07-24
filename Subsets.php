<?php
// 78. 子集  推荐解法2
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer[][]
    输入: nums = [1,2,3]
    输出:
    [
      [3],
      [1],
      [2],
      [1,2,3],
      [1,3],
      [2,3],
      [1,2],
      []
    ]
   */
  public $res = [];
  function subsets($nums) {
    if (!$nums) return [];//空数组直接返回
    $this->do([], $nums, 0);
    return $this->res;
  }
  //回溯
  function do($array, $nums, $start) {
    array_push($this->res, $array);
    for ($i = $start; $i < count($nums); $i++) {//执行完毕的条件
      array_push($array, $nums[$i]);
      $this->do($array, $nums, $i + 1);
      array_pop($array);
    }
  }

  //解法2 迭代法
  //初始化结果为 二维空数组
// 遍历给定数组中的每一个元素，在每一次遍历中，处理结果集。结果集中的每个元素添加遍历到的数字，结果集的长度不断增加。
  function subsets2($nums)
  {
      if (is_null($nums)) {
          return [];
      }

      // 1. 迭代法
      $result = [[]];
      if (empty($nums)) {
          return $result;
      }
      foreach ($nums as $num) {
          foreach ($result as $item) {
              $tmp = $item;
              $tmp[] = $num;
              $result[] = $tmp;
          }
      }

      return $result;
  }
}

$solu = new Solution();
var_dump($solu->subsets([1,2,3]));
//  0 => 
//     array (size=0)
//       empty
//   1 => 
//     array (size=1)
//       0 => int 1
//   2 => 
//     array (size=2)
//       0 => int 1
//       1 => int 2
//   3 => 
//     array (size=3)
//       0 => int 1
//       1 => int 2
//       2 => int 3
//   4 => 
//     array (size=2)
//       0 => int 1
//       1 => int 3
//   5 => 
//     array (size=1)
//       0 => int 2
//   6 => 
//     array (size=2)
//       0 => int 2
//       1 => int 3
//   7 => 
//     array (size=1)
//       0 => int 3