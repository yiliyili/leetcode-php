<?php
// 64. 最小路径和
class Solution {

  /**
   * @param Integer[][] $grid
   * @return Integer
    输入:
    [
      [1,3,1],
      [1,5,1],
      [4,2,1]
    ]
    输出: 7
    解释: 因为路径 1→3→1→1→1 的总和最小。
    
    状态：定义dp[i][j]表示到达[i, j]最小路径和。
状态转移方程：dp[i][j] = min(dp[i - 1][j], dp[i][j - 1]) + grid[grid[i][$j];
初始化(第一行和第一列只有一条路可走)：dp[i][0] = dp[i - 1][0] + grid[i][0]; dp[0][j] = dp[0][grid[i][0];dp[0][j]=dp[0][j - 1] + grid[0][grid[0][j - 1];

   */
function minPathSum($grid) {
        $m = count($grid);
        $n = count($grid[0]);
        if ($m <= 0 || $n <= 0) return 0;

        $dp = [];
        $dp[0][0] = $grid[0][0];

        for ($i = 1; $i < $m; $i++) {//处理首列
            $dp[$i][0] = $dp[$i - 1][0] + $grid[$i][0];
        }

        for ($j = 0; $j < $n; $j++) {//处理首行
            $dp[0][$j] = $dp[0][$j - 1] + $grid[0][$j];
        }

        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                $dp[$i][$j] = min($dp[$i - 1][$j], $dp[$i][$j - 1]) + $grid[$i][$j];
            }
        }

        return $dp[$m - 1][$n - 1];
    }
}