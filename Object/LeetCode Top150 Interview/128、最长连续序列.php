<?php
/**
 * 给定一个未排序的整数数组 nums ，找出数字连续的最长序列（不要求序列元素在原数组中连续）的长度。

请你设计并实现时间复杂度为O(n) 的算法解决此问题。

示例 1：

输入：nums = [100,4,200,1,3,2]
输出：4
解释：最长数字连续序列是 [1, 2, 3, 4]。它的长度为 4。
示例 2：

输入：nums = [0,3,7,2,5,8,4,6,0,1]
输出：9

提示：

0 <= nums.length <= 105
-109 <= nums[i] <= 109

 */
class Solution128 {

    // 09.22 复习一次

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums) {
        if (empty($nums)) {
            return 0; // 处理输入为空的情况
        }
        // 哈希表记录出现过的元素
        $hashMap = [];
        foreach ($nums as $n){
            $hashMap[$n] = 1;
        }
        $res = 1;
        foreach ($nums as $k => $v) {
            // 如果出现比当前数字小的，跳过
            if (isset($hashMap[$k-1])) {
                continue;
            }
            $tempLen = 1;
            $curNum = $k;
            // 循环查找比当前值大1的元素，直到找不到
            while (isset($hashMap[$curNum+1])) {
                $tempLen++;
                $curNum++;
            }
            // 看当前连续长度和历史长度取大值
            $res = max($res, $tempLen);
        }
        return $res;
    }
}
