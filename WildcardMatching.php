<?php
// 44. 通配符匹配
class Solution {
//     给定一个字符串 (s) 和一个字符模式 (p) ，实现一个支持 '?' 和 '*' 的通配符匹配。
// '?' 可以匹配任何单个字符。
// '*' 可以匹配任意字符串（包括空字符串）
  /**
   * @param String $s
   * @param String $p
   * @return Boolean

    s = "adceb"
    p = "*a*b"

    a  d  c  e  b
    *  a  *  b
    *
。
    star = 0 i_index = 0 j++
    star = 2 i_index = 1 j++
    j:b

   */
  function isMatch($s, $p) {
    $i = 0;
    $j = 0;
    $star = -1;//有*的时候*在哪个位置
    $i_index = 0;//i所处的位置

    while ($i < strlen($s)) {
      if ($j < strlen($p) && ($s[$i] == $p[$j] || $p[$j] == "?")) {
        $i++;
        $j++;
      } else if ($j < strlen($p) && $p[$j] == "*") {//两个字符不等,p中是*
//比如一开始是*,认为*匹配空字符串,i不动,管看后边的元素j++后是否还和i相等
        $star = $j;
        $i_index = $i;
        $j++;
      } else if ($star != -1) {//两个字符不等p也不是*和?,看是否存在*
        $j = $star + 1;
        $i_index++;//因为*至少会匹配一个字符
        $i = $i_index;
      } else {
        return false;
      }
    }
    while ($j < strlen($p) && $p[$j] == "*") {//处理末尾的*
      $j++;
    } 
    return $j == strlen($p);//比如*  a  *  b****c这种就不匹配
  }

  /**
   * 定义状态：dp[i][j]  //s 的前i个字符 和 p 前j个字符匹配关系,是否匹配,不包括i和j
   转移方程 (s[i - 1] == p[j - 1] || p[j] == ?) 那么dp[i][j] = dp[i - 1][j - 1]
   p[j - 1] == * 那么 dp[i][j] = dp[i - 1][j] || dp[i][j - 1] || dp[i - 1][j - 1] 因为
   *最强大,可以匹配任意字符,上述三个条件满足一个即可
     dp[i][j - 1] 表示 * 代表的是空字符，例如 ab, ab*
     dp[i - 1][j] 表示 * 代表的是非空字符，例如 abcd, ab*


   */
  function isMatch2($s, $p) {
    $dp = [];
    $dp[0][0] = true;
    // dp初始化
    for ($j = 1; $j <= strlen($p); $j++) {//因为是前x个,所以要加等号
      if ($p[$j - 1] == "*") {
        $dp[0][$j] = $dp[0][$j - 1];//abc 与 ***
      } else {
        $dp[0][$j] = false;
      }
    }
    //肯定不匹配的情况
    for ($i = 1; $i <= strlen($s); $i++) {
        $dp[$i][0] = false;
    }
    //从左到右,从上到下
    for ($i = 1; $i <= strlen($s); $i++) {
      for ($j = 1; $j <= strlen($p); $j++) {
        // echo $i ,$j;
        if ($s[$i - 1] == $p[$j - 1] || $p[$j - 1] == "?") {
          $dp[$i][$j] = $dp[$i - 1][$j - 1];
        } else if ($p[$j - 1] == "*") {
          $dp[$i][$j] = $dp[$i - 1][$j] || $dp[$i][$j - 1] || $dp[$i - 1][$j - 1];
        } else {
          $dp[$i][$j] = false;
        }
      }
    }
    // var_dump($dp);
    // var_dump(strlen($p));
    return $dp[strlen($s)][strlen($p)];
  }

}
