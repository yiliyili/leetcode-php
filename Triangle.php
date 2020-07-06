<?php
// 120. 三角形最小路径和
class Solution {

  /**
   * @param Integer[][] $triangle
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

    [
         [2],      [11]
        [3,4],    [9,10]
       [6,5,7], [7, 6, 10]
      [4,1,8,3]
    ]
    自顶向下的最小路径和为 11（即，2 + 3 + 5 + 1 = 11）。

    dp[i][j] //i,j 
状态定义：dp[i][j]表示包含第i行第j列元素的最小路径和
    dp[i][j] = min(dp[i+1][j], dp[i+1][j+1]) + t[i][j]


   */
  // 动态规划
  function minimumTotal($triangle) {
    $dp = [];
    $array = $triangle[count($triangle) - 1];//最后一行数据
    for ($i = 0; $i < count($array); $i++) {//最后一行的每一列
      $dp[count($triangle) - 1][$i] = $array[$i];
    }
    for ($i = count($triangle) - 2; $i >= 0; $i--) {//从下往上
      for ($j = 0; $j < count($triangle[$i]); $j++) {//从左往右
        $dp[$i][$j] = min($dp[$i + 1][$j], $dp[$i + 1][$j + 1]) + $triangle[$i][$j];
      }
    }
    return $dp[0][0];
  }

  // 用一维dp处理
  function minimumTotal2($triangle) {
    $pre = $triangle[count($triangle) - 1];
    for ($i = count($triangle) - 2; $i >= 0; $i--) { 
      $current = [];
      for ($j = 0; $j < count($triangle[$i]); $j++) {
        array_push($current, min($pre[$j], $pre[$j + 1]) + $triangle[$i][$j]);
      }
      $pre = $current;
    }
    return $pre[0];
  }
}

$a = [[2],[3,4],[6,5,7],[4,1,8,3]];
$solu = new Solution();
print_r($solu->minimumTotal2($a));