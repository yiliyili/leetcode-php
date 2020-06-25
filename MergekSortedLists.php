<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
// 23. 合并K个排序链表
class Solution {

  /**
   * @param ListNode[] $lists
   * @return ListNode
   [
      1->4->5,
      1->3->4,
      2->6
   ]
   输出: 1->1->2->3->4->4->5->6
   */
  //也可以使用优先队列做
  function mergeKLists($lists) {
    $dummyhead = new ListNode(0);
    $current = $dummyhead;
    $pq = new SplMinHeap;//小顶堆
    if (!empty($lists)) {
      foreach ($lists as $l) {
        $pq->insert($l);//建堆
      }
    }
    while (!$pq->isEmpty()) {
      $l = $pq->top();
      $pq->next();
      if ($l->next != null) {
        $pq->insert($l->next);//重建堆
      }
      if ($l) {
        $current->next = $l;
        $current = $current->next;
      }
    }
    return $dummyhead->next;
  }
}
