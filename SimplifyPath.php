<?php
// 71. 简化路径
class Solution {

  /**
   * @param String $path
   * @return String

   输入："/a/./b/../../c/"
   输出："/c"
   */
  function simplifyPath($path) {
    $array = explode('/', $path);
    $stack = [];
    foreach ($array as $v) {
      if ($v == "..") {
        if (!empty($stack)) {//有没有才能决定能不能上去一级
          array_pop($stack);//尾部弹出
        }
      } else if ($v != "" && $v != ".") {
        array_push($stack, $v);
      }
    }
    return empty($stack) ? '/' : "/" . implode('/', $stack);//连接
  }
}