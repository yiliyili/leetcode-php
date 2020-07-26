<?php
// 42. 接雨水
class Solution {

  /**
   * @param Integer[] $height
   * @return Integer
   */
  //双指针变形,找到最高柱子,先算左边,再算右边
  function trap($height) {
    $max_value = 0;
    $max_idx = 0;
    //先找到最高柱子
    for ($i = 0; $i < count($height); $i++) {
      if ($height[$i] > $max_value) {
        $max_value = $height[$i];
        $max_idx = $i;
      }
    }
    $left_height = $height[0];
    $area = 0;
    //左边进行靠拢,只要下一个高度小于左边,就一定能接雨水
    for ($i = 1; $i < $max_idx; $i++) {//从第二根开始和第一根对比
      if ($left_height < $height[$i]) {//不能接雨水
        $left_height = $height[$i];//更新柱子高度
      } else {//可以接雨水
        $area += $left_height - $height[$i];//减去本身柱子高度
      }
    }
    //右半部分
    $right_height = $height[count($height) - 1];
    for ($i = count($height) - 2; $i > $max_idx; $i--) {
      if ($right_height < $height[$i]) {//最开始右起第二和右起第一对比
        $right_height = $height[$i];
      } else {
        $area += $right_height - $height[$i];
      }
    }
    return $area;
  }

  function trap2($height) {
    $stack = new SplStack;
    $res = 0;
    for ($i = 0; $i < count($height); $i++) {
      //比栈顶元素小就入栈,相当于存凹槽
      if ($stack->isEmpty() || $height[$i] < $height[$stack->top()]) {
        $stack->push($i);
      } else {
        //比栈顶元素大,开始计算面积,不断处理栈中元素
        while (!$stack->isEmpty() && $height[$i] > $height[$stack->top()]) {
          $top = $stack->pop();
          if (!$stack->isEmpty()) {//至少要有3个块才可能存水
            $res += ($i - $stack->top() - 1) * (min($height[$i], $height[$stack->top()]) - $height[$top]);
          }
        }
        $stack->push($i);//当前这个也要压栈,供给后边使用
      }
    }
    return $res;
  }

}

$solu = new Solution();
var_dump($solu->trap([4,2,3]));