<?php
// 118 119. 杨辉三角
class Solution {

  /**
   * @param Integer $numRows
   * @return Integer[][]
   * @github https://github.com/yumindayu/leetcode-php

    Input: 5 层
    Output:
    [
         [1],
        [1,1],
       [1,2,1],
      [1,3,3,1],
     [1,4,6,4,1]
    ]
   */
  function generate($numRows) {
    $res = [];
    for ($i = 0; $i <$numRows; $i++) {
      if ($i == 0) {
        $res[$i] = [1];//第一行
      } else if ($i == 1) {//第二行
        $res[$i] = [1, 1];
      } else {
        $res[$i][0] = 1;
        for ($j = 1; $j < $i; $j++) {
          $res[$i][$j] = $res[$i - 1][$j - 1] + $res[$i - 1][$j];//前一行的数字相加
        }
        $res[$i][$i] = 1;
      }
    }
    return $res;
  }

  //返回某一层 空间复杂度O(k)
  function getRow($rowIndex) {
    for ($i = 0; $i <= $rowIndex; $i++) {
      if ($i == 0) {
        $pre = [1];
      } else if ($i == 1) {
        $pre = [1, 1];
      } else {
        $current = [];
        for ($j = 1; $j < $i; $j++) {
          array_push($current, $pre[$j - 1] + $pre[$j]);
        }
        array_unshift($current, 1);
        array_push($current, 1);
        $pre = $current;
      }
    }
    return $pre;
  }
}

$solu = new Solution();
print_r($solu->generate(5));