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
// 112. 路径总和
class Solution {

  
  /**
   * @param TreeNode $root
   * @param Integer $sum
   * @return Boolean
   * @github https://github.com/yumindayu/leetcode-php

    3
   / \
  9  20
    /  \
   15   7

   sum = 38 


   */
  function hasPathSum($root, $sum) {
    if ($root == null) return false;

    if ($root->left == null && $root->right == null) {
      return $sum - $root->val == 0;//到最底部是否等于0
    }
    //左右两边都可以
    return $this->hasPathSum($root->left, $sum - $root->val) || $this->hasPathSum($root->right, $sum - $root->val);
  }

  public $res = [];

  // 113题
  function pathSum($root, $sum) {
    if ($root == null) return $this->res;

    $this->helper($root, [], $sum);
    return $this->res;
  }
  //这几乎是一个模板
  function helper($root, $array, $sum) {
    if ($root == null) return 0;
    array_push($array, $root->val);
    if ($root->left == null && $root->right == null) {
      if ($sum - $root->val == 0) {
        array_push($this->res, $array);//res保存最终结果
        return;
      }
    }
    //临时的array做参数
    $this->helper($root->left, $array, $sum - $root->val);
    $this->helper($root->right, $array, $sum - $root->val);
  }

}