<?php
// 63. 不同路径 II
class Solution {

  /**
   * @param Integer[][] $obstacleGrid
   * @return Integer
   */
    function uniquePathsWithObstacles($obstacleGrid) {
        $m = count($obstacleGrid);//行
        $n = count($obstacleGrid[0]);//列
        if ($obstacleGrid[0][0] == 1 || $obstacleGrid[$m - 1][$n - 1] == 1) return 0;//第一个或者最后一个是障碍物

        $dp = [];

        $dp[0][0] = 1;//始化第一个为1（因为所走过的0都变为1）
        for ($i = 1; $i < $m; $i++) {//先处理第0列的每一行
            if ($obstacleGrid[$i][0] == 1 || $dp[$i - 1][0] == 0) {//障碍物或者前一个为0
                $dp[$i][0] = 0;//没有走法
            } else {
                $dp[$i][0] = 1;//有唯一一种走法
            }
        }
        for ($j = 1; $j < $n; $j++) {//再处理第0行的每一列
            if ($obstacleGrid[0][$j] == 1 || $dp[0][$j - 1] == 0) {
                $dp[0][$j] = 0;
            } else {
                $dp[0][$j] = 1;
            }
        }
        //处理非边缘情况,从左往右,从上往下写表
        for ($i = 1; $i < $m; $i++) {//行
            for ($j = 1; $j < $n; $j++) {//列
                if ($obstacleGrid[$i][$j] == 1) {//障碍
                    $dp[$i][$j] = 0;
                } else {
                    $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - 1];
                }
            }
        }

        return $dp[$m - 1][$n - 1];
    }
}