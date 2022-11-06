<?php
/**
 * 将两个升序链表合并为一个新的 升序 链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。 

 

示例 1：


输入：l1 = [1,2,4], l2 = [1,3,4]
输出：[1,1,2,3,4,4]
示例 2：

输入：l1 = [], l2 = []
输出：[]

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
        if($list1 === null) {
            return $list2;
        }
        if($list2 === null) {
            return $list1;
        }
        $cur = $head = new ListNode(0);
        while($list1 !== null || $list2 !== null) {
            if($list1->val <= $list2->val) {
                $node = new ListNode($list1->val);
                $list1 = $list1->next;
                $cur->next = $node;
                $cur = $cur->next;
            }else{
                $node = new ListNode($list2->val);
                $list2 = $list2->next;
                $cur->next = $node;
                $cur = $cur->next;
            }
            if($list1 === null) {
                $cur->next = $list2;
                break;
            }
            if($list2 === null) {
                $cur->next =$list1;
                break;
            }
        }
        return $head->next;
    }
}