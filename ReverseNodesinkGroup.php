<?php

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

// 25. K 个一组翻转链表
class Solution {

  /**
   * @param ListNode $head
   * @param Integer $k
   * @return ListNode
   k个一组翻转链表
   给定这个链表：1->2->3->4->5

    当 k = 2 时，应当返回: 2->1->4->3->5
                          cur nxt    
    当 k = 3 时，应当返回: 3->2->1->4->5

   */
  function reverseKGroup($head, $k) {
    $node = $head;
    for ($i = 0; $i < $k; $i++) {
      if (!$node) return $head;//能否找齐一组
      $node = $node->next;
    }
    //反转前k个
    $new_head = $this->reverse($head, $node);//对象作为参数,修改属性
    //上一行其实已经把head修改为k个中最末尾节点,下一个指向的是null
    var_dump($head->next);//null
    $head->next = $this->reverseKGroup($node, $k);
    return $new_head;
  }

  function reverse($cur, $end) {
    $pre = null;
    //对链表节点判断是否相等
    while ($cur != $end) {
      //这4行是反转单链表逻辑
      $nxt = $cur->next;
      $cur->next = $pre;
      $pre = $cur;
      $cur = $nxt;
    }
    return $pre;
  }
}


/**
 * 构建一个单链表(将数组转换成链表)
 */
function createLinkedList($arr)
{
    $linkedList = [];
    $current = new ListNode(array_shift($arr)); //头节点
    while (!empty($arr)) {
        while ($current->next != null) {
            $linkedList[] = $current;
            $current = $current->next;
        }
        $current->next = new ListNode(array_shift($arr));
    }
    
    return $linkedList[0];
}
$l1 = createLinkedList([1,2,3,4,5,6,7,8,9]);


$solution = new Solution();
echo '<pre>';
print_r($solution->reverseKGroup($l1 , 3));