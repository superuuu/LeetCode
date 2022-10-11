<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @desc 快慢指针
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        $newHead = new ListNode(0);
        $newHead->next = $head;
        $fast = $slow = $newHead;
        for ($i=0;$i<$n; $i++) {
            $fast = $fast->next;
        }
        while($fast->next != null) {
            $fast = $fast->next;
            $slow = $slow->next;
        }
        $slow->next = $slow->next->next;
        return $newHead->next;
    }

    /**
     * @desc 计算长度后遍历删除
     * @param $head
     * @param $n
     * @return mixed
     */
    function remove2($head, $n) {
        $newHead = new ListNode(0);
        $newHead->next = $cur = $head;
        // 链表长度
        $len = 0;
        while($cur != null) {
            $cur = $cur->next;
            $len++;
        }
        $times = $len-$n;
        $point = $newHead;
        for($i=0; $i<$times; $i++) {
            $point = $point->next;
        }
        $point->next = $point->next->next;
        return $newHead->next;
    }
}