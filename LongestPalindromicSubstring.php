<?php
class Solution {

  /**
   * @param String $s
   * @return String
   最长回文子串

   b a b  ad


   
   b a b a      b      a b a d
   
   b 
   b a b   长度2 bab

   b a b a b

   b a
     a
   b   b
   

   abba 

   动态规划 dp
   两步骤
   1 状态定义  dp[i][j]  字符串从i 到 j 是否是回文串 如果是 当前长度是  j - i + 1
   2 dp方程    s[i] == s[j] dp[i][j] = dp[i + 1][j - 1]

   b a b a d

   */


  public $res = "";

  public $max = 0;//保存最大长度
  function longestPalindrome($s) {
    if (strlen($s) <= 1) return $s;

    for ($i = 0; $i < strlen($s); $i++) {
      $this->diffusion($s, $i, $i);//扩散,回文串为奇数的情况
      $this->diffusion($s, $i, $i + 1); //回文是偶数
    }
    return $this->res;
  }

  private function diffusion($s, $left, $right) {
    while ($left >= 0 && $right < strlen($s) && $s[$left] == $s[$right]) {
      $tmpLength = $right - $left + 1;
      if ($tmpLength > $this->max) {//超过才算,相等不算
        $this->max = $tmpLength;
        $this->res = substr($s, $left, $tmpLength);
      }
      // 扩大范围
      $left--;
      $right++;
    }
  }

  //动态规划
  function longestPalindrome2($s) {
    if (strlen($s) <= 1) return $s;
    $res = $s[0];
    $max = 0;
    if ($s[0] == $s[1]) {
      $res = substr($s, 0, 2);
    }

    for ($j = 2; $j < strlen($s); $j++) {
      $dp[$j][$j] = true;
      for ($i = 0; $i < $j; $i++) {
        //于子串是否是回文串,可以决定i到j是否是回文串,
        //先判断$j - $i <= 2 表示如果中间只隔了一个数字,那一定是回文串
        $dp[$i][$j] = ($s[$i] == $s[$j]) && ($j - $i <= 2 || $dp[$i + 1][$j - 1]);
        if ($dp[$i][$j] && $max < $j - $i + 1) { //$j - $i + 1是长度
          $max = $j - $i + 1;
          $res = substr($s, $i, $j - $i + 1);
        }
      }
    }
    return $res;
  }
}

$str = 'babad';
$solu = new Solution();
var_dump( $solu->longestPalindrome($str));
var_dump( $solu->longestPalindrome2($str));