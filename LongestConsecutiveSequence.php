<?php
// 128. 最长连续序列
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php
   
  O(n)时间复杂度

   输入: [100, 4, 200, 1, 3, 2, 1]
   输出: 4
   解释: 最长连续序列是 [1, 2, 3, 4]。它的长度为 4。
  
   100 -> 1 
   4 -> 4
   200 -> 1
   1 -> 4
   3 -> 2 
   2 -> left_length 1  right_length 2  1 + 1 + 2 = 4

   2 + right_length 可以得到4

   */
  function longestConsecutive($nums) {
    if (!$nums) return 0;
    $array = [];//空间换时间
    $max = 1;
    for ($i = 0; $i < count($nums); $i++) {
      if (!isset($array[$nums[$i]])) {//重复数字直接跳过
        $left_length = 0;
        $right_length = 0;
        //找左右值并更新长度
        if (isset($array[$nums[$i] - 1])) {//左边是否存在
          $left_length = $array[$nums[$i] - 1];
        } 
        if (isset($array[$nums[$i] + 1])) {
          $right_length = $array[$nums[$i] + 1];
        } 
        $cur_length = $left_length + $right_length + 1;//当前序列长度是左边+右边长度+1
        $max = max($max, $cur_length);
        $array[$nums[$i]] = $cur_length;//赋值
        // 更新序列左右边界的值,中间的因为不会再使用到,所以不更新
        if (isset($array[$nums[$i] - $left_length])) {//序列左边界的值进行更新
          $array[$nums[$i] - $left_length] = $cur_length;
        }
        if (isset($array[$nums[$i] + $right_length])) {//序列右边界的值进行更新
          $array[$nums[$i] + $right_length] = $cur_length;
        }
      }
    }
    return $max;
  }

     /**
      * 时间复杂度O(n+2m)m为数组中不重复的value数量
1.将整数数据作为内存地址指针(同hash表)
2.遍历获取没有前驱的二维数组的长度
3.获取最大长度
     * @param Integer[] $nums
     * @return Integer
     */
    //更容易理解
    function longestConsecutive2($nums) {
        if(!$nums)return 0;
        $arr=[];
        //value作为key,将数据作为内存地址指针
        foreach($nums as $k=>$v){
            $arr[$v]=true;
        }
        $j=0;
        $dp=[];
        foreach ( $arr as $k=>$v){
            $i=0;
            //不存在前驱则开始记录
            $dp[$j]=0;
            while(!isset($arr[$k-1])){//有前驱的就先跳过,因为肯定会遍历到那个前驱数,从这里开始肯定不是最长连续的
                if(isset($arr[$k+1+$i])){
                    $dp[$j]++;
                }else{
                    // if($dp[0]<$dp[$j]){
                    //     $dp[0]=$dp[$j];
                    // }
                    $j++;
                    break;
                }
                $i++;
            }
        }
        return max($dp)+1;
        // return $dp[0]+1;
    }



}