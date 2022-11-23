<?php

/**
 * 给你一个会议时间安排的数组 intervals ，每个会议时间都会包括开始和结束的时间 intervals[i] = [starti, endi] ，返回 所需会议室的最小数量 。

 

示例 1：

输入：intervals = [[0,30],[5,10],[15,20]]
输出：2
示例 2：

输入：intervals = [[7,10],[2,4]]
输出：1
 

提示：

1 <=intervals.length <= 104
0 <= starti < endi <= 106

 */
class Solution253 {

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function minMeetingRooms($intervals) {
        if(!$intervals) {
            return 0;
        }
        // 排序
        array_multisort(array_column($intervals, 0), SORT_ASC, $intervals);
        // 记录第一个会议的结束时间
        $list = [$intervals[0][1]];
        $count = count($intervals);
        for($i=1; $i<$count; $i++) {
            // 如果当前会议的开始时间大于记录的会议时间的结束时间，说明可以共用会议室，删除旧的会议时间
            if($list[0] <= $intervals[$i][0]) {
                array_shift($list);
            }
            // 写入新的会议结束时间
            array_unshift($list, $intervals[$i][1]);
            // 保证有序
            sort($list);
        }
        return count($list);
    }
}