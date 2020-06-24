<?php

class Solution {

  /**
   * @param Integer[] $nums1
   * @param Integer[] $nums2
   * @return Float

  给定两个大小为 m 和 n 的有序数组 nums1 和 nums2。
  请你找出这两个有序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。

  [1, 2, 3, 5]

  [4, 6, 7, 8, 9]


  [1, 2, 3, 4, 5, 6, 7, 8, 9]

   */
  function findMedianSortedArrays($nums1, $nums2) {
    if (count($nums1) > count($nums2)) {
      return $this->findMedianSortedArrays($nums2,$nums1);//调换位置,重新调用一次,确保第一个是小数组
    }
    if (count($nums1) == 0) {
      //非整除要用floor,奇偶进行统一 测试了不要floor也行,下标非整数php底层会处理
      return floor($nums2[(count($nums2) -1) / 2] + $nums2[count($nums2) / 2]) / 2;
    }
    $len = count($nums1) + count($nums2);
    $cutMiddle1= $cutMiddle2 = $cutL = 0;
    $cutR = count($nums1);
    while ($cutMiddle1 <= count($nums1)) {
      //切分点 注意两个数组的切分下标往往是不同的
      $cutMiddle1 = floor(($cutR - $cutL) / 2) + $cutL;//避免溢出的二分
      $cutMiddle2 = floor($len / 2) - $cutMiddle1;//长数组根据第一个的切分点找自己的切分点,确保2个数组的左半边和右半边元素数量尽可能相等,原因见题解
      //切开后元素相对位置,需要尽量找到l1小于r2
      //...l1  r1...
      //...l2  r2...

      $l1 = ($cutMiddle1 == 0) ? PHP_INT_MIN : $nums1[$cutMiddle1 - 1];//是否分割到了两端,用极小值表示,分割线左边元素,故减1,向下取,下边就可以不用减
      $l2 = ($cutMiddle2 == 0) ? PHP_INT_MIN : $nums2[$cutMiddle2 - 1];
      $r1 = ($cutMiddle1 == count($nums1)) ? PHP_INT_MAX : $nums1[$cutMiddle1];//上边-1这里就不用减
      $r2 = ($cutMiddle2 == count($nums2)) ? PHP_INT_MAX : $nums2[$cutMiddle2];

      if ($l1 > $r2) {//l1大了,说明短数组nums1需要往左边去重新做切分
        $cutR = $cutMiddle1 -1;
      } else if ($l2 > $r1) {//r1比较小,切分需要右移
        $cutL = $cutMiddle1 + 1;
      } else { //切分对了
        if ($len % 2 == 0) {//总长度偶数, l部分选最大的,r部分选最小的
          $l1 = $l1 > $l2 ? $l1 : $l2;
          $r1 = $r1 < $r2 ? $r1 : $r2;
                    return ($l1 + $r1) / 2;//相加取一半
        }
        return min($r1,$r2);//因为之前是向下取,奇数的话在右半部分找较小值,可以自测验证
      }
    }
  }
}

$nums1 = [1,3,5];
$nums2 = [2,4,6,8];
echo '<pre>';

$solu = new Solution();
var_dump( $solu->findMedianSortedArrays($nums1, $nums2));