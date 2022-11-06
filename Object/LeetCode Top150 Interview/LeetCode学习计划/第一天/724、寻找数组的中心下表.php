<?php
/**
 * 724. 寻找数组的中心下标
给你一个整数数组 nums ，请计算数组的 中心下标 。

数组 中心下标 是数组的一个下标，其左侧所有元素相加的和等于右侧所有元素相加的和。

如果中心下标位于数组最左端，那么左侧数之和视为 0 ，因为在下标的左侧不存在元素。这一点对于中心下标位于数组最右端同样适用。

如果数组有多个中心下标，应该返回 最靠近左边 的那一个。如果数组不存在中心下标，返回 -1 。
 */

class Solution724 {
    private $len = 0;
    private $nums = [];
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function pivotIndex($nums) {
        $len = count($nums);
        $total = array_sum($nums);
        $rightSum = $total-$nums[0]; // 假设中心下标是第一个元素
        $leftSum = 0;
        for($i=0; $i<$len; $i++){
            if($i==0) {
                if($rightSum==0){
                    return 0;
                }
                continue;
            }
            $rightSum-=$nums[$i];
            $leftSum+=$nums[$i-1];
            if($rightSum == $leftSum) {
                return $i;
            }
        }
        return -1;
    }
}