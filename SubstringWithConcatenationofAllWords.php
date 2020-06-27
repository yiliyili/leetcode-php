<?php
// 30. 串联所有单词的子串
class Solution {

  /**
   * @param String $s
   * @param String[] $words
   * @return Integer[]

   s = "barfoothefoobarman",
   words = ["foo","bar"]

   */
  function findSubstring($s, $words) {
    $map = [];
    $ret = [];
    if (!$s || !$words) return $ret;
    $words_count = count($words);//多少单词
    $words_length = strlen($words[0]);//每个单词长度
    //统计每个单词出现次数
    foreach ($words as $word) {
      if (isset($map[$word])) {
        $map[$word] += 1;
      } else {
        $map[$word] = 1;
      }
    }
    //  s = "barfoothefoobarman" 
    // map : [bar => 0, foo => 1]
    for ($i = 0; $i <= strlen($s) - $words_count * $words_length; $i++) {//不用到末尾
      //每次循环定义临时map
      $map_as_valid = $map;
      $num = 0;
      $j = $i;
      while ($num < $words_count) {
        $str = substr($s, $j, $words_length);//截取
        if (!isset($map_as_valid[$str]) || $map_as_valid[$str] < 1) {
          // unset($map_as_valid); //删除不是必须的,因为上边本身变量会覆盖
          break;
        }
        $map_as_valid[$str] -= 1;
        $num++;//用了多少个单词
        $j = $j + $words_length;//跨一个单词长度
      }
      if ($num == $words_count) {
        array_push($ret, $i);
      }
    }
    return $ret;
  }
}