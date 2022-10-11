<?php

/**
 * 一个机器人位于一个 m x n 网格的左上角 （起始点在下图中标记为 “Start” ）。

机器人每次只能向下或者向右移动一步。机器人试图达到网格的右下角（在下图中标记为 “Finish” ）。

问总共有多少条不同的路径？

 */

class Solution62 {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n) {
        $res = [];
        for ($i=0; $i<$m;$i++) {
            $res[$i][0] = 1;
        }
        for ($j=0;$j<$n;$j++) {
            $res[0][$j] = 1;
        }
        for ($k=1; $k<$m; $k++) {
            for ($p=1; $p<$n; $p++) {
                $res[$k][$p] = $res[$k][$p-1] + $res[$k-1][$p];
            }
        }
        return $res[$m-1][$n-1];
    }
}