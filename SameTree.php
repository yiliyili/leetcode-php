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
// 100. 相同的树
class Solution {
//如果两个树在结构上相同，并且节点具有相同的值，则认为它们是相同的。
  /**
   * @param TreeNode $p
   * @param TreeNode $q
   * @return Boolean
   * @github https://github.com/yumindayu/leetcode-php
   */
  function isSameTree($p, $q) {
    if ($p == null && $q == null) return true;//已经递归到最后一个节点
    if ($p != null && $q != null && $p->val == $q->val) {
      return $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
    }
    return false;//错误情况
  }
}