<?php
/**
 * 给定一个长度为 n 的整数数组height。有n条垂线，第 i 条线的两个端点是(i, 0)和(i, height[i])。
 * 找出其中的两条线，使得它们与x轴共同构成的容器可以容纳最多的水。
 * 返回容器可以储存的最大水量。
 * 说明：你不能倾斜容器。
 */

class Solution11 {

    /**
     * @desc 双指针走起
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $left = 0;
        $right = count($height)-1;

        $max = 0;
        while($left < $right) {
            $area = min($height[$left], $height[$right]) * ($right - $left);
            $max = max($max, $area);
            if ($height[$left] <= $height[$right]) {
                $left++;
            }else{
                $right--;
            }
        }
        return $max;
    }
}