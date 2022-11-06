<?php

class Solution695 {

    private $maxArea = 0; // 最大面积
    private $curMax = 0;  // 当前循环轮次最大面积
    private $grid = [];
    private $rl = 0;
    private $cl = 0;
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxAreaOfIsland($grid) {
        $this->rl = count($grid);
        $this->cl = count($grid[0]);
        if($this->rl < 1){
            return 0;
        }
        $this->grid = $grid;

        for($r =0 ; $r<$this->rl; $r++){
            for($c=0; $c<$this->cl; $c++){
                // 当前节点为水面
                if($this->grid[$r][$c] == '0'){
                    continue;
                }
                $this->curMax = 0;
                $this->help($r, $c);
                $this->maxArea = max($this->curMax, $this->maxArea);
            }
        }
        return $this->maxArea;
    }

    function help($r, $c){

        // 判断当前节点位置是否合法
        if($c<0 || $r<0 || $c>=$this->cl || $r>=$this->rl || $this->grid[$r][$c]=='0') {
            return;
        }
        $this->curMax+=1;
        // 将当前陆地节点修改为水面，避免循环判断
        $this->grid[$r][$c]=0;
        $this->help($r, $c-1); // 左
        $this->help($r, $c+1); // 右
        $this->help($r+1, $c); // 下
        $this->help($r-1, $c); // 上
    }
}