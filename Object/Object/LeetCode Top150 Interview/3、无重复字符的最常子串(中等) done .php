<?php

/**
 * 给定一个字符串 s ，请你找出其中不含有重复字符的 最长子串 的长度。
 *
 * 示例 1:
 * 输入: s = "abcabcbb"
 * 输出: 3
 * 解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
 *
 * 请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。
 */

class Solution3 {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $maxSubStrLen = 0;
        $len = strlen($s);
        for ($i=0; $i<$len; $i++) {
            $arr = [];
            for ($j=$i;$j<$len;$j++) {
                if (!in_array($s[$j], $arr)) {
                    $arr[] = $s[$j];
                }else{
                    break;
                }
            }
            $maxSubStrLen = $maxSubStrLen > count($arr) ? $maxSubStrLen : count($arr);
        }
        return $maxSubStrLen;
    }

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring2($s) {
        $tempStr = '';
        $maxLen = 0;
        $len = strlen($s);
        for($i=0; $i<$len; $i++) {
            $pos = strpos($tempStr, $s[$i]);
            $tempStr .= $s[$i];
            if($pos !== false) {
                $tempStr = substr($tempStr, $pos+1);
            }
            $maxLen = strlen($tempStr) > $maxLen ? strlen($tempStr) : $maxLen;
        }
        return $maxLen;
    }
}