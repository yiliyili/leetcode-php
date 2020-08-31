<?php
// 14最长公共前缀
class Solution {
  /**
   * @param String[] $strs
   * @return
   输入: ["flower","flow","flight"]
   输出: "fl"

   输入: ["dog","racecar","car"]
   输出: ""
   */
  // 二分
  function longestCommonPrefix($strs) {
    if (!$strs) return "";
    if (count($strs) == 1) return $strs[0];
    //找最短单词
    $min = strlen($strs[0]);
    $key = 0;
    foreach ($strs as $k => $str) {
      if (strlen($str) <= $min) {
        $key = $k;
        $min = strlen($str);
      }
    }
    $min_str = $strs[$key];
    unset($strs[$key]);//不参与比较前缀

    $left = 1;//确保截取的长度至少是1位
    $right = strlen($min_str);
    while ($left <= $right) {
      $mid = floor(($right - $left) / 2) + $left;
      if ($this->_isPrefix($strs, substr($min_str, 0, $mid))) {
        $left = $mid + 1;
      } else {
        $right = $mid - 1;
      }
    }
    return substr($min_str, 0, min($left, $right));//截取不能超出两端 //跳出循环时left多加了1或者$right多减了1,因为left是1,最多min得到0,即不截取
  }
  //是不是其他单词的前缀
  private function _isPrefix($strs, $prefix) {
    foreach ($strs as $s) {
      if (substr($s, 0, strlen($prefix)) != $prefix) {
        return false;
      }
    }
    return true;
  }
}