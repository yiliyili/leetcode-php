<?php
// 130. 被围绕的区域 深度优先
class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     */
    private $row, $col;
    function solve(&$board) {
        if (empty($board)) return;
        $this->row = count($board);
        $this->col = count($board[0]);

        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->col; $j++) {
              //判断边界
                $isEdge = $i == 0 || $j == 0 || $i == $this->row - 1 || $j == $this->col - 1;
                //把边界上的O和与边界O相连的O都变成#
                if ($isEdge && $board[$i][$j] == 'O') {
                    $this->dfs($board, $i, $j);
                }
            }
        }
        //把之前临时换为#的恢复为O
        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->col; $j++) {
                if ($board[$i][$j] == 'O') $board[$i][$j] = 'X';
                if ($board[$i][$j] == '#') $board[$i][$j] = 'O';
            }
        }
        return;
    }

    function dfs(&$board, $i, $j) {
        if ($i < 0 || $j < 0 
            || $i >= $this->row || $j >= $this->col 
            || $board[$i][$j] == 'X' || $board[$i][$j] == '#') return;
        $board[$i][$j] = '#';
        $this->dfs($board, $i - 1, $j);
        $this->dfs($board, $i + 1, $j);
        $this->dfs($board, $i, $j - 1);
        $this->dfs($board, $i, $j + 1);
    }
}

