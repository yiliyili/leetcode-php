<?php
// 68. 文本左右对齐
class Solution {
// 你应该使用“贪心算法”来放置给定的单词；也就是说，尽可能多地往每行中放置单词。必要时可用空格 ' ' 填充，使得每行恰好有 maxWidth 个字符。
// 要求尽可能均匀分配单词间的空格数量。如果某一行单词间的空格不能均匀分配，则左侧放置的空格数要多于右侧的空格数。

// 文本的最后一行应为左对齐，且单词之间不插入额外的空格。
// 每个单词的长度大于 0，小于等于 maxWidth。

  /**
   * @param String[] $words
   * @param Integer $maxWidth
   * @return String[]
    输入:
    words = ["This", "is", "an", "example", "of", "text", "justification."]
    maxWidth = 16
    输出:
    [
       "This    is    an",
       "example  of text", 侧放置的空格数要多于右侧的空格数
       "justification.  " 文本的最后一行应为左对齐，且单词之间不插入额外的空格,即空格放在最后一个单词末尾
    ]
   */
  function fullJustify($words, $maxWidth) {
    $start = 0;
    $ret = [];
    while ($start < count($words)) {
      $len = strlen($words[$start]);
      $next = $start + 1;//下一个单词的下标
      //$next - $start 可以计算一行要放多少个单词
      while ($next < count($words)) {
        if (strlen($words[$next]) + $len + 1 > $maxWidth) break;//加1是加空格,超过的话,next这个单词不能选
        $len += strlen($words[$next]) + 1;//计算新的拼接长度
        $next++;
      }
      $str = "";
      $str .= $words[$start];
      $space = $next - $start - 1; //空格的位置的个数,比如3个单词有两个位置要放多的空格
      if ($next == count($words) || $space == 0) { //已经是最后一行或者只有一个单词
        for ($i = $start + 1; $i < $next; $i++) {//因为第$start这个单词已经放在$str中了
          $str .= " ";
          $str .= $words[$i];
        }
        for ($i = strlen($str); $i < $maxWidth; $i++) {//末尾填充空格
          $str .= " ";
        }
      } else {//不是最后一行
        $space_num = floor(($maxWidth - $len) / $space); //每个单词之间空格的平均数
        $carry = ($maxWidth - $len) % $space;//地板除法漏了多少个
        for ($i = $start + 1; $i < $next; $i++) {
          $str .= " ";
          for ($k = $space_num; $k > 0; $k--) {
            $str .= " ";
          }
          if ($carry > 0) {
            $str .= " ";
            $carry--;
          }
          $str .= $words[$i];
        }
      }
      $start = $next;
      array_push($ret, $str);
    }
    return $ret;
  }
}