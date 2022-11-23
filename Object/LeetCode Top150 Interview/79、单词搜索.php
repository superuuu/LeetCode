<?php
/**
 * 给定一个m x n 二维字符网格board 和一个字符串单词word 。如果word 存在于网格中，返回 true ；否则，返回 false 。

单词必须按照字母顺序，通过相邻的单元格内的字母构成，其中“相邻”单元格是那些水平相邻或垂直相邻的单元格。同一个单元格内的字母不允许被重复使用。


示例 1：


输入：board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "ABCCED"
输出：true
示例 2：


输入：board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "SEE"
输出：true
示例 3：


输入：board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "ABCB"
输出：false

 */
class Solution79 {
    private $board = [];
    private $len = 0;
    private $row = 0;
    private $col = 0;
    private $word = '';

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word) {
        $this->len = strlen($word);

        $this->row = count($board);
        $this->col = count($board[0]);
        $this->board = $board;
        $this->word = $word;

        for($r=0; $r<$this->row; $r++){
            for($c=0; $c<$this->col; $c++){
                $res = $this->dfs($r, $c, 0);

                if($res) {
                    return true;
                }
            }
        }
        return false;
    }

    function dfs($r, $c, $index){
        // 边界检验 、 目标值检验
        if($r<0 || $c<0 || $r>=$this->row || $c>=$this->col || $this->board[$r][$c]!=$this->word[$index]) {
            return false; // 结束
        }
        // 当前字母为最后一个且相同，找到答案，返回
        if($index == $this->len-1) {
            return true;
        }
        // 不能重复使用，当前节点取出置为空，后续写入
        $temp = $this->board[$r][$c];
        $this->board[$r][$c] = ' ';
        // 向周边节点进行搜索
        $newIndex = $index+1;
        $res = $this->dfs($r+1, $c, $newIndex) || $this->dfs($r-1, $c, $newIndex) || $this->dfs($r, $c+1, $newIndex) || $this->dfs($r, $c-1, $newIndex);
        // 写回
        $this->board[$r][$c]=$temp;
        return $res;
    }
}