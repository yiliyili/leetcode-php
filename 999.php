<?php
// 999. 可以被一步捕获的棋子数
class Solution
{

    public $count = 0;
    /**
     * @param String[][] $board
     * @return Integer
     */
    public function numRookCaptures($board)
    {
        $m = count($board);
        $n = count($board[0]);
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($board[$i][$j] == 'R') {//白色的车
                    $this->helper($board, $i, $j, $m, $n, 1, 0);
                    $this->helper($board, $i, $j, $m, $n, -1, 0);
                    $this->helper($board, $i, $j, $m, $n, 0, 1);
                    $this->helper($board, $i, $j, $m, $n, 0, -1);
                }
            }
        }
        return $this->count;
    }

    public function helper($board, $row, $col, $m, $n, $nextx, $nexty)
    {
        $row = $row + $nextx;
        $col = $col + $nexty;

        if ($row < 0 || $row >= $m || $col < 0 || $col >= $n) {
            return 0;
        }
        //B 白色的象
        if ($board[$row][$col] == 'B') {
            return 0;
        }

        if ($board[$row][$col] == '.') {
            $this->helper($board, $row, $col, $m, $n, $nextx, $nexty);
        }
        // 黑色的卒
        if ($board[$row][$col] == 'p') {
            $this->count++;
            return;
        }
        return;
    }
}
