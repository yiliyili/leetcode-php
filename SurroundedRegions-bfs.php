<?php
// 130. 被围绕的区域 广度优先
class Solution {

    function solve(&$board) {
        $open = [];

        $n = count($board);
        $m = count($board[0]);
        // find O on the edge
        for($i=0;$i<$n;$i++) {
            for($j=0;$j<$m;$j++) {
                //边界上的O先换为A
                if (($i==0 || $i==$n-1 || $j==0 || $j==$m-1) && $board[$i][$j] == 'O') {
                    $board[$i][$j] == 'A';
                    $open[] = [$i, $j];
                }
            }
        }

        while (count($open)) {
            $o = array_shift($open);
            $board[$o[0]][$o[1]] = 'A';//将队列中,循环添加进来的的,没有改为A的O,改为A
            //上下左右符合的加入队列
            if (isset($board[$o[0]+1][$o[1]]) && $board[$o[0]+1][$o[1]] == 'O') {
                array_push($open, [$o[0]+1, $o[1]]);
            }
            if (isset($board[$o[0]-1][$o[1]]) && $board[$o[0]-1][$o[1]] == 'O') {
                array_push($open, [$o[0]-1, $o[1]]);
            }
            if (isset($board[$o[0]][$o[1]+1]) && $board[$o[0]][$o[1]+1] == 'O') {
                array_push($open, [$o[0], $o[1] + 1]);
            }
            if (isset($board[$o[0]][$o[1]-1]) && $board[$o[0]][$o[1]-1] == 'O') {
                array_push($open, [$o[0], $o[1]-1]);
            }
        }
        //把A换回O
        for($i=0;$i<$n;$i++) {
            for($j=0;$j<$m;$j++) {
                if ($board[$i][$j] == 'O') {
                    $board[$i][$j] = 'X';
                } elseif ($board[$i][$j] == 'A') {
                    $board[$i][$j] = 'O';
                }
            }
        }

        return $board;
    }
}

