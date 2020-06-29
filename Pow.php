<?php
// 50. Pow(x, n)
class Solution {

  /**
   * @param Float $x
   * @param Integer $n
   * @return Float
   pow(2,10)

   2 2 2 2 2    2 2 2 2 2 
   */
  //分治,n可以是负数
  function myPow($x, $n) {
    if (!$n) {
      return 1;
    }
    if ($n < 0) {//负数,求倒数
      return 1 / $this->myPow($x, -$n);
    }
    if ($n % 2) {//奇数,拿一个x出来
      return $x * $this->myPow($x, $n - 1);
    }
    return $this->myPow($x * $x, $n / 2);//偶数可以一分为二
  }
}