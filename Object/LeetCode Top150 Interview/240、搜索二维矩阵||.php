<?php
/**
 * 编写一个高效的算法来搜索 m x n 矩阵 matrix 中的一个目标值 target 。该矩阵具有以下特性：

每行的元素从左到右升序排列。
每列的元素从上到下升序排列。

 *
 * 输入：matrix = [[1,4,7,11,15],[2,5,8,12,19],[3,6,9,16,22],[10,13,14,17,24],[18,21,23,26,30]], target = 5
输出：true

 */

class Solution240 {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        //$matrix = [[-1,3]];
        //$target=3;
        $row = count($matrix);
        $col = count($matrix[0]);
        $minRow = 0;
        $maxRow = $row-1;
        while($minRow <=$maxRow) {
            $mid = $minRow + round(($maxRow-$minRow)/2);
            if($matrix[$mid][0] == $target) {
                return true;
            }elseif($matrix[$mid][0] > $target) {
                $maxRow = $mid-1;
            }else{
                $minRow = $mid+1;
            }
        }
        //echo $maxRow.PHP_EOL;
        for($r=0;$r<=$maxRow;$r++){
            if($matrix[$r][$col-1] < $target) {
                continue;
            }
            $minCol = 0;
            $maxCol = $col-1;
            while($minCol <= $maxCol) {
                $mid = $minCol + round(($maxCol-$minCol)/2);
                if($matrix[$r][$mid] == $target) {
                    return true;
                }elseif($matrix[$r][$mid] < $target) {
                    $minCol = $mid+1;
                }else{
                    $maxCol = $mid-1;
                }
            }
        }
        return false;
    }
}

