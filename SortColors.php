<?php
// 75. 颜色分类
class Solution {

  /**
   * @param Integer[] $nums
   * @return NULL

    输入: 
    输出: [0,0,1,1,2,2]
   */
  function sortColors(&$nums) {
    $left = 0;  //第一个0出现的位置
    $right = count($nums) - 1; //最后一个2出现的位置
    for ($i = 0; $i <= $right; $i++) {
      if ($nums[$i] == 0) {
        $this->swap($nums, $i, $left);//交换到嘴边
        $left++;
      } else if ($nums[$i] == 2) {
        $this->swap($nums, $i, $right);//调换到右边
        $right--;
        $i--;//对左边换来的元素再进行检查
      }
    }
  }

  private function swap(&$nums, $i, $j) {
    $tmp = $nums[$j];
    $nums[$j] = $nums[$i];
    $nums[$i] = $tmp;
  }
}