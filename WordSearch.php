<?php
// 79. 单词搜索
class Solution {

  /**
   * @param String[][] $board
   * @param String $word
   * @return Boolean
   board =
    [
      ['A','B','C','E'],
      ['S','F','C','S'],
      ['A','D','E','E']
    ]
    给定 word = "ABCCED", 返回 true.
    给定 word = "SEE", 返回 true.
    给定 word = "ABCB", 返回 false.
   */
  //深度优先
  function exist($board, $word) {
    for ($i = 0; $i < count($board); $i++) {
      for ($j = 0; $j < count($board[0]); $j++) {//从A开始试探,然后再从B开始
        $res = $this->helper($board, $i, $j, $word, 0);
        if ($res) return true;
      }
    }
    return false;//不进入循环的情况
  }

  function helper($board, $i, $j, $word, $start) {
    if ($start >= strlen($word)) {//找到了 ==也可以,因为上一次调用是$start + 1所以这里能够和length相等
      return true;
    }
    //先确定范围,再判断$board[$i][$j]
    if ($i < 0 || $i >= count($board) || $j < 0 || $j >= count($board[0]) || $board[$i][$j] != $word[$start]) {
      return false;
    }
    $c = $word[$start];//保存当前字符,之后进行还原
    $board[$i][$j] = "#";//表示这个字母已经找过了
    // var_dump($board);
    //也可以用方向数组,有一个方向找到就行
    $res =  ($this->helper($board, $i + 1, $j, $word, $start + 1) ||
      $this->helper($board, $i - 1, $j, $word, $start + 1) ||
      $this->helper($board, $i, $j + 1, $word, $start + 1) ||
      $this->helper($board, $i, $j - 1, $word, $start + 1)
    );
    $board[$i][$j] = $c;//换回来
    return $res;
  }
}

$board =
    [
      ['A','B','C','E'],
      ['S','F','C','S'],
      ['A','D','E','E']
    ];
$word = 'ABCCED';
$solu = new Solution();
var_dump($solu->exist($board, $word));