<?php
// 62. 不同路径
class Solution {

  /**
   * @param Integer $m
   * @param Integer $n
   * @return Integer
  
   状态：定义dp[i][j]表示到达[i, j]位置的路径总和。
状态转移方程：dp[i][j] = dp[i - 1][j] + dp[i][j - 1];
初始化(第一行和第一列只有一条路可走)：dp[i][0] = 1; dp[0][j] = 1;
   */
  //动态规划启蒙题目
  function uniquePaths($m, $n) {
      $dp = [];
      //第0行和第0列都是只有一种走法,即一直往右或者一直往下
      for ($i = 0; $i < $m; $i++) $dp[$i][0] = 1;
      for ($j = 0; $j < $n; $j++) $dp[0][$j] = 1; 
      //从左往右,从上往下遍历
      for ($i = 1; $i < $m; $i++) {
          for ($j = 1; $j < $n; $j++) {
              $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - 1];
          }
      }

      return $dp[$m - 1][$n - 1];
  }

}