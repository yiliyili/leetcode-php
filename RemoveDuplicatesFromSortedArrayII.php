<?php
// 80. 删除排序数组中的重复项 II
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer
在原地删除重复出现的元素，使得每个元素最多出现两次，返回移除后数组的新长度。
    给定 nums = [1,1,1,2,2,3],

    函数应返回新长度 length = 5, 并且原数组的前五个元素被修改为 1, 1, 2, 2, 3 。

    你不需要考虑数组中超出新长度后面的元素。
   */
  // 双指针走法  循环不变量
  function removeDuplicates(&$nums) {
    if (!$nums || count($nums) <= 2) return count($nums);
    $count = 2;
    for ($i = 2; $i < count($nums); $i++) {
      if ($nums[$i] != $nums[$count - 2]) {
        // echo 'a';
        $nums[$count++] = $nums[$i];//count指向可以写入的位置
      }
    }
    return $count;
  }
}
$arr = [1,1,2,2,3,3];
$solu = new Solution();
var_dump($solu->removeDuplicates($arr));