<?php

/**
 *
 * 给定一个整数数组 nums 和一个整数目标值 target，请你在该数组中找出 和为目标值 target  的那 两个 整数，并返回它们的数组下标。
 * 你可以假设每种输入只会对应一个答案。但是，数组中同一个元素在答案里不能重复出现。
 * 你可以按任意顺序返回答案。
 *
 */

class SolutionSum {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $len = count($nums);
        for ($i=0; $i<$len-1; $i++) {
            for ($j=$i+1; $j<$len; $j++) {
                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }
            }
        }
    }

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function two_sum_2($nums, $target)
    {
        $temp = [];
        foreach ($nums as $key => $value) {
            if (array_key_exists($target-$value, $temp)) {
                return [$key, $temp[$target-$value]];
            }
            $temp[$value] = $key;
        }
    }
}