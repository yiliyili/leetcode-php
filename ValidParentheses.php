<?php
// 20. 有效的括号
class Solution {

  /**
   * @param String $s
   * @return Boolean

   给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。
   输入: "()[]{}"   输出: true

   输入: "([)]   输出: false


   栈－－后进先出 LIFO



   ｜   ｜
   ｜   ｜
   ｜   ｜
   ｜   ｜
   ｜   ｜
    －－-
   */
  function isValid($s) {
    if (!$s) return true;

    $data = [")" => "(", "}" => "{", "]" => "["];
    $stack = [];
    for ($i = 0; $i < strlen($s); $i++) {
      if (isset($data[$s[$i]])) {//发现是右括号
        if (empty($stack)) {
          return false;
        }
        $ele = array_pop($stack);//弹出一个左括号
        if ($data[$s[$i]] != $ele) {
          return false;
        }
      } else {//左括号入栈
        array_push($stack, $s[$i]);
      }
    }
    if (!empty($stack)) {
      return false;
    }
    return true;
  }

  function isValid2($s) {
    if (!$s) return true;

    $data = [")" => "(", "}" => "{", "]" => "["];

    $stack = new SplStack();

    for ($i = 0; $i < strlen($s); $i++) {
      if (isset($data[$s[$i]])) {
        if ($stack->isEmpty()) {
          return false;
        }
        $ele = $stack->pop();
        if ($data[$s[$i]] != $ele) {
          return false;
        }
      } else {
        $stack->push($s[$i]);
      }
    }
    if (!$stack->isEmpty()) {
      return false;
    }
    return true;
  }
}