<?php
/**
 * 给定一个包含 n + 1 个整数的数组 nums ，其数字都在 [1, n] 范围内（包括 1 和 n），可知至少存在一个重复的整数。

假设 nums 只有 一个重复的整数 ，返回 这个重复的数 。

你设计的解决方案必须 不修改 数组 nums 且只用常量级 O(1) 的额外空间。

 

示例 1：

输入：nums = [1,3,4,2,2]
输出：2
示例 2：

输入：nums = [3,1,3,4,2]
输出：3

 */

class Solution287 {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findDuplicate($nums) {
        $fast = $slow = 0;
        $slow = $nums[$slow];
        $fast = $nums[$nums[$fast]];

        while($slow != $fast) {
            $slow = $nums[$slow];
            $fast = $nums[$nums[$fast]];
        }

        $pre1 = 0;
        $pre2 = $slow;
        while($pre1 != $pre2) {
            $pre1 = $nums[$pre1];
            $pre2 = $nums[$pre2];
        }
        return $pre1;
    }
}