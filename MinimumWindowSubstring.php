<?php
// 76. 最小覆盖子串
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return String
     输入: S = "ADOBECODEBANC", T = "ABC"
     输出: "BANC"

     map{A:1,B:1,C:1} //A:1  代表我们还需要找1个A

     ADOBECODEBANC   
    [ ] 发现有A {A:0,B:1,C:1} length = 1;

    ADOB ECODEBANC 
   [    ] 发现有B {A:0,B:0,C:1} length = 2;

    ADOBEC ODEBANC 
   [      ] 发现有C {A:0,B:0,C:0} length = 3 纪录字符串继续找 发现A>=0 说明在使用中 left++ 
                                                           length-- == 2{A:1,B:0,C:0}

    A DOBECODEB ANC
     [         ]  发现有B {A:1,B:－1,C:0} length=2

    A DOBECODEBA NC
     [          ]  发现有A {A:0,B:－1,C:0}  length=3 纪录字符串继续找 第一个B等于－1 说明有重复的，{A:0,B:0,C:0},发现C，C在使用中 length=2 {A:0,B:0,C:1}  left++

    A DOBEC ODE BANC
               [    ]  发现有C {A:0,B:0,C:0}  length=3 纪录字符串继续找 

    
     */
   //滑动窗口
   function minWindow($s, $t) {
        $need = [];
        $window = [];//窗口中每种需要的字符目前有多少个
        $length = strlen($t);

        if ($length > strlen($s)) {//t比s还长
            return '';
        }

        for ($c = 0; $c < $length; $c++) {
            $need[$t[$c]] = isset($need[$t[$c]]) ? $need[$t[$c]] + 1 : 1;//每一种字符需要多少个才能满足
        }

        $left = 0;
        $right = 0;
        $valid = 0;//覆盖子串中已经有多少种字符满足
        // 记录最小覆盖子串的起始索引及长度
        $start = 0;
        $len = PHP_INT_MAX;

        while ($right < strlen($s)) {
            // $c 是将移入窗口的字符
            $c = $s[$right];
            // 右移窗口
            $right++;
            // 进行窗口内数据的一系列更新
            if (isset($need[$c])) {//是需要的字符么
                $window[$c] = isset($window[$c]) ? $window[$c] + 1 : 1;
                if ($window[$c] === $need[$c]) {//窗口中$c字符数量已经够了
                    $valid++;
                }
            }

            // 判断左侧窗口是否要收缩
            while ($valid === count($need)) {//如果几种字符都已经足够,即可以缩小窗口左侧
                // 在这里更新最小覆盖子串
                if ($right - $left < $len) {
                    $start = $left;
                    $len = $right - $left;
                }
                // d 是将移出窗口的字符
                $d = $s[$left];
                // 左移窗口
                $left++;
                // 进行窗口内数据的一系列更新
                if (isset($need[$d])) {//将要移除的是不是需要的字符
                    if ($window[$d] === $need[$d]) {//当前window中本来刚好x个字符,移除之后数量不够了
                        $valid--;//满足的字符种数少一种
                    }

                    $window[$d]--;//移除
                }
            }
        }

        // 返回最小覆盖子串
        return $len === PHP_INT_MAX ? '' : substr($s, $start, $len);
    }


  function minWindow2($s, $t) {
    if (strlen($s) < strlen($t)) return "";
    $map = [];
    for ($i = 0; $i < strlen($t); $i++) {
      if (isset($map[$t[$i]])) {
        $map[$t[$i]]++;
      } else {
        $map[$t[$i]] = 1;
      }
    }
    // {A:1,B:1,C:1}
    $count = 0; //当前已经找到多少个字符
    $left = 0;
    $min = PHP_INT_MAX;
    for ($right = 0; $right < strlen($s); $right++) {
      if (isset($map[$s[$right]])) {//是不是想要的字符A/B/C
        if ($map[$s[$right]] > 0) {
          $count++;
        }
        $map[$s[$right]]--;
      }
      while ($count == strlen($t)) {
        if ($right - $left < $min) {
          $min = $right - $left;
          $head = $left;
          $end = $right;
        }
        if (isset($map[$s[$left]])) {
          if ($map[$s[$left]] >= 0) {
            $count--;
          }
          $map[$s[$left]]++;
        }
        $left++;
      }
    }
    if ($min == PHP_INT_MAX) return "";
    return substr($s, $head, $end - $head + 1);
  }
}

$s = 'ADOBECODEBANC';
$t = 'ABC';
$solu = new Solution();
echo $solu->minWindow($s, $t);

