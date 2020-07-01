<?php

class ListNode {
   public $val = 0;
   public $next = null;
   function __construct($val) { $this->val = $val; }
}
 
// 82. 删除排序链表中的重复元素 II
class Solution {

  /**
   * @param ListNode $head
   * @return ListNode

   输入: 1->2->3->3->3->4->4->5
   输出: 1->2->5

   */
  //虚拟头结点
  function deleteDuplicates($head) {
    if (!$head) return null;
    $dummy = new ListNode(0);
    $dummy->next = $head;
    $p = $dummy;
    while ($p->next && $p->next->next) {
      if ($p->next->val == $p->next->next->val) {
        $num = $p->next->val;//先记下来
//首次循环本来就是相等,相当于把第一个重复值去掉,后续等于$num的也会去掉
        while ($p->next && $p->next->val == $num) {//不断检查
          $p->next = $p->next->next;
        }
      } else {
        $p = $p->next;
      }
    }
    return $dummy->next;
  }
}