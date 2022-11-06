<?php

/**
 * 编写一个函数来查找字符串数组中的最长公共前缀。

如果不存在公共前缀，返回空字符串 ""。

 

示例 1：

输入：strs = ["flower","flow","flight"]
输出："fl"
示例 2：

输入：strs = ["dog","racecar","car"]
输出：""
解释：输入不存在公共前缀。

 */

class Solution14 {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        if (empty($strs)) {
            return '';
        }

        $pre = '';
        $times = strlen($strs[0]);

        for($i=0; $i<$times;$i++){
            $single = '';
            foreach ($strs as $str) {
                if ($str[$i] == $single) {
                    continue;
                }else{
                    if (empty($single)) {
                        $single = $str[$i];
                    }else{
                        return $pre;
                    }
                }
            }
            $pre .= $single;
        }
        return $pre;
    }
}