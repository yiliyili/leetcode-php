<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer[][]

   nums = [-1, 0, 1, 2, -1, -4]，
   [
    [-1, 0, 1],
    [-1, -1, 2]
   ]

   [-4, -1, -1, 0, 1, 2]

   */
  function threeSum($nums) {
    if (!$nums) return [];
    sort($nums);//排序
    $ret = [];
    for ($i = 0; $i < count($nums) - 2; $i++) {//-2是因为左指针只需要指到倒数第二个数,给右指针留一个
      if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue;//固定元素若有相同,去重
      $left = $i + 1;
      $right = count($nums) - 1;

      $need = 0 - $nums[$i];

      while ($left < $right) {
        if ($nums[$left] + $nums[$right] == $need) {
          array_push($ret, [$nums[$i], $nums[$left], $nums[$right]]);
          while ($left < $right && $nums[$left] == $nums[$left + 1]) $left++;//指针移动时如有相同元素,去重
          while ($left < $right && $nums[$right] == $nums[$right - 1]) $right--;
          $left++;
          $right--;
        } else if ($nums[$left] + $nums[$right] > $need) {
          $right--;
        } else {
          $left++;
        }
      }
    }
    return $ret;
  }
}