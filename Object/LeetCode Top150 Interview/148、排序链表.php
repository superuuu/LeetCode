<?php
/**
 * 给你链表的头结点 head ，请将其按 升序 排列并返回 排序后的链表 。
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
class Solution148 {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function sortList($head) {
        $arr = [];
        $temp = $head;
        while($head) {
            $arr[] = $head->val;
            $head = $head->next;
        }
        sort($arr);
        $head = $temp;
        $i=0;
        while($head) {
            $head->val=$arr[$i++];
            $head = $head->next;
        }
        return $temp;
    }
}