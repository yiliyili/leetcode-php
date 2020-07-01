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
给出一个无重叠的 ，按照区间起始端点排序的区间列表。

在列表中插入一个新的区间，你需要确保列表中的区间仍然有序且不重叠（如果有必要的话，可以合并区间）。

 输入: intervals = [[1,2],[3,5],[6,7],[8,10],[12,16],[17,18]], newInterval = [4,8]
 输出: [[1,2],[3,10],[12,16]]
 */
// 57. 插入区间
class Solution {
//有一种做法是先插入,后排序,然后和56题一样
  /**
   * @param Interval[] $intervals
   * @param Interval $newInterval
   * @return Interval[]
   */
  function insert($intervals, $newInterval) {
    $ret = [];
    $start = $newInterval[0];
    $end = $newInterval[1];
    foreach ($intervals as $interval) {
      if ($interval[0] > $end) {//start大于end,说明不重合,比如这里的[12,16]
        array_push($ret, [$start, $end]);
        $start = $interval[0];
        $end = $interval[1];
      }

      if ($interval[0] > $end || $interval[1] < $start) {//不重合
        array_push($ret, $interval);
      } else {
        //算出来了但是暂时没有加入
        $start = min($start, $interval[0]);//更新重合后的start和end
        $end = max($end, $interval[1]);
      }
    }
    array_push($ret, [$start, $end]);//把最后的一个加入
    return $ret;
  }
}
