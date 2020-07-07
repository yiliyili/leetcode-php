<?php
// 300. 最长上升子序列
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php
   */

  public $LIS = [];
  function lengthOfLIS2($nums) { 
    for ($i = 0; $i < $nums; $i++) {
      $this->insertLIS($nums[$i]);
    }
    return count($this->LIS);
  }

  function insertLIS($num) {
    if (empty($this->LIS)) {
      array_push($this->LIS, $num);
      return;
    }
    $l = 0;
    $r = count($this->LIS) - 1;

    while ($l <= $r) {
      $mid = floor(($r - $l) / 2) + $l;
      if ($num == $this->LIS[$mid]) {
        return;
      }
      if ($num < $this->LIS[$mid]) {
        $r = $mid - 1;
      } else {
        $l = $mid + 1;
      }
      //此时 l 就是num应该在的位置
    }
    $this->LIS[$l] = $num;
  }


  //动态规划 dp[i]表示以 nums[i] 结尾的「上升子序列」的长度
  function lengthOfLIS($nums) {
    $len = count($nums);
    if ($len <= 1) return $len;

    $max = 1;
    for ($i = 0; $i < count($nums); $i++) {
      $dp[$i] = 1;
      for ($j = 0; $j < $i; $j++) {
        if ($nums[$j] < $nums[$i]) {
          $dp[$i] = max($dp[$i], $dp[$j] + 1);
          $max = max($max, $dp[$i]);
        }
      }
    }
    return $max;
  }

  //更好的
  function lengthOfLIS3($nums) {
        $len = count($nums);
        if ($len <= 1) return $len;

        // dp 数组的含义，表示  [0,...,i] 子串的 LIS，所以最后返回 max(dp) 即可
        $dp = array_fill(0, $len, 1);
        for ($i = 1; $i < $len; ++$i) {
            // i 是当前下标，j 是比 i 小的所有下标
            for ($j = 0; $j < $i; ++$j) {
                if ($nums[$j] < $nums[$i]) {
                    $dp[$i] = max($dp[$i], $dp[$j] + 1);
                }
            }
        }

        return max($dp);
    }



}

$arr = [10,9,2,5,3,7,101,18];
$obj = new Solution;
var_dump($obj->lengthOfLIS($arr));
