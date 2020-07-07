<?php
// 1071. 字符串的最大公因子
class Solution {

  /**
   * @param String $str1
   * @param String $str2
   * @return String
   * @github https://github.com/yumindayu/leetcode-php

   输入：str1 = "ABCABC", str2 = "ABC"
   输出："ABC"

   输入：str1 = "ABABAB", str2 = "ABAB"
   输出："AB"

   */
  function gcdOfStrings($str1, $str2) {
    if (empty($str1) || empty($str2)) return '';
    if ($str1 . $str2 != $str2 . $str1) return "";//相连相等才会有公因子
    return substr($str1, 0, $this->gcd(strlen($str1), strlen($str2)));
  }
  //欧几里得算法
  function gcd($s1, $s2) {
    if ($s1 < $s2) {
      $this->gcd($s2, $s1);//换一下
    }
    return $s2 == 0 ? $s1 : $this->gcd($s2, $s1 % $s2);
  }
}