<?php
   // 3无重复字符的最长子串
class Solution {

  /**
   * @param String $s
   * @return Integer

  

   a b c a b c b b
  
   [a => 0, b => 1, c => 2] 3 
   a 
   b
   c
   a
   b
   输入: "abcabcbb"
   输出: 3 
   解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。

   输入: "bbbbb"
   输出: 1
   解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。

   输入: "pwwkew"
   输出: 3
   解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3。
   请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。

   */

//滑动窗口
  function lengthOfLongestSubstring($s) {
    if (!$s || strlen($s) == 0) return 0;

    $array = [];
    $ret = 0;
    $start = 0;
    for ($i = 0; $i < strlen($s); $i++) {
//是否有已经遍历到的字符串 $start <= $array[$s[$i]]加这个的目的是不能让指针右移之后又左移,
//避免'tmmzuxt'这样的case算错
      if (isset($array[$s[$i]]) && $start <= $array[$s[$i]]) {
        $start = $array[$s[$i]] + 1;//修改起始位置,一次指针滑动可不小于一位,这样从start开始暂时不会有重复字符,如acc
      } else { //只要无重复,或者$start>已经出现过该字符的位置,则比较当前最长长度
        $ret = max($ret, $i - $start + 1);
      }
      $array[$s[$i]] = $i;//某个字符出现的位置
    }
    return $ret;
  }
}

$solu = new Solution();
$str = "tmmzuxt"; //注意这个测试用例的t在最开始出现
var_dump( $solu->lengthOfLongestSubstring($str));