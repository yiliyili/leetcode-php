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
   反转从位置 m 到 n 的链表。请使用一趟扫描完成反转。
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
      $p = $p->next;//是cur的前一个
      $cur = $cur->next;
    }
    // var_dump($p);
    // var_dump($cur);
    // //第一次循环变成13245,再一次就变成14325
    for ($i = 0; $i < $n - $m; $i++) {
      // var_dump($cur);
      // var_dump($p);
      //注意cur的值一直没有变,值是2,p也没有变,值是1,变的是他们的next
      // 有一种斜向赋值的感觉,用完马上赋予新值
      $tmp = $cur->next;//存起来最后赋值,中间的全是->
      $cur->next = $tmp->next;
      $tmp->next = $p->next;
      // $tmp->next = $cur;//错误,因为cur一直没有更改
      $p->next = $tmp;//头指针指向末尾的那个
    }
    return $dummy->next;
  }


  //不需要虚拟头结点的反转
  function reverseBetween2($head, $m, $n) {
    if ($head == null) {
          return null;
      }
    $prev = null;
    $cur = $head;
    while ($m > 1) {
        $prev = $cur;
        $cur = $cur->next;
        $m--;
        $n--;
    }
    //记录这两个节点
    $con = $prev; $tail = $cur;
    while ($n > 0) {
        $tmp = $cur->next;
        $cur->next = $prev;
        $prev = $cur;//最后是把4这个值对应的节点赋给了$prev
        $cur = $tmp;//5这个值对应的节点
        $n--;
    }
    //更改反转的头部指向
    if ($con != null) {
        $con->next = $prev;
    } else {
//[3,5]  1  2这种是m为1 并不会进入第一个循环,那么$con = $prev=null
        $head = $prev;
    }
    //更改反转的尾部指向
    $tail->next = $cur;
    return $head;
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