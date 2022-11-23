<?php
/**
 * 给你一个长度为 n 的整数数组nums和 一个目标值target。请你从 nums 中选出三个整数，使它们的和与target最接近。

返回这三个数的和。

假定每组输入只存在恰好一个解。



示例 1：

输入：nums = [-1,2,1,-4], target = 1
输出：2
解释：与 target 最接近的和是 2 (-1 + 2 + 1 = 2) 。
示例 2：

输入：nums = [0,0,0], target = 1
输出：0

 */

class Solution16 {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {
        sort($nums);
        $res = $nums[0]+$nums[1]+$nums[2];
        $len = count($nums);
        for($i=0; $i<$len; $i++){
            $left = $i+1;
            $right = $len-1;
            while($left < $right) {
                $sum = $nums[$i]+$nums[$left]+$nums[$right];
                if(abs($sum-$target) < abs($res-$target)) {
                    $res = $sum;
                }
                if($sum > $target) {
                    $right -= 1;
                }else{
                    $left += 1;
                }
            }
        }
        return $res;
    }
}