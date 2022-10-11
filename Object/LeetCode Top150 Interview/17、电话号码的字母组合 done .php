<?php

/**
 * 给定一个仅包含数字2-9的字符串，返回所有它能表示的字母组合。答案可以按 任意顺序 返回。

给出数字到字母的映射如下（与电话按键相同）。注意 1 不对应任何字母。

 * 示例 1：

输入：digits = "23"
输出：["ad","ae","af","bd","be","bf","cd","ce","cf"]
 *
 * 示例 2：
 *
 * 输入：digits = ""
 * 输出：[]
 *
 * digits.length <= 4

 *
 * 2:abc
 * 3:def
 * 4:ghi
 * 5:jkl
 * 6:mno
 * 7:pqrs
 * 8:tuv
 * 9:wxyz
 *
 */

class Solution17 {

    public $res = [];
    public $map = [
        '2' => ['a','b','c'],
        '3' => ['d','e','f'],
        '4' => ['g','h','i'],
        '5' => ['j','k','l'],
        '6' => ['m','n','o'],
        '7' => ['p','q','r','s'],
        '8' => ['t','u','v'],
        '9' => ['w','x','y','z']
    ];

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {

        if (empty($digits)) {
            return $this->res;
        }
        $digitsLen = strlen($digits);
        for ($i=0; $i<$digitsLen; $i++) {
            $this->deal($digits[$i]);
        }
        return $this->res;
    }

    function deal($num) {
        if (empty($this->res)) {
            $this->res = $this->map[$num];
        }else{
            $temp = [];
            $resLen = count($this->res);
            for ($k=0; $k<$resLen; $k++) {
                $tLen = count($this->map[$num]);
                for ($j=0; $j<$tLen; $j++) {
                    $temp[] = $this->res[$k] . $this->map[$num][$j];
                }
            }
            $this->res = $temp;
        }
    }
}