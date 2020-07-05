<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}
 // 105. 从前序与中序遍历序列构造二叉树
class Solution {

  /**
   * @param Integer[] $preorder
   * @param Integer[] $inorder
   * @return TreeNode

    1
   / \
  2   3
 /   / \
 4   5  6
  \     /
   7   8

preOrder [1,2,4,7,3,5,6,8]

inOrder  [4,7,2,1,5,3,8,6]

   @github https://github.com/yumindayu/leetcode-php
   */
  function buildTree($preorder, $inorder) {
    return $this->helper($preorder, 0, $inorder, 0, count($inorder)-1);
  }
  //递归
  //$pend用count($preorder)-1代替
  function helper($preorder, $pstart, $inorder, $istart, $iend) {
    if ($pstart > count($preorder)-1 || $istart > $iend) {
      return null;
    }
    $root = new TreeNode($preorder[$pstart]);//根节点
    $key = array_search($root->val, $inorder);//根节点在中序中的位置
    $leftLength = $key - $istart;//左子树的长度
    $preStRight = $pstart+$leftLength+1;//右子树在先序数组中的起始下标,也是右子树根节点的位置
    $preStLeft = $pstart+1;//左子树在先序数组中的起始下标,也是左子树根节点的位置
    $root->left = $this->helper($preorder, $preStLeft, $inorder, $istart, $key-1);
    $root->right = $this->helper($preorder, $preStRight, $inorder, $key+1, $iend);
    return $root;
  }

  //先序与中序
  function buildTree2($preorder, $inorder) {
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
}



