<?php
// 36. 有效的数独
class Solution
{
    //有效数独不一定是可解的
    /**
     * @param String[][] $board
     * @return Boolean
     */
    public function isValidSudoku($board)
    {
        for ($i = 0; $i < 9; $i++) {
            $rows = [];//收集每一行的某个字符串是否出现过
            $cols = [];
            $cube = [];
            for ($j = 0; $j < 9; $j++) {
                //行
                if ($board[$i][$j] != "." && isset($rows[$board[$i][$j]])) {
                    return false;
                } else {
                    //这个数字标记为在该行出现
                    $rows[$board[$i][$j]] = true;
                }
                //列
                //列与行$j和$i顺序相反
                if ($board[$j][$i] != "." && isset($cols[$board[$j][$i]])) {
                    return false;
                } else {
                    $cols[$board[$j][$i]] = true;
                }
                //内层循环每次求出第$i个子数独的真实坐标
                $x = 3 * floor($i / 3) + floor($j / 3);
                $y = 3 * floor($i % 3) + floor($j % 3);
                //方格,注意第二个是cube不是board,存某个字符是否出现过
                if ($board[$x][$y] != "." && isset($cube[$board[$x][$y]])) {
                    return false;
                } else {
                    $cube[$board[$x][$y]] = true;
                }
            }
        }
        return true;
    }
}
