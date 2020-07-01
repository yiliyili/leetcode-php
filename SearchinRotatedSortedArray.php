<?php
// 33. 搜索旋转排序数组
class Solution {

  /**
   * @param Integer[] $nums
   * @param Integer $target
   * @return Integer

   假设按照升序排序的数组在预先未知的某个点上进行了旋转。

( 例如，数组 [0,1,2,4,5,6,7] 可能变为 [4,5,6,7,0,1,2] )。

搜索一个给定的目标值，如果数组中存在这个目标值，则返回它的索引，否则返回 -1 。

你可以假设数组中不存在重复的元素。

你的算法时间复杂度必须是 O(log n) 级别。

    输入: nums = [4,5,6,7,0,1,2], target = 0
    输出: 4
   */
  function search($nums, $target) {
    if (!$nums) return -1;
    $low = 0;
    $high = count($nums) - 1;
    while ($low <= $high) {
      $mid = floor(($high - $low) / 2) + $low;
      if ($target == $nums[$mid]) return $mid;//先把和mid是否相等进行判定了
      if ($nums[$low] <= $nums[$mid]) {//是正常的升序排列
        if ($nums[$low] <= $target && $target < $nums[$mid]) {//target还在这个区间内
          $high = $mid - 1;
        } else {
          $low = $mid + 1;
        }
      } else {
        if ($nums[$mid] < $target && $target <= $nums[$high]) {
          $low = $mid + 1;
        } else {
          $high = $mid - 1;
        }
      }
    }
    return -1;
  }
}
