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
// 103. 二叉树的锯齿形层次遍历
class Solution {

  /**
   * @param TreeNode $root
   * @return Integer[][]
   * @github https://github.com/yumindayu/leetcode-php
给定一个二叉树，返回其节点值的锯齿形层次遍历。（即先从左往右，
再从右往左进行下一层遍历，以此类推，层与层之间交替进行）。
    3
   / \
  9  20
    /  \
   15   7

   [
      [3],
      [20,9],
      [15,7]
   ]


   */
  function zigzagLevelOrder($root) {
    $res = [];
    if (!$root) return $res;
    $queue = [];
    array_push($queue, $root);
    $level = 0;//最开始是0层
    while (!empty($queue)) {
      $list = [];
      foreach ($queue as $r) {
        if ($level % 2 == 0) {
          array_push($list, $r->val);//从左到右
        } else {
          array_unshift($list, $r->val);//从右到左,头插
        }
        if ($r->left != null) array_push($queue, $r->left);
        if ($r->right != null) array_push($queue, $r->right);
        array_shift($queue);
      }
      array_push($res, $list);
      $level++;
    }
    return $res;
  }
}


