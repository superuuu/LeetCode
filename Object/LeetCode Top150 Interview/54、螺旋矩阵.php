<?php
/**
 * 54. 螺旋矩阵
给你一个 m 行 n 列的矩阵 matrix ，请按照 顺时针螺旋顺序 ，返回矩阵中的所有元素。

示例 1：
输入：matrix = [[1,2,3],[4,5,6],[7,8,9]]
输出：[1,2,3,6,9,8,7,4,5]
 */

class Solution54 {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        $rows = count($matrix);
        $cols = count($matrix[0]);
        if($rows<1 || $cols<1) return [];

        $top = $left = 0;
        $bottom = $rows-1;
        $right  = $cols-1;

        $res = [];
        while($left<=$right && $top<=$bottom){
            for($column=$left; $column<=$right; $column++){
                $res[] = $matrix[$top][$column];
            }
            for($row=$top+1; $row<=$bottom; $row++){
                $res[] = $matrix[$row][$right];
            }
            if($left<$right && $top<$bottom){
                for($column=$right-1;$column>$left;$column--){
                    $res[] = $matrix[$bottom][$column];
                }
                for($row=$bottom; $row>$top;$row--){
                    $res[] = $matrix[$row][$left];
                }
            }
            $left++;
            $top++;
            $right--;
            $bottom--;
        }
        return $res;
    }
}