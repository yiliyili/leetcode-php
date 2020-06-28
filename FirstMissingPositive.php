<?php
// 41. 缺失的第一个正数
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     

     输入: [3,4,-1,1]
     输出: 2

     输入: [7,8,9,11,12]
     输出: 1

     */
    // 规律: i的下标存i+1,第一个不在正确位置上的就返回正确正数
    function firstMissingPositive($nums) {
      if (!$nums) return 1;

      for ($i = 0; $i < count($nums); $i++) {
        // 为正数找位置
        while ($nums[$i] > 0 && $nums[$nums[$i] - 1] != $nums[$i]) {//把数字交换到它应该在的位置上,比如3应该在下标为2的地方
            $tmp = $nums[$nums[$i] - 1];
            $nums[$nums[$i] - 1] = $nums[$i];
            $nums[$i] = $tmp;
        }
      }
      for ($i = 0; $i < count($nums); $i++) {
        if ($nums[$i] != $i + 1) {
            return $i + 1;
        }
      }
      return count($nums) + 1;//数组本身就是1,2,3这种,缺失下一个
    }
}