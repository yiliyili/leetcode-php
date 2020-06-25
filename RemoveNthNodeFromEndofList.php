<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
// 19. 删除链表的倒数第N个节点
class Solution {
  /**
   * @param ListNode $head
   * @param Integer $n
   * @return ListNode
   */
  function removeNthFromEnd($head, $n) {
    $dummy = new ListNode(0);
    $dummy->next = $head;
    $p = $dummy;
    $q = $dummy;
    //快指针先走n步
    for ($i=0;$i<=$n;$i++) {
      $q = $q->next;
    }
    while($q) {//快指针到头
      $p = $p->next;
      $q = $q->next;
    }
    $p->next = $p->next->next;//慢指针做删除
    return $dummy->next;
  }
}