<?php
// 93. 复原IP地址
class Solution {

  /**
   * @param String $s
   * @return String[]
   * @github https://github.com/yumindayu/leetcode-php

   输入: "25525511135"
   输出: ["255.255.11.135", "255.255.111.35"]
   */
  //即加三个点,使得每一个都满足规则
  public $res = [];

  function restoreIpAddresses($s) {
    if (strlen($s) > 12) return $this->res;//最长是12,超过就是错误的
    $this->restore($s, 4, "");//要找4段
    return $this->res;
  }

  function restore($s, $k, $ip_string) {
    if ($k == 0 && strlen($s) == 0) {//4段找完,而且当前字符串也遍历完
      array_push($this->res, $ip_string);
      return;
    }
    for ($i = 1; $i <= 3; $i++) {//每一段有1,2,3位
      if (strlen($s) >= $i && $this->valid(substr($s, 0, $i))) {//比如256不满足就进不了if
        if ($k == 1) {//是要找的最后一段
          $this->restore(substr($s, $i), $k - 1, $ip_string . substr($s, 0, $i));//减去一段
        } else {//不是的haul要处理点号
          $this->restore(substr($s, $i), $k - 1, $ip_string . substr($s, 0, $i) . ".");
        }
      }
    }
  }

  function valid($s) {
    if ($s == "" || (strlen($s) > 1 && $s[0] == "0")) return false;
    return $s >= 0 && $s <= 255;
  }

}