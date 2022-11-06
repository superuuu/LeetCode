<?php

/**
 * 给定一个大小为 n 的数组 nums ，返回其中的多数元素。多数元素是指在数组中出现次数 大于 ⌊ n/2 ⌋ 的元素。

你可以假设数组是非空的，并且给定的数组总是存在多数元素。

 

示例 1：

输入：nums = [3,2,3]
输出：3
示例 2：

输入：nums = [2,2,1,1,1,2,2]
输出：2
 

提示：
n == nums.length
1 <= n <= 5 * 104
-109 <= nums[i] <= 109
 

进阶：尝试设计时间复杂度为 O(n)、空间复杂度为 O(1) 的算法解决此问题。

 */

class Solution169 {

    /**
     * 思路：多数元素嘛
     * 第一个元素占山为王
     * 第二个元素是不是一伙的，是+1，不是，判断当前的【王】还有没，没有，换主，有-1
     * 活到最后的就是目标
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $flag = $nums[0];
        $count = 1;
        $len = count($nums);
        for($i=1; $i<$len; $i++) {
            if($nums[$i] == $flag) {
                $count++;
            }else{
                if($count > 0) {
                    $count--;
                }else{
                    $flag = $nums[$i];
                }
            }
        }
        return $flag;
    }
}