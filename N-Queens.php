<?php
// 51. N皇后
class Solution {

  /**
   * @param Integer $n
   * @return String[][]

   . Q . .
   . . . Q
   Q . . . 
   . . Q .
   
   res = [
      [
        0 => 1,
        1 => 3,
        2 => 0,
        3 => 2,
      ],
      [

      ],
   ],

   */
  public $cols = [];//不存行是因为,找到一个合适的位置,我们就递归到下一行,所以不用存行攻击范围
  public $pie = [];//撇攻击范围
  public $na = [];//捺攻击范围
  public $res = [];
  function solveNQueens($n) {
    $this->solve([], $n, 0);
    return $this->generateAnswer($n);
  }

  //回溯+剪枝
  function solve($answer, $n, $i) {
    if ($i == $n) {//已经找到了最后一行
      // var_dump($answer); 比如2,0,1,3  存放可以放皇后的位置
      array_push($this->res, $answer);
      return;
    }
    for ($j = 0; $j < $n; $j++) {
      //撇和捺攻击范围规律:撇 i+j是定值,捺i-j是定值,加一个常数n确保不变成负数
      if (in_array($j, $this->cols) || in_array($i + $j, $this->pie) || in_array($i - $j + $n, $this->na)) {
        continue;//在攻击范围内不能填写
      }
      array_push($this->cols, $j);
      array_push($this->pie, $i + $j);
      array_push($this->na, $i - $j + $n);

      $answer[$i] = $j;
      $this->solve($answer, $n, $i + 1);//下一行
      //攻击范围还原
      array_pop($this->cols);
      array_pop($this->pie);
      array_pop($this->na);
    }
  }
  //生成可以摆放的方案
  function generateAnswer($n) {
    $ret = [];
    if (!empty($this->res)) {
      foreach ($this->res as $v) {
        for ($i = 0; $i < $n; $i++) {
          $str = "";
          foreach ($v as $v1) {
            if ($v1 == $i) {
              $str .= "Q";
            } else {
              $str .= ".";
            }
          }
          array_push($ret, $str);
        }
      }
    }
    return array_chunk($ret, $n);
  }
}

$solu = new Solution();
var_dump( $solu->solveNQueens(4));