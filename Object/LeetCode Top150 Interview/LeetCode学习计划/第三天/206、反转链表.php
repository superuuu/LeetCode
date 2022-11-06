<?php
/**
 * 给你单链表的头节点 head ，请你反转链表，并返回反转后的链表。
 */

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
class Solution206 {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        if($head === null) {
            return $head;
        }
        $pre = null;
        $cur = $head;
        while($cur) {
            $next = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $next;
        }
        return $pre;
    }
}