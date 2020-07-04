<?php
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}
 
// 92. 反转链表 II
class Solution {

  /**
   * @param ListNode $head
   * @param Integer $m
   * @param Integer $n
   * @return ListNode
   1 ≤ m ≤ n ≤ 链表长度。
   输入: 1->2->3->4->5->NULL, m = 2, n = 4 
   输出: 1->4->3->2->5->NULL
   */
  function reverseBetween($head, $m, $n) {
    $dummy = new ListNode(0);
    $dummy->next = $head;
    $p = $dummy;
    $cur = $dummy->next;
    //先找到反转的起点,从1开始
    for ($i = 1; $i < $m; $i++) {
      $p = $p->next;
      $cur = $cur->next;
    }
    // var_dump($p);
    // var_dump($cur);
    // //第一次循环变成13245,再一次就变成14325
    for ($i = 0; $i < $n - $m; $i++) {
      // 有一种斜向赋值的感觉,用完马上赋予新值
      $tmp = $cur->next;//存起来最后赋值,中间的全是->
      $cur->next = $tmp->next;
      $tmp->next = $p->next;
      // $tmp->next = $cur;//错误,因为cur一直没有更改
      $p->next = $tmp;//头指针指向末尾的那个
    }
    return $dummy->next;
  }
}

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

$l1 = createLinkedList([1,2,3,4,5]);

$solu = new Solution();
var_dump($solu->reverseBetween($l1, 2,4));