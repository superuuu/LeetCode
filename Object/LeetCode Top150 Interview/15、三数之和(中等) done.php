<?php

/**
 * 给你一个整数数组 nums ，判断是否存在三元组 [nums[i], nums[j], nums[k]] 满足 i != j、i != k 且 j != k ，同时还满足 nums[i] + nums[j] + nums[k] == 0 。请

 * 你返回所有和为 0 且不重复的三元组。

 * 注意：答案中不可以包含重复的三元组。

 * 示例 1：

 * 输入：nums = [-1,0,1,2,-1,-4]
 * 输出：[[-1,-1,2],[-1,0,1]]
 * 解释：
 * nums[0] + nums[1] + nums[2] = (-1) + 0 + 1 = 0 。
 * nums[1] + nums[2] + nums[4] = 0 + 1 + (-1) = 0 。
 * nums[0] + nums[3] + nums[4] = (-1) + 2 + (-1) = 0 。
 * 不同的三元组是 [-1,0,1] 和 [-1,-1,2] 。
 * 注意，输出的顺序和三元组的顺序并不重要。
 *
 * 示例 2：

输入：nums = [0,1,1]
输出：[]
解释：唯一可能的三元组和不为 0 。
示例 3：

输入：nums = [0,0,0]
输出：[[0,0,0]]
解释：唯一可能的三元组和为 0 。
 

提示：

3 <= nums.length <= 3000
-105 <= nums[i] <= 105

 */

class Solution15 {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        $res = [];
        $len = count($nums);
        if (empty($nums) || $len < 3) {
            return $res;
        }
        sort($nums);
        for($i=0; $i<$len; $i++) {
            // 升序排序后第一个数就大于0，直接结束
            if($nums[$i] > 0) {
                return $res;
            }
            // 过滤掉重复数据
            if($i > 0 && $nums[$i] == $nums[$i-1]) {
                continue;
            }
            // 左指针
            $left = $i+1;
            // 右指针
            $right = $len - 1;

            while($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                if( $sum > 0) {
                    $right = $right-1;
                }elseif($sum < 0) {
                    $left = $left + 1;
                }else{
                    $res[] = [$nums[$i], $nums[$left], $nums[$right]];
                    // 跳过当前答案的重复值
                    while($left < $right && $nums[$left] == $nums[$left+1])    $left++;
                    while($left < $right && $nums[$right] == $nums[$right-1])  $right--;
                    // 找到目标后，调整当前左右指针位置，左指针右移，b变大，有指针左移，c变小
                    $left++;
                    $right--;
                }
            }
        }
        return $res;
    }
}
