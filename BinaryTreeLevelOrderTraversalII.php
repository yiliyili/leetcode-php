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
// 107. 二叉树的层次遍历 II
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
    [15,7],
    [9,20],
    [3],
  ]
   */
  //也可以102题遍历完的结果,再做一次倒序
  function levelOrderBottom($root) {
    $res = [];
    if (!$root) return $res;

    $queue = [];
    array_push($queue, $root);

    while (!empty($queue)) {
      $list = [];
      foreach ($queue as $r) {
        array_push($list, $r->val);
        if ($r->left != null) {
          array_push($queue, $r->left);
        }
        if ($r->right != null) {
          array_push($queue, $r->right);
        }
        array_shift($queue);//减少队列长度,不然一直在while循环中
      }
      //每froeach完一次,把结果放进res中
      array_unshift($res, $list); //比如[9,20]进行头插
    }
    return $res;
  }
}




