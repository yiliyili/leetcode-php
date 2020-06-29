<?php
// 45. 跳跃游戏 II
// 给定一个非负整数数组，你最初位于数组的第一个位置。
// 数组中的每个元素代表你在该位置可以跳跃的最大长度。
// 你的目标是使用最少的跳跃次数到达数组的最后一个位置。

class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer

   输入: [2,3,1,1,4]
   输出: 2
    
  2     3     1     1      4
             can
  i=0   max=2
  i=1   step=1 can_arrived=2  max=4
  i=2   max=4
  i=3   step=2 can_arrived=4
  i=4   max=8

   */
  //非最朴素的贪心,否则只能得到次优解,找最有潜力的格子
  function jump($nums) {
    $step = 0;//跳多少步
    $can_arrived = 0;//最远可以到哪里(但不一定是跳最远)
    $max = 0;//能到达的最大索引
    for ($i = 0; $i < count($nums); $i++) {
      if ($can_arrived < $i) {//能调的最远的地方都没有$i大,说明需要进行跳跃了
        $step++;
        $can_arrived = $max;
      }
      $max = max($max, $i + $nums[$i]);//更新能到达的最大索引
    }
    return $step;
  }
}