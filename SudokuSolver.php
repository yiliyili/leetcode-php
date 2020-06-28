<?php
// 37. 解数独
class Solution {

  /**
   * @param String[][] $board
   * @return NULL
   */
  function solveSudoku(&$board) {
    if (!$board) return;
    $this->solve($board);
  }

  function solve(&$board) {
    for ($i = 0; $i < count($board); $i++) {//其实就是9
      for ($j = 0; $j < count($board[0]); $j++) {
        if ($board[$i][$j] == ".") {//空字符
          for ($c = "1"; $c <= "9"; $c++) {//从1开始挨个试
            if ($this->valid($board, $i, $j, $c)) {
              $board[$i][$j] = (string)$c;//题意要求数字要换成字符串
              if ($this->solve($board)) {
                return true;
              }
              $board[$i][$j] = ".";//发现改为$c不行,回溯还原
            }
          }
          return false;//无论如何都不行的情况
        }
      }
    }
    return true;
  }

  function valid($board, $row, $col, $c) {
    for ($i = 0; $i < 9; $i++) {
      //所在行,列和小方块中不能有和相同的数字存在
      if ($board[$i][$col] != "." && $board[$i][$col] == $c) return false;
      if ($board[$row][$i] != "." && $board[$row][$i] == $c) return false;

      $x = 3 * floor($row / 3) + floor($i / 3);
      $y = 3 * floor($col / 3) + floor($i % 3);
//这个和36题不一样是因为这里计算的是求出当指定某个下标($row,$col)后,它所在的子数独的坐标,36题是内层循环每次求出第$i个子数独的真实坐标
      if ($board[$x][$y] != "." && $board[$x][$y] == $c) return false;
    }
    return true;
  }
}