<?php
/**
 * 给定一个包含红色、白色和蓝色、共n 个元素的数组nums，原地对它们进行排序，使得相同颜色的元素相邻，并按照红色、白色、蓝色顺序排列。

我们使用整数 0、1 和 2 分别表示红色、白色和蓝色。

必须在不使用库的sort函数的情况下解决这个问题。

示例 1：

输入：nums = [2,0,2,1,1,0]
输出：[0,0,1,1,2,2]
示例 2：

输入：nums = [2,0,1]
输出：[0,1,2]
 

提示：

n == nums.length
1 <= n <= 300
nums[i] 为 0、1 或 2

 */
class Solution75 {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
        $index=0;
        $len = count($nums);
        for($i=0;$i<$len;$i++) {
            if($nums[$i] == 0) {
                if($i == $index){
                    $index++;
                    continue;
                }
                $temp = $nums[$index];
                $nums[$index] = $nums[$i];
                $nums[$i] = $temp;
                $index++;
            }
        }
        for($j = $index; $j<$len; $j++) {
            if($nums[$j] == 1) {
                if($j == $index) {
                    $index++;
                    continue;
                }
                $temp = $nums[$index];
                $nums[$index] = $nums[$j];
                $nums[$j] = $temp;
                $index++;
            }
        }
        return $nums;
    }
    /**
     * 执行用时：8 ms, 在所有 PHP 提交中击败了70.37%的用户
     * 内存消耗：18.4 MB, 在所有 PHP 提交中击败了98.15%的用户
     * 通过测试用例：87 / 87
     */
}
