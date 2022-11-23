<?php
/**
 * 给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。

注意：若 s 和 t 中每个字符出现的次数都相同，则称 s 和 t 互为字母异位词。

 

示例 1:

输入: s = "anagram", t = "nagaram"
输出: true
示例 2:

输入: s = "rat", t = "car"
输出: false
 

提示:

1 <= s.length, t.length <= 5 * 104
s 和 t 仅包含小写字母

 */

class Solution242 {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        // 字符串长度不同，指定不是异位词
        $lenS = strlen($s);
        $lenT = strlen($t);
        if($lenS != $lenT) {
            return false;
        }
        $sArr = $tArr = [];
        for($index=0; $index<$lenT; $index++) {
            $sChar = $s[$index];
            if(isset($sArr[$sChar])) {
                $sArr[$sChar] += 1;
            }else{
                $sArr[$sChar] = 1;
            }
            $tChar = $t[$index];
            if(isset($tArr[$tChar])) {
                $tArr[$tChar] += 1;
            }else{
                $tArr[$tChar] = 1;
            }
        }

        foreach($sArr as $char => $count) {
            if($tArr[$char] != $count) {
                return false;
            }
        }
        return true;

    }
}