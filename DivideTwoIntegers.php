<?php
// 29. 两数相除
class Solution {

  /**
   * @param Integer $dividend
   * @param Integer $divisor
   * @return Integer
   两数相除
   要求不使用乘法、除法和 mod 运算符

   输入: dividend = 10, divisor = 3
   输出: 3


   */
  function divide($dividend, $divisor) {
    // echo $dividend, $divisor; 10 -3; 4 3; 1 3
    $sign = 1;
    //正负数标记
    if (($dividend < 0 && $divisor > 0) || ($dividend > 0 && $divisor < 0)) {
      $sign = -1;
    }
    //计算就只需要正数
    $ldividend = abs($dividend);
    $ldivisor = abs($divisor);

    if ($ldividend < $ldivisor) return 0;

    $sum = $ldivisor;
    $multi = 1;
    // 翻倍累加
    while ($sum + $sum < $ldividend) {
      $sum += $sum;
      $multi += $multi;
    }
    $data = $multi + $this->divide($ldividend - $sum, $ldivisor);

    $num = $sign < 1 ? 0 - $data : $data;
    if ($num > pow(2, 31) -1) return pow(2, 31) -1;
    if ($num < pow(-2,31)) return pow(-2,31);
    return $num;
  }
}

$solution = new Solution();
$val = $solution->divide(10, -3);
print_r($val);
//递归范围大了,其实先处理好正负数,然后递归中传递都是整数,不判断正负
//https://leetcode-cn.com/problems/divide-two-integers/solution/po-su-de-xiang-fa-mei-you-wei-yun-suan-mei-you-yi-/