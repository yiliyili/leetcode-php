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

// 106. 从中序与后序遍历序列构造二叉树
class Solution {

  /**
   * @param Integer[] $preorder
   * @param Integer[] $inorder
   * @github https://github.com/yumindayu/leetcode-php
   * @return TreeNode

    1
   / \
  2   3
 /   / \
 4   5  6
  \     /
   7   8

preOrder  [1,2,4,7,3,5,6,8]  //说明1是根节点,2是1的左子节点,右子树的第一个3肯定是右子节点

inOrder   [4,7,2,1,5,3,8,6]  //在1左边的是左子树

postOrder [7,4,2,5,8,6,3,1] //最后一个值是根节点


    @github https://github.com/yumindayu/leetcode-php
  */
 //先序与中序
  function buildTree($preorder, $inorder) {
    if (!$preorder) {
      return null;
    }
    $x = array_shift($preorder);
    $node = new TreeNode($x);
    $key = array_search($x, $inorder);

    $node->left = $this->buildTree(array_slice($preorder, 0, $key), array_slice($inorder, 0, $key));
    $node->right = $this->buildTree(array_slice($preorder, $key), array_slice($inorder, $key + 1));

    return $node;
  }
  //中序与后序
  function buildTree2($inorder, $postOrder) {
    if (!$postOrder) {
      return null;
    }
    $x = array_pop($postOrder);
    $node = new TreeNode($x);
    $key = array_search($x, $inorder);

    $node->left = $this->buildTree2(array_slice($inorder, 0, $key), array_slice($postOrder, 0, $key));
    $node->right = $this->buildTree2(array_slice($inorder, $key + 1), array_slice($postOrder, $key));
    return $node;
  }
}





