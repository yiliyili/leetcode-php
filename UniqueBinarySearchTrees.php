<?php
// 96. 不同的二叉搜索树
class Solution {

  /**
   * @param Integer $n
   * @return Integer
   *
   * @github https://github.com/yumindayu/leetcode-php
   * 
假设n个节点存在二叉排序树的个数是G(n)，令f(i)为以i为根的二叉搜索树的个数
G(n) = 以1为根节点的种数+2为根节点+...+
   G(n) = f(1) + f(2) + f(3) .... + f(n) 

   l:f(1...i-1) r:(i + 1.....n)

   G(n) = G(0)*G(n-1) + G(1)*G(n-2) ... + G(n-1)*G(0)
   */
  function numTrees($n) {
    $dp = [];
    $dp[0] = 1;//表示0个节点存在二叉排序树的个数是1,其实$dp[1] = 1; 1个节点也只能找到1棵树
    for ($i = 1; $i <= $n; $i++) {
      for ($j = 0; $j < $i; $j++) {
        $dp[$i] += $dp[$j] * $dp[$i - $j - 1];//卡特兰数公式
      }
    }
    return $dp[$n];
  }
}