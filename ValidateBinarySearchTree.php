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
// 98. 验证二叉搜索树
class Solution {

  /**
   * @param TreeNode $root
   * @return Boolean
   *
   * @github https://github.com/yumindayu/leetcode-php

           4
          / \
          2  6
         / \ /
        1  3 5
   */
  function isValidBST($root) {
    return $this->valid($root, null, null);
  }
  //递归,不能只比较儿子级
  function valid($root, $min, $max) {
    if (is_null($root)) return true;
    if (!is_null($min) && $root->val <= $min) return false;//不能小于最小值
    if (!is_null($max) && $root->val >= $max) return false;
    //对于左子树而言已经确定根节点是最大值,对右子树而言是最小值
    return $this->valid($root->left, $min, $root->val) && $this->valid($root->right, $root->val, $max);
  }


}