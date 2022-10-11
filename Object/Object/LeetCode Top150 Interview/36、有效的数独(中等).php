<?php

/**
 * 请你判断一个 9 x 9 的数独是否有效。只需要 根据以下规则 ，验证已经填入的数字是否有效即可。

数字 1-9 在每一行只能出现一次。
数字 1-9 在每一列只能出现一次。
数字 1-9 在每一个以粗实线分隔的 3x3 宫内只能出现一次。（请参考示例图）
 

注意：

一个有效的数独（部分已被填充）不一定是可解的。
只需要根据以上规则，验证已经填入的数字是否有效即可。
空白格用 '.' 表示。

 */

class Solution36 {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $col = $row = $square = [];
        for ($i=0; $i<9;$i++) {
            for ($j=0;$j<9;$j++) {
                $val = $board[$i][$j];
                if ($val == '.') {
                    continue;
                }
                if (isset($col[$j][$val])) {
                    return false;
                }else{
                    $col[$j][$val] = 1;
                }
                if (isset($row[$i][$val])) {
                    return false;
                }else{
                    $row[$i][$val] = 1;
                }

                $squareIndex = (int)($i/3)*3 + (int)($j/3);
                if (isset($square[$squareIndex][$val])) {
                    return false;
                }else{
                    $square[$squareIndex][$val] = 1;
                }
            }
        }
        return true;
    }
}