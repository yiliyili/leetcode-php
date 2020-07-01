<?php
// 60. 第k个排列
class Solution {

  /**
   * @param Integer $n
   * @param Integer $k
   * @return String

    n = 4 k = 14

    [1,2,3,4] n! 4*3*2*1 = 24  
    1+(2,3,4) n-1! 6  1开头的有6种
    2+(1,3,4) n-1! 6
    3+(1,2,4) n-1! 6  ->   1+(2,4) 3-1! = 2
    4+(1,2,3) n-1! 6

    k从0开始，k=13
    k / n-1! 第一个index的位置
   */
  //做全排列的话会超时
  function getPermutation($n, $k) {
    $fact = 1;//阶乘
    $nums = [];//收集数字如[1,2,3,4]
    for ($i = 0; $i < $n; $i++) {
      $nums[$i] = $i + 1;
      $fact *= $i + 1;//比如4的阶乘最终是24,还可以把所有阶乘算出来放进一个数组中
    }
    $k -= 1;
    $res = "";
    for ($i = 0; $i < $n; $i++) {
      $fact = floor($fact / ($n - $i));//新的阶乘
      $index = floor($k / $fact);//找到数字对应的下标
      $res .= (string)$nums[$index];
      $k %= $fact;
      unset($nums[$index]);
      $nums = array_values($nums);//调整索引下标
    }
    return $res;
  }
}

$solu = new Solution();
print_r($solu->getPermutation(4, 12));