<?php
// 84. 柱状图中最大的矩形
class Solution {
//   输入: [2,1,5,6,2,3]
// 输出: 10
// 比如1会拖2的后退,有1在,2最大也大不到那里去,最多能用到高度1
  /**
   * @param Integer[] $heights
   * @return Integer
   */
  function largestRectangleArea($heights) {
    array_push($heights, 0);//避免一直递增没法计算面积,
    $stack = new SplStack;
    $max = 0;
    for ($i = 0; $i < count($heights); $i++) {
      while (!$stack->isEmpty() && $heights[$stack->top()] >= $heights[$i]) {//计算i之前的面积
        $last = $stack->pop();//pop出栈顶下标
        if (!$stack->isEmpty()) {
          $width = $i - $stack->top() - 1;//注意里边放的不是高度而是下标
          echo '$i = '.$i. ' top='. $stack->top() . 'width='. $width .'<br/>';
          // 第一次算出来的是6,第二次while才是5*宽度2=10
        } else { 
          $width = $i;
        }
        $max = max($max, $heights[$last] * $width);
      }
      $stack->push($i);//单调递增栈,可能后边还有更高的柱子,造出更大的矩形,入栈下标用于算宽度
    }
    return $max;
  }
}

$solu = new Solution();
var_dump( $solu->largestRectangleArea([2,1,5,6,6,2,3]));