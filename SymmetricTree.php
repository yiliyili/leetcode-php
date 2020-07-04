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
// 101. 对称二叉树
class Solution {

  /**
   * @param TreeNode $root
   * @return Boolean
   *
   * @github https://github.com/yumindayu/leetcode-php

          1
         / \
        2   2
       / \ / \
      3  4 4  3
   */
  function isSymmetric($root) {
    return $this->helper($root->left, $root->right);
  }

  function helper($p, $q) {
    if ($p == null && $q == null) return true;
    if ($p == null || $q == null) return false;//有一个不为空
    //注意一点的左等于另一个的右,所以这里的参数是相反的
    return $p->val == $q->val && $this->helper($p->left, $q->right) && $this->helper($p->right, $q->left);
  }
}