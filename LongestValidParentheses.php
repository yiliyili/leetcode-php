<?php
// 32. 最长有效括号
class Solution {

  /**
   * @param String $s
   * @return Integer

   输入: "(()"
   输出: 2

   输入: ")()())"

   )start = 0;
   (start = 1; stack top 1
   ) max = 2;
   ( stack  3
   ) max = 4  用例子进行校验

   

   输出: 4
   */
  function longestValidParentheses($s) {
    $res = 0;
    $start = 0;
    $stack = new SplStack();
    for ($i = 0; $i < strlen($s); $i++) {
      if ($s[$i] == "(") {
        $stack->push($i);//压入下标
      } else {
        if ($stack->isEmpty()) {//说明当前的右括号是不匹配的
          $start = $i + 1;//起始位置需要移动
        } else {
          $stack->pop();
          //可能左括号多,也可能右括号多
          $res = $stack->isEmpty() ? max($res, $i - $start + 1) : max($res, $i - $stack->top());
        }
      }
    }
    return $res;
  }
}