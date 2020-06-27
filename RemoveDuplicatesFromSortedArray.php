<?php
// 26. 删除排序数组中的重复项
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer

   删除排序数组中的重复项

   不要使用额外的数组空间，你必须在原地修改输入数组并在使用 O(1) 额外空间的条件下完成。
  函数应该返回新的长度 2, 并且原数组 nums 的前两个元素被修改为 1, 2。 
   nums = [1,1,2], 
   */
  function removeDuplicates(&$nums) {
    if (!$nums) return 0;
//  双指针
    $i = 0;
    for ($j = 1; $j < count($nums); $j++) {//从1开始
      if ($nums[$j] != $nums[$i]) {
        $i++;
        $nums[$i] = $nums[$j];//只要找到了不同值,就把不同值放到前边,最终前边都是不同的值
      }
    }
    return $i + 1;
  }
}