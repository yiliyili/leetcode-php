<?php
// 322. 零钱兑换
class Solution {

  /**
   * @param Integer[] $coins
   * @param Integer $amount
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

   ［1,2,5]  11 

得到最少的硬币数

类似于跳台阶问题
      1  2  3  4  5  6  7  8  9  10  11

    0    

    dp[i] 到i台阶时的最小值

    dp[i] = min{i-1, i-2, i-5} + 1    

   */
  function coinChange($coins, $amount) {
    $dp = [];
    $dp[0] = 0;//初始化
    for ($i = 1; $i <= $amount; $i++) {
      $dp[$i] = $amount + 1;
      for ($j = 0; $j < count($coins); $j++) {//硬币种类数
        if ($coins[$j] > $i) continue;
        $dp[$i] = min($dp[$i - $coins[$j]] + 1, $dp[$i]);//与原来的最大值$dp[$i]作比较
      }
    }
    return $dp[$amount] > $amount ? -1 : $dp[$amount];

  }
  //更好的解法
  function coinChange2($coins, $amount) {
        if ($amount == 0) return 0;
        // 初始化结果，最坏情况，都是 1
        $dp = array_fill(1, $amount, $amount+1);//这里的填充就是为了之后被更改
        $dp[0] = 0;
        //这种情况内外层循环可以互相交换,因为都是比较,更改原来的值
        for ($i = 1; $i <= $amount; ++$i) {
            foreach ($coins as $coin) {
                if ($coin > $i) continue;
                // 状态转移方程
                $dp[$i] = min($dp[$i], $dp[$i - $coin] + 1);//后者可能取到dp[0]
            }
        }
        //判断没有解法的时候就返回-1,因为即使全是1分钱凑成的也最多是$amount个硬币,不可能多出来
        return $dp[$amount] > $amount ? -1 : $dp[$amount];
    }


}

$solu = new Solution();
var_dump($solu->coinChange2([1], 1));