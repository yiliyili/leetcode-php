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
定义 f(i, j) 为 (i, j)点到底边的最小路径和
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

    //填充
    function minimumTotal3($triangle) {
        // 三角形的层高/二维数组的行数
        $n = count($triangle);
        // 初始化二维数组
        $dp = array_fill(0, $n+1, array_fill(0, $n+1, 0));//填充,多给一层0提供给三角形最后一层去加
        //三角形
        for ($i=$n - 1; $i >= 0; $i--) { 
            for ($j=0; $j <= $i; $j++) {
                // 当前坐标的最小路径和 = 下一层的同坐标和相邻坐标（较小值） + 当前坐标值
                $dp[$i][$j] = min($dp[$i + 1][$j], $dp[$i + 1][$j + 1]) + $triangle[$i][$j];//dp下标为n的是0
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