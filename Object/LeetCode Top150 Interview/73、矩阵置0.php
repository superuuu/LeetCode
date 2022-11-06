<?php
/**
 * 给定一个 m x n 的矩阵，如果一个元素为 0 ，则将其所在行和列的所有元素都设为 0 。请使用 原地 算法。
 *
 * 输入：matrix = [[1,1,1],[1,0,1],[1,1,1]]
 * 输出：[[1,0,1],[0,0,0],[1,0,1]]
 *
 */

class Solution73 {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {
        $zeroRows = $zeroCol = [];
        foreach($matrix as $row => $oneArr) {
            if(in_array(0, $oneArr)) {
                $zeroRows[] = $row;
                foreach($oneArr as $col => $val) {
                    if($val == 0) {
                        $zeroCol[] = $col;
                    }
                }
            }
        }
        foreach($matrix as $oneRow => &$arr) {
            if(in_array($oneRow, $zeroRows)) {
                foreach($arr as $i =>$one){
                    $arr[$i] = 0;
                }
            }else{
                foreach($arr as $index => $one) {
                    if(in_array($index, $zeroCol)) {
                        $arr[$index] = 0;
                    }
                }
            }
        }
        return $matrix;

    }
}