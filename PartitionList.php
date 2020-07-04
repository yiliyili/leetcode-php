<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
// 86. 分隔链表
class Solution {


  /**
   * @param ListNode $head
   * @param Integer $x
   * @return ListNode
   *
   * @github https://github.com/yumindayu/leetcode-php

   输入: head = 1->4->3->2->5->2, x = 3  4和3的相对顺序不能改
   输出: 1->2->2->4->3->5
   */
  //2个辅助链表
  function partition($head, $x) {
    $smallHead = new ListNode(0);
    $bigHead = new ListNode(0);
    $small = $smallHead;
    $big = $bigHead;
    while ($head) {
      $tmp = new ListNode($head->val);
      if ($head->val < $x) {
        $small->next = $tmp;
        $small = $small->next;
      } else {
        $big->next = $tmp;
        $big = $big->next;
      }
      $head = $head->next;
    }
    $small->next = $bigHead->next;
    return $smallHead->next;

  }
}