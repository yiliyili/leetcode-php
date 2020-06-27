<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
// 24. 两两交换链表中的节点
class Solution {

  /**
   * @param ListNode $head
   * @return ListNode
  
   两两交换链表中的节点
   给定 1->2->3->4, 你应该返回 2->1->4->3.

         node1   node2  next
   dummy-> 1   ->  2 ->  3 ->  4 ->  5
                
   dummy-> 2 -> 1 -> 3 -> 4 -> 5
   
   */
  function swapPairs($head) {
    $dummyhead = new ListNode(0);
    $dummyhead->next = $head;
    $q = $dummyhead;//当前节点
    while ($q->next && $q->next->next) {
      //定3个节点,见上边注释三个节点是连续的
      $node1 = $q->next;
      $node2 = $node1->next;
      $next = $node2->next;
      //建环
      $node2->next = $node1;
      $node1->next = $next;
      $q->next = $node2;
      //指针右移2位,下一次循环node1就在3,node2在4
      $q = $node1;
    }
    return $dummyhead->next;
  }

  //递归版本
  // public ListNode swapPairs(ListNode head) {
  //     if(head == null || head.next == null){
  //         return head;
  //     }
  //     ListNode next = head.next;
  //     head.next = swapPairs(next.next);
  //     next.next = head;
  //     return next;
  // }


}