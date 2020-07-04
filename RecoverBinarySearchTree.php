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
// 99. 恢复二叉搜索树
class Solution {

  /**
   * @param TreeNode $root
   * @return NULL
   *
   * @github https://github.com/yumindayu/leetcode-php

题意:只有2个发生了交换

    3
   / \
  1   4
     /
    2

  1 3 2 4 
   */
  public $firstNode;//第一个认为异常

  public $secondNode;//第二个认为异常

  public $pre;//前一个节点
  function recoverTree($root) {
    if ($root == null) return;
    $this->helper($root);
    $temp = $this->firstNode->val;
    $this->firstNode->val = $this->secondNode->val;
    $this->secondNode->val = $temp;
  }

  //利用中序遍历是升序的结果
  function helper($root) {
    if ($root == null) return;
    //遍历左子树
    $this->helper($root->left);
    //中间是处理过程
    if ($this->pre == null) {//遍历第一个节点时才是null
      $this->pre = $root;
    } else {
      if ($this->pre->val > $root->val) {//找到了
        if ($this->firstNode == null) {
          $this->firstNode = $this->pre;
        }
        $this->secondNode = $root;//只更新second
      }
      $this->pre = $root;//更新pre,因为要一致跟pre比较
    }
    //遍历右子树
    $this->helper($root->right);
  }
}