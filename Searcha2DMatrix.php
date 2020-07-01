<?php
// 74. 搜索二维矩阵
class Solution {

  /**
   * @param Integer[][] $matrix
   * @param Integer $target
   * @return Boolean
    输入:
    matrix = [
      [1,   3,  5,  7],
      [10, 11, 16, 20],
      [23, 30, 34, 50]
    ]
    target = 3
    输出: true
   */
  //左程云有更好解法 https://leetcode-cn.com/problems/search-a-2d-matrix/solution/phpsou-suo-er-wei-ju-zhen-by-ruan-shao-xiang/
  function searchMatrix($matrix, $target) {
    if (count($matrix) == 0) return false;
    $m = count($matrix);
    $n = count($matrix[0]);
    $low = 0;
    $high = $m * $n - 1;
    while ($low <= $high) {
      $mid = $low + floor(($high - $low) / 2);
      if ($matrix[floor($mid / $n)][$mid % $n] == $target) {
        return true;
      } else if ($matrix[floor($mid / $n)][$mid % $n] < $target) {
        $low = $mid + 1;
      } else {
        $high = $mid - 1;
      }
    }
    return false;
  }
}