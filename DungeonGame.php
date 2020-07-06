<?php
// 174. 地下城游戏
class Solution {

  /**
   * @param Integer[][] $dungeon
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

   --------------
   -2  | -3  | 3 |
   ----|-----|---|
   -5  | -10 | 1 |
   ----|-----|---|
   10  | 30  |-5 | (P) 6
   ----|-----|---|

   dp[i,j] //到i,j这个坐标之前需要的最低点数   1 
   dp[i,j] 表示从 (i, j) 这个格子走到右下角所需要的最小生命值


   */
  function calculateMinimumHP($dungeon) {
    $m = count($dungeon) - 1;//先-1
    $n = count($dungeon[0] - 1);

    $dp[$m][$n] = max(1, 1 - $dungeon[$m][$n]); //至少要有一点血量
    //走最后1列的情况,只有唯一一种走法 先右后下
    for ($i = $m - 1; $i >= 0; $i--) {
      $dp[$i][$n] = max(1, $dp[$i + 1][$n] - $dungeon[$i][$n]);
    }
    //走最后一行的情况
    for ($i = $n - 1; $i >= 0; $i--) {
      $dp[$m][$i] = max(1, $dp[$m][$i + 1] - $dungeon[$m][$i]);
    }
    //从右下到左上
    for ($i = $m - 1; $i >= 0; $i--) {
      for ($j = $n - 1; $j >= 0; $j--) {
        //选最小的值作为要走的路,最少必须是1
        $dp[$i][$j] = max(1, min($dp[$i + 1][$j], $dp[$i][$j + 1]) - $dungeon[$i][$j]);
      }
    }
    return $dp[0][0];
  }
}