<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
// 102. 二叉树的层序遍历
class Solution {

  /**
   * @param TreeNode $root
   * @return Integer[][]
   * @github https://github.com/yumindayu/leetcode-php

    3
   / \
  9  20
    /  \
   15   7

  [
    [3],
    [9,20],
    [15,7]
  ]
   */
  //队列
  function levelOrder($root) {
    $res = [];
    if (!$root) return $res;
    $queue = [];
    array_push($queue, $root);
    $level = 0;
    while (!empty($queue)) {
      foreach ($queue as $r) {//其实每次遍历完一层,下一层又放进去了,所以while循环能继续执行
        if ($r->left != null) array_push($queue, $r->left);//不会影响本次foreach的执行次数
        if ($r->right != null) array_push($queue, $r->right);
        $res[$level][] = $r->val;
        array_shift($queue);//虽然第一次这里边还有2个元素,但是foreach依然会中止执行
      }
      $level++;//加一层
    }
    return $res;
  }
}




