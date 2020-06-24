<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

  /**
   * @param ListNode $l1
   * @param ListNode $l2
   * @return ListNode
  
    (2 -> 4 -> 2)

 +  (5 -> 6 -> 7)
 
    7 0 0 1

   */
  function addTwoNumbers($l1, $l2) {
    $add = 0;
    $list = new ListNode(0);//增加一个当前虚拟头结点
    $cur = $list;//相当于复制一个指针,list始终指向虚拟头结点,只是cur在不断变化

    while ($l1 || $l2) {
      $x = $l1 != null ? $l1->val : 0;
      $y = $l2 != null ? $l2->val : 0;

      $val = ($x + $y + $add) % 10;

      $add = floor(($x + $y + $add ) / 10);//有没有进位

      $new = new ListNode($val);
      $cur->next = $new;
      $cur = $cur->next; 

      if ($l1 != null) {//l1没到尾部
        $l1 = $l1->next;
      }
      if ($l2 != null) {
        $l2 = $l2->next;
      }
    }
    if ($add > 0) {//可能最后一个链表要进位
      $cur->next = new ListNode($add);
    }
    return $list->next;

  }
}