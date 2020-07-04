<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}
 
// 95. 不同的二叉搜索树 II
class Solution {

  /**
   * @param Integer $n
   * @return TreeNode[]
   *
   * @github https://github.com/yumindayu/leetcode-php


           4
          / \
          2  6
         / \ /
        1  3 5
   */
  function generateTrees($n) {
    if ($n == 0) return [];
    return $this->gen(1, $n);//先是1作为根节点
  }
  //选定一个根节点后,左边的排列加上右边的排列
  function gen($start, $end) {
    $res = [];//非属性的数组
    if ($start > $end) {//跟大于了最大值
      array_push($res, null);
    }
    //如果以$i为根节点
    for ($i = $start; $i <= $end; $i++) {
      $left = $this->gen($start, $i - 1);//生成左侧数组,数组中是节点对象或者null
      $right = $this->gen($i + 1, $end);
      //计算排列
      foreach ($left as $l) {
        foreach ($right as $r) {
          $node = new TreeNode($i);
          $node->left = $l;
          $node->right = $r;
          array_push($res, $node);
        }
      }
    }
    return $res;
  }
}

$solu = new Solution();
var_dump($solu->generateTrees(3));