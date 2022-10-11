<?php
/**
 * 将两个升序链表合并为一个新的 升序 链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。
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
class Solution21 {

    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
        if ($list1 == null) return $list2;
        if ($list2 == null) return $list1;

        if($list1->val < $list2->val) {
            $list1->next = $this->mergeTwoLists($list1->next, $list2);
            return $list1;
        }else{
            $list2->next = $this->mergeTwoLists($list1, $list2->next);
            return $list2;
        }
    }
}