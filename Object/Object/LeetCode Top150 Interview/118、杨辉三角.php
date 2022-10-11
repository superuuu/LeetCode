<?php
/**
 * 给定一个非负整数 numRows，生成「杨辉三角」的前 numRows 行。
 * 在「杨辉三角」中，每个数是它左上方和右上方的数的和。
 */

class Solution118 {
    private $result= [];
    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        if ($numRows == 1) {
            $this->result = [[1]];
            return $this->result;
        }
        if ($numRows == 2) {
            $this->result = [[1], [1,1]];
            return $this->result;
        }
        for ($row=3; $row<$numRows; $row++) {
            for ($j=0; $j<$row; $j++) {
                if ($j==0 || $j==$row-1) {
                    $this->result[$row-1][$j] = 1;
                }else{
                    $this->result[$row-1][$j] = $this->result[$row-2][$j]+ $this->result[$row-2][$j-1];
                }
            }
        }
        return $this->result;
    }
}