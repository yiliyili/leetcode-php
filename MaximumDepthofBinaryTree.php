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
// 104 二叉树的最大深度  
class Solution {

  /**
   * @param TreeNode $root
   * @return Integer

    3
   / \
  9  20
    /  \
   15   7
   /
  2
   * @github https://github.com/yumindayu/leetcode-php
   */
 function maxDepth($root)
{
    if (!$root) return 0;
    $left = $this->maxDepth($root->left);
    $right = $this->maxDepth($root->right);
    return max($left, $right) + 1;
}


}