<?php

/**
 * 给你一个字符串数组，请你将 字母异位词 组合在一起。可以按任意顺序返回结果列表。

字母异位词 是由重新排列源单词的字母得到的一个新单词，所有源单词中的字母通常恰好只用一次。

 

示例 1:

输入: strs = ["eat", "tea", "tan", "ate", "nat", "bat"]
输出: [["bat"],["nat","tan"],["ate","eat","tea"]]
示例 2:

输入: strs = [""]
输出: [[""]]
示例 3:

输入: strs = ["a"]
输出: [["a"]]
 

提示：

1 <= strs.length <= 104
0 <= strs[i].length <= 100
strs[i] 仅包含小写字母

 */

class Solution49 {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $map =[]; // index => a-z

        $res = [];
        $count = count($strs);
        for($i=0; $i<$count; $i++) {
            if(in_array($this->format($strs[$i]), $map)) {
                $res[array_search($this->format($strs[$i]), $map)][] = $strs[$i];
            }else{
                $index = count($map);
                $map[$index] = $this->format($strs[$i]);
                $res[$index][] = $strs[$i];
            }
        }
        return $res;
    }

    function format($str){
        $strArr = str_split($str);
        sort($strArr);
        return implode("", $strArr);
    }
}