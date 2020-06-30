<?php
/**
 * Definition for an interval.
 * class Interval {
 *     public $start = 0;
 *     public $end = 0;
 *     function __construct(int $start = 0, int $end = 0) {
 *         $this->start = $start;
 *         $this->end = $end;
 *     }
 * }

 输入: [[1,3],[2,6],[8,10],[15,18]]
 输出: [[1,6],[8,10],[15,18]]
 解释: 区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].


 [[1,4],[0,4]]
 */
// 56. 合并区间
class Solution {

  /**
   * @param Interval[] $intervals
   * @return Interval[]
   */
  function merge($intervals) {
      if(count($intervals)<1) return [];
      // 默认二维数组排序，是根据一维数组的第一个值进行排序的
      sort($intervals);
      $j = 0;
      $ans[$j] = $intervals[0];
      for($i=1;$i<count($intervals);$i++){
          $start = $intervals[$i][0];//2  8
          $end = $intervals[$i][1];//6    10
          if($start<=$ans[$j][1]){//说明可以合并
              $ans[$j] = [$ans[$j][0],max($ans[$j][1],$end)];
          }else{
              $j++;
              $ans[$j] = $intervals[$i];
          }
      }
      return $ans;
  }
}

$solu = new Solution();
print_r($solu->merge([[1,3],[2,6],[8,10],[15,18]]));
