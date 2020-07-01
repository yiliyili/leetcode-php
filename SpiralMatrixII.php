<?php
// 59. 螺旋矩阵 II  
class Solution {

  /**
   * @param Integer $n
   * @return Integer[][]
    输入: 3
    输出:
    [
     [ 1, 2, 3 ],
     [ 8, 9, 4 ],
     [ 7, 6, 5 ]
    ]

    2 => 4
    0 => 8
    1 => 9
   */
  function generateMatrix($n) {
    // 跟54题对比
    $top = 0;
    $bottom = $n - 1;
    $left = 0;
    $right = $n - 1;
    $num = 1;
    // $matrix = [];
    $matrix = array_fill(0,$n,array_fill(0,$n,0));//填充,防止生成的键顺序错乱
    while ($top <= $bottom && $left <= $right) {
      //from left to right
      for ($i = $left; $i <= $right; $i++) {
        $matrix[$top][$i] = $num++;
      }
      $top++;

      //from top to bottom
      for ($i = $top; $i <= $bottom; $i++) {
        $matrix[$i][$right] = $num++;
      }
      $right--;

      //from right to left
      for ($i = $right; $i >= $left; $i--) {
        $matrix[$bottom][$i] = $num++;
      }
      $bottom--;

      //from bottom to top
      for ($i = $bottom; $i >= $top; $i--) {
        $matrix[$i][$left] = $num++;
      }
      $left++;
    }
    // var_dump($matrix);//键的顺序
    // foreach ($matrix as $key => $v) {
    //   ksort($v);
    //   $matrix[$key] = $v;
    // }
    return $matrix;
  }

}

$solu = new Solution();
print_r($solu->generateMatrix(6));