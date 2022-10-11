<?php

/**
 * 给你一个按照非递减顺序排列的整数数组 nums，和一个目标值 target。请你找出给定目标值在数组中的开始位置和结束位置。

如果数组中不存在目标值 target，返回[-1, -1]。

你必须设计并实现时间复杂度为O(log n)的算法解决此问题。


示例 1：

输入：nums = [5,7,7,8,8,10], target = 8
输出：[3,4]
示例2：

输入：nums = [5,7,7,8,8,10], target = 6
输出：[-1,-1]
示例 3：

输入：nums = [], target = 0
输出：[-1,-1]

 */

class Solution34 {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        if (empty($nums)) {
            return [-1,-1];
        }
        $first = $end = -1;
        $len = count($nums);
        for ($index=0; $index<$len; $index++) {
            if ($nums[$index] == $target && $first==-1) {
                $first = $index;
            }
            if ($nums[$index] == $target && $index>$end) {
                $end = $index;
            }
        }
        return [$first, $end];
    }

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange2($nums, $target) {
        $len = count($nums);
        $l = 0;
        $r = $len-1;
        $flag = false;

        while ($l<=$r) {
            // 当前中间位置
            $cur = floor(($r-$l)/2) + $l;
            if ($nums[$cur] == $target) {
                $flag = true;
                break;
            }elseif($nums[$cur] > $target) {
                $r = $cur-1;
            }else{
                $l = $cur+1;
            }
        }
        if (!$flag) {
            return [-1,-1];
        }
        // 指针指向目标位置，向两两侧分别查找
        $l=$r=$cur;
        while ($l > 0) {
            if ($nums[$l-1] == $target) {
                $l--;
            }else{
                break;
            }
        }
        while ($r < $len-1) {
            if ($nums[$l+1] == $target) {
                $r++;
            }else{
                break;
            }
        }
        return [$l, $r];
    }
}