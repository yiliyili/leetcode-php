<?php
// 85. 最大矩形
class Solution {

  /**
   * @param String[][] $matrix
   * @return Integer
    
   输入:
    [
      ["1","0","1","0","0"],
      ["1","0","1","1","1"],
      ["1","1","1","1","1"],
      ["1","0","0","1","0"]
    ]
每一行看做是84题类似的赵最大矩形


    [1,0,1,0,0],
    [2,0,2,1,1],  把前一行的累加上来
    [3,1,3,2,2],
    [4,0,0,3,0] //是0就不累加
  
   */
  function maximalRectangle($matrix) {
    $res = 0;
    $heights = [];
    for ($i = 0; $i < count($matrix); $i++) {
      for ($j = 0; $j < count($matrix[0]); $j++) {//统计每一列$matrix[0]
        if ($i == 0) {
          $heights[$j] = $matrix[$i][$j] == 0 ? 0 : 1;//不是0就是1,第一行也不进行累加
        } else {
          $heights[$j] = $matrix[$i][$j] == 0 ? 0 : (1 + $heights[$j]);//高度为0,不累加前边的
        }
      }
      $res = max($res, $this->area($heights));//heights就是84题的参数,每一行进行代入
    }
    return $res;
  }
  //这是84题解题办法
  function area($heights) {
    array_push($heights, 0);//增加一个最小值,确保 $heights[$stack->top()] >= $heights[$i]时,所有元素都能弹出来,所有元素都是>=0的
    $stack = new SplStack;
    $max = 0;
    for ($i = 0; $i < count($heights); $i++) {
      while (!$stack->isEmpty() && $heights[$stack->top()] >= $heights[$i]) {
        $last = $stack->pop();
        if (!$stack->isEmpty()) {
          $width = $i - $stack->top() - 1;
        } else { 
          $width = $i;
          // var_dump($width );
        }
        // echo '高度'.$heights[$last] ;
        // var_dump($heights[$last] * $width);
        $max = max($max, $heights[$last] * $width);
      }
      $stack->push($i);
    }
    return $max;
  }
}

$matrix = [
    [1,0,1,0,1,1,1,1,1,1],
    [0,0,0,0,0,0,0,1,1,1],
    [1,0,1,0,1,1,0,1,1,1],
    [0,0,0,0,1,1,1,1,1,1],
    [1,0,1,0,1,1,1,1,1,1],
    [0,0,0,0,0,0,1,1,1,1],
    [1,0,1,0,1,1,1,1,1,1],
    [0,0,0,0,1,1,0,0,0,1],
];

echo '<pre>';

$solu = new Solution();
var_dump( $solu->maximalRectangle($matrix));
// var_dump( $solu->area([1,0,1,0,1,1,4,7,7,7 ]));