<?php
// 892. 三维形体的表面积
class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    public function surfaceArea($grid)
    {
        $result = 0;
        $m      = count($grid);
        $n      = count($grid[0]);
        for ($i = 0; $i < $m; $i++) {//行
            for ($j = 0; $j < $n; $j++) {//列
                if ($grid[$i][$j] != 0) {
                    $result += $grid[$i][$j] * 4 + 2;
                }
                //减去i,j两个方向挡住的部分
                if ($i > 0) {
                    $result -= min($grid[$i - 1][$j], $grid[$i][$j]) * 2;
                }
                if ($j > 0) {
                    $result -= min($grid[$i][$j - 1], $grid[$i][$j]) * 2;
                }
            }
        }
        return $result;
    }
}
