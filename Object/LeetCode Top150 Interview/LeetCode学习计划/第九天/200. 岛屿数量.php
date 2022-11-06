<?php
/**
 * 给你一个由 '1'（陆地）和 '0'（水）组成的的二维网格，请你计算网格中岛屿的数量。

岛屿总是被水包围，并且每座岛屿只能由水平方向和/或竖直方向上相邻的陆地连接形成。

此外，你可以假设该网格的四条边均被水包围。

 

示例 1：

输入：grid = [
["1","1","1","1","0"],
["1","1","0","1","0"],
["1","1","0","0","0"],
["0","0","0","0","0"]
]
输出：1
示例 2：

输入：grid = [
["1","1","0","0","0"],
["1","1","0","0","0"],
["0","0","1","0","0"],
["0","0","0","1","1"]
]
输出：3

 */

class Solution200 {
    private $grid = [];
    // 如果在dfs中手动调用的话就不需要该变量
    private $direction = [[0,1],[0,-1],[1,0],[-1,0]];  // 一个节点的右、左、下、上四个相邻节点
    private $rl = 0;
    private $cl = 0;
    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        $this->rl = count($grid);
        if($this->rl < 1) {
            return 0;
        }
        $this->cl = count($grid[0]);
        $this->grid = $grid;

        $nums = 0;
        for($r=0; $r<$this->rl; $r++){
            for($c=0; $c<$this->cl; $c++) {

                if($this->grid[$r][$c] == 1) {
                    $nums += 1;
                    $this->dfs($r, $c);
                }
            }
        }
        return $nums;
    }

    function dfs($r, $c)
    {
        if ($r < 0 || $c < 0 || $r >= $this->rl || $c >= $this->cl || $this->grid[$r][$c] == 0) {
            return;
        }
        $this->grid[$r][$c] = 0;
        $this->dfs($r, $c + 1);
        $this->dfs($r, $c - 1);
        $this->dfs($r - 1, $c);
        $this->dfs($r + 1, $c);
        /**
         * foreach ($this->direction as $item) {
         * $this->dfs($this->grid, $r+$item[0], $c+$item[1]);
         * }
         * 这个循环可以替换上面四次dfs调用，算不上优化，换种写法
         */
    }
}