<?php
// 115. 不同的子序列
class Solution {

  /**
   * @param String $s
   * @param String $t
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php


    Input: S = "rabbbit", T = "rabbit"
    Output: 3

    rabb(b)it
    rab(b)bit
    ra(b)bbit

    dp[i][j] 字符串s的前i个字符 到字符串t的前j个字符的数量 
    s一般会长于t,当前的s不一定选择,比如前i-1个也满足字符串t的前j个字符
    s[i] == t[j]  dp[i][j] = dp[i-1][j-1] + dp[i - 1][j]
    s[i] != t[j]  dp[i][j] = dp[i - 1][j]

 s   r a b b b i t
 t   r a b b i t
   */
  function numDistinct($s, $t) {
    $dp = [];
    for ($i = 0; $i <= strlen($s); $i++) {
      $dp[$i][0] = 1;//$t是空字符串的情况,空字符串也是s的子串
    }
    for ($i = 1; $i <= strlen($t); $i++) {//从1开始,因为两个都为空串,那么$dp[0][0]=1
      $dp[0][$i] = 0;//s为空
    }
    for ($i = 1; $i <= strlen($s); $i++) {//要有等于
      for ($j = 1; $j <= strlen($t); $j++) {
//判断前i个 比如前3个,判断第三个是否是否相等就是$s[3-1],否则会超过索引下标
        if ($s[$i-1] == $t[$j-1]) {
          $dp[$i][$j] = $dp[$i - 1][$j - 1] + $dp[$i - 1][$j];
        } else {
          $dp[$i][$j] = $dp[$i - 1][$j];
        }
      }
    }
    return $dp[strlen($s)][strlen($t)];
  }
}

$s = 'rabbbit';
$t = 'rabbit';
$solu = new Solution();
echo $solu->numDistinct($s, $t);