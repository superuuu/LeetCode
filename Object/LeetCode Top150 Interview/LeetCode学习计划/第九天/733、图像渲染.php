<?php
/**
 * 有一幅以 m x n 的二维整数数组表示的图画 image ，其中 image[i][j] 表示该图画的像素值大小。

你也被给予三个整数 sr ,  sc 和 newColor 。你应该从像素 image[sr][sc] 开始对图像进行 上色填充 。

为了完成 上色工作 ，从初始像素开始，记录初始坐标的 上下左右四个方向上 像素值与初始坐标相同的相连像素点，接着再记录这四个方向上符合条件的像素点与他们对应 四个方向上 像素值与初始坐标相同的相连像素点，……，重复该过程。将所有有记录的像素点的颜色值改为 newColor 。

最后返回 经过上色渲染后的图像 。
 *
 * 输入: image = [[1,1,1],[1,1,0],[1,0,1]]，sr = 1, sc = 1, newColor = 2
输出: [[2,2,2],[2,2,0],[2,0,1]]
解析: 在图像的正中间，(坐标(sr,sc)=(1,1)),在路径上所有符合条件的像素点的颜色都被更改成2。
注意，右下角的像素没有更改为2，因为它不是在上下左右四个方向上与初始点相连的像素点。

 */

class Solution733 {

    /**
     * @param Integer[][] $image
     * @param Integer $sr
     * @param Integer $sc
     * @param Integer $color
     * @return Integer[][]
     */
    function floodFill($image, $sr, $sc, $color) {
        // 记录初始点最初颜色
        $originColor = $image[$sr][$sc];
        // 如果起始点颜色和目标颜色相同，直接返回
        if($originColor == $color) {
            return $image;
        }
        // 搜索的四个方向
        $direction = [
            [0,-1],  // 向左
            [1,0],   // 向下
            [0,1],   // 向右
            [-1,0],  // 向上
        ];
        // 初始化队列，初始节点入队
        $queue = new SplQueue();
        $queue->enqueue([$sr, $sc]);
        // 图像边界
        $height = count($image) -1;
        $width  = count($image[0]) -1;

        while($queue->count()) {
            // 出队，染色
            $point = $queue->dequeue();
            $image[$point[0]][$point[1]] = $color;
            foreach($direction as $one) {
                // 新点位坐标 分别探索当前位置的上下左右
                $new_r = $point[0] + $one[0];
                $new_c = $point[1] + $one[1];
                // 判断新点位是否在图像内 且 颜色满足要求
                if(0 <= $new_r && $new_r <= $height && 0 <= $new_c && $new_c <= $width && $image[$new_r][$new_c] == $originColor) {
                    // 目标点满足要求，入队
                    $queue->enqueue([$new_r, $new_c]);
                }
            }
        }
        return $image;
    }
}



