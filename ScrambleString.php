<?php
// 87. 扰乱字符串
class Solution {

  /**
   * @param String $s1
   * @param String $s2
   * @return Boolean
   *
   * @github https://github.com/yumindayu/leetcode-php

   great    g   reat    g reat
  
   reatg    r   eatg    reat g
   */
  function isScramble($s1, $s2) {
    if (strlen($s1) != strlen($s2)) return false;//长度判断
    if ($s1 == $s2) return true;//因为交换2次又可以得到原字符串

    $str1 = $s1;
    $str2 = $s2;

    //字符种类和个数要一致,否则也是不行
    $string1 = str_split($str1);
    sort($string1);
    $str1 = implode('', $string1); 

    $string2 = str_split($str2);
    sort($string2);
    $str2 = implode('', $string2);

    if ($str1 != $str2) return false;//不是每个字母都一样

    for ($i = 1; $i < strlen($s1); $i++) {
        //首字符与首字符对比
      if ($this->isScramble(substr($s1, 0, $i), substr($s2, 0, $i)) && $this->isScramble(substr($s1, $i), substr($s2, $i))) return true;
//首字符与末尾字符相比  比如great变成reatg,是g与reat的翻转,这种也是扰乱字符串,s1的首字符和s2的最后一个字符作比较
      if ($this->isScramble(substr($s1, 0, $i), substr($s2, strlen($s2) - $i)) && $this->isScramble(substr($s1, $i), substr($s2, 0, strlen($s2) - $i))) return true;

    }
    return false;
  }
}