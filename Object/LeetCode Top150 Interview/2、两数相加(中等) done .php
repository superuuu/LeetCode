<?php

/**
 *
 * 给你两个非空 的链表，表示两个非负的整数。它们每位数字都是按照逆序的方式存储的，并且每个节点只能存储一位数字。
 * 请你将两个数相加，并以相同形式返回一个表示和的链表。
 * 你可以假设除了数字 0 之外，这两个数都不会以 0开头。
 *
 * 输入：l1 = [2,4,3], l2 = [5,6,4]
 * 输出：[7,0,8]
 * 解释：342 + 465 = 807.
 *
 */

/**
 *
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 *
 */
class Solution2 {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        if ($l1 === null) {
            return $l2;
        }
        if ($l2 === null) {
            return $l1;
        }

        $carry = 0;
        $newHead = new ListNode(0);
        $cur = $newHead;
        while ($l1 != null || $l2 != null || $carry) {
            // 最后一位计算完如果有进1赋值给sum
            $sum = $carry;
            if ($l1 != null) {
                $sum += $l1->val;
                $l1 = $l1->next;
            }
            if ($l2 != null) {
                $sum += $l2->val;
                $l2 = $l2->next;
            }
            $carry = intval($sum>=10);
            $node = new ListNode($sum % 10);
            $cur->next = $node;
            $cur = $cur->next;
        }
        return $newHead->next;
    }
}