<?php
// 47. 全排列 II  有重复
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer[][]
   给定一个可包含重复数字的序列，返回所有不重复的全排列。
    输入: [1,1,2]
    输出:
    [
      [1,1,2],
      [1,2,1],
      [2,1,1]
    ]
   */
  public $res = [];
  public $visited = [];//某个下标对应的元素是否被用于

  function permuteUnique($nums) {
    sort($nums);//排序
    $this->do([], $nums);
    return $this->res;
  }

  function do($array, $nums) {
    if (count($array) == count($nums)) {
      array_push($this->res, $array);
      return;
    }
    for ($i = 0; $i < count($nums); $i++) {
      if (isset($this->visited[$i]) && $this->visited[$i] == 1) continue;//这个数是否用过
      if ($i > 0 && $nums[$i] == $nums[$i - 1] && $this->visited[$i - 1] == 0) continue;//题解中画递归树,模拟深度优先代码的执行过程,会发现选第二个1时,第一个1刚好被撤销,所以第一个1被选进来造成重复,需要进行剪枝
      $this->visited[$i] = 1;
      array_push($array, $nums[$i]);
      $this->do($array, $nums);
      array_pop($array);
      $this->visited[$i] = 0;//改为未访问过,对称
    }
  }
}