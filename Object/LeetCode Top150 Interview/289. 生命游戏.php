<?php
/**
 * 根据 百度百科 ， 生命游戏 ，简称为 生命 ，是英国数学家约翰·何顿·康威在 1970 年发明的细胞自动机。

给定一个包含 m × n 个格子的面板，每一个格子都可以看成是一个细胞。每个细胞都具有一个初始状态： 1 即为 活细胞 （live），或 0 即为 死细胞 （dead）。每个细胞与其八个相邻位置（水平，垂直，对角线）的细胞都遵循以下四条生存定律：

如果活细胞周围八个位置的活细胞数少于两个，则该位置活细胞死亡；
如果活细胞周围八个位置有两个或三个活细胞，则该位置活细胞仍然存活；
如果活细胞周围八个位置有超过三个活细胞，则该位置活细胞死亡；
如果死细胞周围正好有三个活细胞，则该位置死细胞复活；
下一个状态是通过将上述规则同时应用于当前状态下的每个细胞所形成的，其中细胞的出生和死亡是同时发生的。给你 m x n 网格面板 board 的当前状态，返回下一个状态。

 */

class Solution289 {

    /**
     * @param Integer[][] $board
     * @return NULL
     */
    function gameOfLife(&$board) {
        $pos = [0,1,-1];
        $rowLen = count($board);
        $colLen = count($board[0]);

        for($r=0; $r<$rowLen; $r++) {
            for($c=0; $c<$colLen; $c++) {
                $sidelive = 0;
                for($i=0; $i<3; $i++) {
                    for($j=0; $j<3;$j++) {
                        // 出去自身位置，遍历身边的8个位置
                        if($pos[$i] ==0 && $pos[$j] == 0) {
                            continue;
                        }
                        $row = $r+$pos[$i];
                        $col = $c+$pos[$j];

                        if($row>=0 && $col>=0 && $row<$rowLen && $col<$colLen && abs($board[$row][$col])==1) {
                            $sidelive +=1;
                        }
                    }
                }

                if($board[$r][$c]==1 && ($sidelive < 2 || $sidelive > 3)) {
                    $board[$r][$c] = -1; // 变成死的
                }
                if($board[$r][$c] == 0 && $sidelive ==3) {
                    $board[$r][$c] = 2; // 变活
                }
            }
        }

        for($j=0; $j<$rowLen; $j++) {

            for($k=0; $k<$colLen; $k++ ){
                if($board[$j][$k] < 0) {
                    $board[$j][$k]=0;
                }
                if($board[$j][$k]>0) {
                    $board[$j][$k]=1;
                }
            }
        }
        return $board;
    }
}