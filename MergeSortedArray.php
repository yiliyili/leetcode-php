<?php
// 88. 合并两个有序数组
class Solution {

  /**
   * @param Integer[] $nums1
   * @param Integer $m
   * @param Integer[] $nums2
   * @param Integer $n
   * @return NULL

   nums1 = [1,2,3,0,0,0], m = 3//初始化的元素个数
   nums2 = [2,5,6],       n = 3
   */
  //归并
  function merge(&$nums1, $m, $nums2, $n) {
    $count = $m + $n - 1;
    $i = $m - 1;
    $j = $n - 1;
    //从最后一位开始比较,谁大,谁就放到后边
    while ($i >= 0 && $j >= 0) {
      if ($nums1[$i] > $nums2[$j]) {
        $nums1[$count--] = $nums1[$i--];
      } else {
        $nums1[$count--] = $nums2[$j--];
      }
    }
    while ($j >= 0) {//说明$i已经小于0 num1中大的数移到右边了,把num2剩下的填进去
      $nums1[$count--] = $nums2[$j--];
    }
  }
}