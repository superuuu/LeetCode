<?php
/**
 * 以数组 intervals 表示若干个区间的集合，其中单个区间为 intervals[i] = [starti, endi] 。请你合并所有重叠的区间，并返回 一个不重叠的区间数组，该数组需恰好覆盖输入中的所有区间 。

 

示例 1：

输入：intervals = [[1,3],[2,6],[8,10],[15,18]]
输出：[[1,6],[8,10],[15,18]]
解释：区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].
示例2：

输入：intervals = [[1,4],[4,5]]
输出：[[1,5]]
解释：区间 [1,4] 和 [4,5] 可被视为重叠区间。

提示：

1 <= intervals.length <= 104
intervals[i].length == 2
0 <= starti <= endi <= 104

 */

class Solution56 {

    // 0926 复习

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     * 这low bee的写法
     */
    function merge($intervals) {
        if(count($intervals)==1) {
            return $intervals;
        }
        sort($intervals);
        $res = [];
        $start = $intervals[0][0];
        $end = $intervals[0][1];
        for ($i=1; $i<count($intervals);$i++) {
            // $temp = [];
            if ($end >= $intervals[$i][0]) {
                if ($end < $intervals[$i][1]) {
                    $end = $intervals[$i][1];
                }
                if($i==count($intervals)-1){
                    $res[] = [$start, $end];
                }
                continue;
            }
            $res[] = [$start, $end];
            $start = $intervals[$i][0];
            $end = $intervals[$i][1];
            if($i==count($intervals)-1) {
                $res[] = [$start, $end];
            }
        }
        return $res;
    }

    function merge2($intervals){
        $len = count($intervals);
        if ($len <= 1) {
            return $intervals;
        }
        // [[1,3],[2,6],[8,10],[15,18]]
        sort($intervals);
        $res = [];
        for ($i=0; $i<$len;) {
            $r = $intervals[$i][1];
            $j=$i+1;
            while ($j<$len && $r>=$intervals[$j][0]) {
                $r = max($r, $intervals[$j][1]);
                $j++;
            }
            $res[] = [$intervals[$i][0], $r];
            $i=$j;
        }
        return $res;
    }
}