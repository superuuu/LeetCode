<?php

/**
 * 给你一个由 n 个整数组成的数组 nums ，和一个目标值 target 。请你找出并返回满足下述全部条件且不重复的四元组 [nums[a], nums[b], nums[c], nums[d]] （若两个四元组元素一一对应，则认为两个四元组重复）：

0 <= a, b, c, d < n
a、b、c 和 d 互不相同
nums[a] + nums[b] + nums[c] + nums[d] == target
你可以按 任意顺序 返回答案 。

 

示例 1：

输入：nums = [1,0,-1,0,-2,2], target = 0
输出：[[-2,-1,1,2],[-2,0,0,2],[-1,0,0,1]]
示例 2：

输入：nums = [2,2,2,2,2], target = 8
输出：[[2,2,2,2]]

 */

class Solution18 {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target) {
        // 不满足条件
        $len = count($nums);
        if($len < 4){
            return [];
        }
        sort($nums);

        $res = [];
        for($i=0; $i<$len; $i++){
            // 跳过重复答案
            if($i>0 && $nums[$i]==$nums[$i-1]) continue;
            // 最大值小于目标值，跳过循环继续搜索更大值
            $max = $nums[$i]+$nums[$len-1]+$nums[$len-2]+$nums[$len-3];
            if($max < $target) continue;
            // 最小值大于目标值，无答案了，break
            $min = $nums[$i]+$nums[$i+1]+$nums[$i+2]+$nums[$i+3];
            if($min > $target) break;
            for($j=$i+1; $j<$len-2; $j++){
                // 跳过重复答案
                if($j>$i+1 && $nums[$j]==$nums[$j-1]) continue;
                // 最大值小于目标值，跳过循环继续搜索更大值
                $max = $nums[$i]+$nums[$j]+$nums[$len-1]+$nums[$len-2];
                if($max < $target) continue;
                // 最小值大于目标值，无答案了，break
                $min = $nums[$i]+$nums[$j]+$nums[$j+1]+$nums[$j+2];
                if($min > $target) break;
                // 左右指针
                $left = $j+1;
                $right = $len-1;
                while($left < $right) {
                    $sum = $nums[$i]+$nums[$j]+$nums[$left]+$nums[$right];
                    if($sum == $target) {
                        $res[] = [$nums[$i],$nums[$j],$nums[$left],$nums[$right]];
                        $left+=1;
                        while($left<$right && $nums[$left]==$nums[$left-1]) $left++;
                        $right-=1;
                        while($left<$right && $j<$right && $nums[$right]==$nums[$right+1]) $right--;
                    }elseif($sum > $target) {
                        $right -= 1;
                    }else{
                        $left +=1;
                    }
                }
            }
        }
        return $res;
    }
}