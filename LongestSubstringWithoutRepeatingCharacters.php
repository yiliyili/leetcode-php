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

//可以考虑从一个空字符串每次增加一个字符直到s结束,
// 当前字符为s[i],
// left = max(left, last[s[i]]);获得的区间(left, i]是以s[i]结尾无重复字符的最长字串,
// 因为s[left]与s[i]是同一个字符,
// 减小left会有重复字符,
// 从0遍历到s.size()就取到了每个字符结尾的最长无重复字符字串,
// ans记录其中的最大值,
      function lengthOfLongestSubstring2($s) {
        $last = array();
        $left = -1;
        $ans = 0;
        // for ($i = 0; $i < 128; $i++) {//初始化
        //     $last[$i] = -1;
        // }
        $last = array_fill(0,128,-1); 
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            $asciiNumber = ord($s[$i]);//需要换为数字
            $left = max($left, $last[$asciiNumber]);//left的值取最大值,也就是该字符最近一次被遍历到的最大下标,这样$i - $left得到的才是正确的
            // var_dump($left);
            $last[$asciiNumber] = $i;//更新出现该字符的更大的位置
            $ans = max($ans, $i - $left);//更新最大值
        }
        // var_dump($last);
        return $ans;
    }


//滑动窗口  不太好记
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
var_dump( $solu->lengthOfLongestSubstring2($str));