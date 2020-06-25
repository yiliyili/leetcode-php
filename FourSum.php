<?php
 // 使用四个指针(a<b<c<d)。固定最小的a和b在左边，c=b+1,d=_size-1 移动两个指针包夹求解。
 // 保存使得nums[a]+nums[b]+nums[c]+nums[d]==target的解。偏大时d左移，偏小时c右移。c和d相
 // 遇时，表示以当前的a和b为最小值的解已经全部求得。b++,进入下一轮循环b循环，当b循环结束后。
 // a++，进入下一轮a循环。 即(a在最外层循环，里面嵌套b循环，再嵌套双指针c,d包夹求解)。


class Solution {
  
  function fourSum($nums, $target) {
    if (!$nums) return [];

    sort($nums);
    $ret = [];
    //三数和-2,四数和-3
    for ($i=0;$i < count($nums) - 3;$i++) {
      if ($i >0 && $nums[$i] == $nums[$i-1]) continue;//去重
      for ($j=$i+1;$j < count($nums) -2;$j++) {//三数和
        if ($j >$i+1 && $nums[$j] == $nums[$j-1]) continue;
        $left = $j+1;
        $right = count($nums) -1;
        while ($left < $right) {
          $sum = $nums[$i] + $nums[$j] + $nums[$left] + $nums[$right];
          if ($sum == $target) {
            array_push($ret,[$nums[$i] , $nums[$j] , $nums[$left] , $nums[$right]]);
            while($left < $right && $nums[$left] == $nums[$left + 1]) $left++;//指针移动时如有相同元素,去重
            while($left < $right && $nums[$right] == $nums[$right - 1]) $right--;
            $left++;
            $right--;
          } else if ($sum > $target) {
            $right--;
          } else {
            $left++;
          }
        }
      }  
    }
    return $ret;
  }
}