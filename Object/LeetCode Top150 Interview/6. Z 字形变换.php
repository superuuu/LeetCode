<?php
/**
 * 将一个给定字符串 s 根据给定的行数 numRows ，以从上往下、从左到右进行 Z 字形排列。

比如输入字符串为 "PAYPALISHIRING" 行数为 3 时，排列如下：

P   A   H   N
A P L S I I G
Y   I   R
之后，你的输出需要从左往右逐行读取，产生出一个新的字符串，比如："PAHNAPLSIIGYIR"。

请你实现这个将字符串进行指定行数变换的函数：

string convert(string s, int numRows);
 

示例 1：

输入：s = "PAYPALISHIRING", numRows = 3
输出："PAHNAPLSIIGYIR"
示例 2：
输入：s = "PAYPALISHIRING", numRows = 4
输出："PINALSIGYAHRPI"
解释：
P     I    N
A   L S  I G
Y A   H R
P     I
示例 3：

输入：s = "A", numRows = 1
输出："A"

 */

class Solution6 {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        if($numRows < 2) {
            return $s;
        }
        $len = strlen($s);
        $curRow = 0;
        $flag = -1;  // 标记位，标记到z字型反转的位置 
        $map = [];   // 记录每行的字母
        for($i=0; $i<$len; $i++){
            $map[$curRow][] = $s[$i];
            if($curRow == 0 || $curRow == $numRows-1) { // 第一行和最后一行要反转，调整标志位
                $flag = -$flag;
            }
            $curRow += $flag; // 行数变更
        }
        $res = '';
        foreach($map as $oneRow) {
            $res .= implode('', $oneRow); // 结果字符串拼装
        }
        return $res;
    }
}