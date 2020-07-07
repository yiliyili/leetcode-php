<?php
// 剑指 Offer 57 - II. 和为s的连续正数序列
class Solution {
  /**
   * @param Integer $target
   * @return Interger[][]
   * @github https://github.com/yumindayu/leetcode-php
正整数 target
   target = 9
   [[2,3,4],[4,5]]

   1  2  3  4  5  6  7  8

            [      ]

   */
  public $res = [];
  //暴力解法
  function findContinuousSequence($target) {
    for ($i = 1; $i < $target; $i++) {//挨个挨个开始
      $this->helper([], $i, $target, 0);
    }
    return $this->res;
  }
  //没有回溯,就是递归
  function helper($array, $start, $target, $sum) {
    if ($sum == $target) {
      array_push($this->res, $array);
      return;
    }
    if ($sum > $target) {//已经超过了,因为要求序列连续,所以false
      return false;
    }
    array_push($array, $start);
    $this->helper($array, $start + 1, $target, $sum + $start);
  }
  //C:\myshop\daimapianduan\phpalgo\offer\57-2.php更好解答
  function findContinuousSequence2($target) {
    $res = [];
    $sum = 0;
    $window = [];

    for ($i = 1; $i < $target; $i++) {
      $sum += $i;
      array_push($window, $i);
      if ($sum < $target) {
        continue;
      } else if ($sum > $target) {
        while ($sum > $target) {
          $first = array_shift($window);
          $sum -= $first;
          if ($sum == $target) {
            array_push($res, $window);
            break;
          }
        }

      } else {
        array_push($res, $window);
      }
    }
    return $res;
  }

}