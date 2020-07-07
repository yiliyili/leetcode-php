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
// 543. 二叉树的直径
class Solution {

  public $max = 0;
  /**
   * @param TreeNode $root
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

          1
         / \
        2   3
       / \     
      4   5 
     /
    6
    给定一棵二叉树，你需要计算它的直径长度。一棵二叉树的直径长度是任意两个结点路径长度中的最大值。这条路径可能穿过也可能不穿过根结点

    直径 左子树最大高度 加右子树最大高度
    高度 max(left, right) + 1
   */
  function diameterOfBinaryTree($root) {
    if ($root == null) return 0;
    $this->helper($root);
    return $this->max;
  }

  function helper($root) {
    $left = $root->left == null ? 0 : $this->helper($root->left) + 1;//左子树最大高度
    $right = $root->right == null ? 0 : $this->helper($root->right) + 1;
    $this->max = max($this->max, $left + $right);//相加
    return max($left, $right);
  }
}